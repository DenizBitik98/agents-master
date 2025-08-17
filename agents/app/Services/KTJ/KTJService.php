<?php


namespace App\Services\KTJ;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Auth\AuthRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Auth\AuthResponse;
use App\Services\KTJ\Provider\DCTS\CashierService;
use App\Services\KTJ\Provider\DCTS\ETicketService;
use App\Services\KTJ\Provider\DCTS\LoginService;
use App\Services\KTJ\Provider\DCTS\ReturnETicketService;
use App\Services\KTJ\Provider\DCTS\SearchPlacesService;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\CookieJarInterface;
use GuzzleHttp\Cookie\SetCookie;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\ResponseInterface;

use Illuminate\Support\Facades\Cache;

class KTJService
{
    /**
     * @var null|ClientInterface $httpClient
     */
    protected $idpClient;
    /**
     * @var null|ClientInterface $httpClient
     */
    protected $dctsClient;
    /**
     * @var string
     */
    protected $tokenUrl = '';
    /**
     * @var null|string $authUri
     */
    protected $authUri;
    /**
     * @var null|string $login
     */
    protected $login;
    /**
     * @var null|string $password
     */
    protected $password;
    /**
     * @var null|string $machineKey
     */
    protected $machineKey;
    /**
     * @var null|string $ktjTerminal
     */
    protected $ktjTerminal;
    /**
     * @var null|CacheItemPoolInterface $cacheAdapter
     */
    protected $cacheAdapter;
    /**
     * @var null|CookieJarInterface $idpCookies
     */
    protected $idpCookies;
    /**
     * @var null|string $idpCookieStorageKey
     */
    protected $idpCookieStorageKey;
    /**
     * @var null|string $dctsCookieStorageKey
     */
    protected $dctsCookieStorageKey;

    /**
     * @var null|CashierService $cashierService
     */
    protected $cashierService;
    /**
     * @var null|SearchPlacesService $searchPlacesService
     */
    protected $searchPlacesService;
    /**
     * @var null|LoginService $loginService
     */
    protected $loginService;
    /**
     * @var null|ETicketService $eTicketService
     */
    protected $eTicketService;
    /**
     * @var null|ReturnETicketService $returnETicketService
     */
    protected $returnETicketService;


    function getToken(string $login, string $password): ResponseInterface
    {
        $psrResponse = $this->idpClient->request(
            'get',
            $this->tokenUrl,
            [
                'headers' => [
                    'Authorization' => implode(
                        ' ',
                        [
                            'Basic',
                            $this->getBase64($login, $password),
                        ]
                    ),
                ],
            ]
        );

        return $psrResponse;
    }


    function refreshProviderCookies(string $login = null, string $password = null, ?string $machineKey = null)
    {
        $tokenResponse = $this->getToken(
            $this->login,
            $this->password
        );
        $tokenResponse->getBody()->rewind();

        $this->saveIdpCookies($tokenResponse);

        return $this->auth(
            new AuthRequest($tokenResponse->getBody()->getContents(), $this->getMachineKey($machineKey))
        );
    }

    function auth(IRequest $request): ?IResponse
    {

        $psrResponse = $this->getDctsClient()->request(
            'post',
            $this->authUri.'?machineKey='.$this->getMachineKey(),
            [
                'body' => $request->getToken(),
                'cookies' => $this->loadIdPCookies(),
                'query' => [
                    'machineKey' => $this->getMachineKey(),
                ],
            ]
        );

        $this->saveDCTSCookies($psrResponse);

        return new AuthResponse();
    }


    public function getStations(){

    }

    /////////////////////////////////////////////////
    function saveIdpCookies( ResponseInterface $response ) {
        $responseCookies = $response->getHeader( 'Set-Cookie' );

        $newCookies      = [];
        if ( is_array( $responseCookies ) )
        {
            foreach ( $responseCookies as $cookie )
            {
                $newCookies[] = SetCookie::fromString( $cookie );
            }
        }
        else
        {
            $newCookies = [ SetCookie::fromString( $responseCookies ) ];
        }


        Cache::store('redis')->put($this->idpCookieStorageKey, $newCookies);
    }

    function loadIdPCookies(): ?CookieJarInterface {

        if ( Cache::store('redis')->has($this->idpCookieStorageKey) )
        {
            $items = Cache::store('redis')->get($this->idpCookieStorageKey);
        }
        else
        {
            $items = [];
        }

        return new CookieJar( false, $items );
    }


    function saveDCTSCookies( ResponseInterface $response ) {
        $responseCookies = $response->getHeader( 'Set-Cookie' );
        $newCookies      = [];
        if ( is_array( $responseCookies ) )
        {
            foreach ( $responseCookies as $cookie )
            {
                $newCookies[] = SetCookie::fromString( $cookie );
            }
        }
        else
        {
            $newCookies = [ SetCookie::fromString( $responseCookies ) ];
        }
/*        $responseCookies = Cache::store('redis')->get( $this->dctsCookieStorageKey );

        $responseCookies->expiresAfter(\DateInterval::createFromDateString('24 hours'));
        $responseCookies->set( $newCookies );

        return $this->getCacheAdapter()->save( $responseCookies );*/

        Cache::store('redis')->put($this->dctsCookieStorageKey, $newCookies);
    }


    function loadDCTSPCookies(): ?CookieJarInterface {
        if ( Cache::store('redis')->has($this->dctsCookieStorageKey) )
        {
            $items = Cache::store('redis')->get($this->dctsCookieStorageKey);
        }
        else
        {
            $items = [];
        }


        return new CookieJar( false, $items );
    }


    ///////////////////////////////////////////////////
    public function getMachineKey(?string $machineKey = null): ?string
    {
        return is_null($machineKey) ? $this->machineKey : $machineKey;
    }

    public function setMachineKey(?string $machineKey = null)
    {
        $this->machineKey = $machineKey;
    }



    /**
     * @param string $login
     * @param string $password
     * @return string
     */
    protected function getBase64(string $login, string $password)
    {
        return base64_encode(
            implode(
                ':',
                [
                    $login,
                    $password,
                ]
            )
        );
    }

    /////////////////////////////////// getters and setters

    /**
     * @return ClientInterface|null
     */
    public function getIdpClient(): ?ClientInterface
    {
        return $this->idpClient;
    }

    /**
     * @param ClientInterface|null $idpClient
     */
    public function setIdpClient(?ClientInterface $idpClient): void
    {
        $this->idpClient = $idpClient;
    }

    /**
     * @return ClientInterface|null
     */
    public function getDctsClient(): ?ClientInterface
    {
        return $this->dctsClient;
    }

    /**
     * @param ClientInterface|null $dctsClient
     */
    public function setDctsClient(?ClientInterface $dctsClient): void
    {
        $this->dctsClient = $dctsClient;
    }

    /**
     * @return string
     */
    public function getTokenUrl(): string
    {
        return $this->tokenUrl;
    }

    /**
     * @param string $tokenUrl
     */
    public function setTokenUrl(string $tokenUrl): void
    {
        $this->tokenUrl = $tokenUrl;
    }

    /**
     * @return string|null
     */
    public function getAuthUri(): ?string
    {
        return $this->authUri;
    }

    /**
     * @param string|null $authUri
     */
    public function setAuthUri(?string $authUri): void
    {
        $this->authUri = $authUri;
    }

    /**
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param string|null $login
     */
    public function setLogin(?string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return CacheItemPoolInterface|null
     */
    public function getCacheAdapter(): ?CacheItemPoolInterface
    {
        return $this->cacheAdapter;
    }

    /**
     * @param CacheItemPoolInterface|null $cacheAdapter
     */
    public function setCacheAdapter(?CacheItemPoolInterface $cacheAdapter): void
    {
        $this->cacheAdapter = $cacheAdapter;
    }

    /**
     * @return CookieJarInterface|null
     */
    public function getIdpCookies(): ?CookieJarInterface
    {
        return $this->idpCookies;
    }

    /**
     * @param CookieJarInterface|null $idpCookies
     */
    public function setIdpCookies(?CookieJarInterface $idpCookies): void
    {
        $this->idpCookies = $idpCookies;
    }

    /**
     * @return string|null
     */
    public function getIdpCookieStorageKey(): ?string
    {
        return $this->idpCookieStorageKey;
    }

    /**
     * @param string|null $idpCookieStorageKey
     */
    public function setIdpCookieStorageKey(?string $idpCookieStorageKey): void
    {
        $this->idpCookieStorageKey = $idpCookieStorageKey;
    }

    /**
     * @return CashierService|null
     */
    public function getCashierService(): ?CashierService
    {
        return $this->cashierService;
    }

    /**
     * @param CashierService|null $cashierService
     */
    public function setCashierService(?CashierService $cashierService): void
    {
        $this->cashierService = $cashierService;
    }

    /**
     * @return SearchPlacesService|null
     */
    public function getSearchPlacesService(): ?SearchPlacesService
    {
        return $this->searchPlacesService;
    }

    /**
     * @param SearchPlacesService|null $searchPlacesService
     */
    public function setSearchPlacesService(?SearchPlacesService $searchPlacesService): void
    {
        $this->searchPlacesService = $searchPlacesService;
    }

    /**
     * @return string|null
     */
    public function getDctsCookieStorageKey(): ?string
    {
        return $this->dctsCookieStorageKey;
    }

    /**
     * @param string|null $dctsCookieStorageKey
     */
    public function setDctsCookieStorageKey(?string $dctsCookieStorageKey): void
    {
        $this->dctsCookieStorageKey = $dctsCookieStorageKey;
    }

    /**
     * @return LoginService|null
     */
    public function getLoginService(): ?LoginService
    {
        return $this->loginService;
    }

    /**
     * @param LoginService|null $loginService
     */
    public function setLoginService(?LoginService $loginService): void
    {
        $this->loginService = $loginService;
    }

    /**
     * @return ETicketService|null
     */
    public function getETicketService(): ?ETicketService
    {
        return $this->eTicketService;
    }

    /**
     * @param ETicketService|null $eTicketService
     */
    public function setETicketService(?ETicketService $eTicketService): void
    {
        $this->eTicketService = $eTicketService;
    }

    /**
     * @return ReturnETicketService|null
     */
    public function getReturnETicketService(): ?ReturnETicketService
    {
        return $this->returnETicketService;
    }

    /**
     * @param ReturnETicketService|null $returnETicketService
     */
    public function setReturnETicketService(?ReturnETicketService $returnETicketService): void
    {
        $this->returnETicketService = $returnETicketService;
    }

    /**
     * @return string|null
     */
    public function getKtjTerminal(): ?string
    {
        return $this->ktjTerminal;
    }

    /**
     * @param string|null $ktjTerminal
     */
    public function setKtjTerminal(?string $ktjTerminal): void
    {
        $this->ktjTerminal = $ktjTerminal;
    }
}
