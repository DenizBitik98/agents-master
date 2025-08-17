<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 13:25
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Auth;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Auth\IAuthController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Auth\AuthRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Auth\AuthResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Auth
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Auth
 * @method Provider getProvider
 */
class AuthController implements IAuthController, EventDispatcherAwareInterface
{
    /**
     * Event occurs before making auth call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_AUTH = 'ktj.dcts.auth.before';
    /**
     * Event occurs after auth call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_AUTH = 'ktj.dcts.auth.after';
    /**
     * Event occurs after making car search result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_AUTH = 'ktj.dcts.auth.serialize';

    use EventDispatcherAwareTrait;
    use TProviderAware;
    use TIdpCookieAware;
    use TCacheAdapterAware {
        setCacheAdapter as setCacheAdapterTrait;
    }

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
     * @param string|null $login
     * @return string|null
     */
    public function getLogin(?string $login = null): ?string
    {
        return is_null($login) ? $this->login : $login;
    }

    /**
     * @param string|null $login
     * @return AuthController
     */
    public function setLogin(?string $login): AuthController
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @param string|null $password
     * @return string|null
     */
    public function getPassword(?string $password = null): ?string
    {
        return is_null($password) ? $this->password : $password;
    }

    /**
     * @param string|null $password
     * @return AuthController
     */
    public function setPassword(?string $password): AuthController
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string|null $machineKey
     * @return string|null
     */
    public function getMachineKey(?string $machineKey = null): ?string
    {
        return is_null($machineKey) ? $this->machineKey : $machineKey;
    }

    /**
     * @param string|null $machineKey
     * @return AuthController
     */
    public function setMachineKey(?string $machineKey): AuthController
    {
        $this->machineKey = $machineKey;

        return $this;
    }

    /**
     * @inheritdoc
     * @return ResponseInterface
     * @throws GuzzleException
     */
    function refreshProviderCookies(string $login = null, string $password = null, ?string $machineKey = null)
    {
        $tokenResponse = $this->getProvider()->getKtj()->getIdpClient()->getToken(
            $this->getLogin($login),
            $this->getPassword($password)
        );
        $tokenResponse->getBody()->rewind();

        return $this->auth(
            new AuthRequest($tokenResponse->getBody()->getContents(), $this->getMachineKey($machineKey))
        );
    }

    /**
     * @inheritdoc
     *
     * @param AuthRequest $request
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    function auth(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_AUTH, new BeforeRequestEvent($this));
        $psrResponse = $this->getProvider()->getHttpClient()->request(
            'post',
            $this->getAuthUri(),
            [
                'body' => $request->getToken(),
                'cookies' => $this->getIdpCookies(),
                'query' => [
                    'machineKey' => $this->getProvider()->getMachineKey(),
                ],
            ]
        );
        $this->eventDispatcher->dispatch(static::AFTER_AUTH, new AfterRequestEvent($request, null, $psrResponse));
        $this->eventDispatcher->dispatch(
            static::SERIALIZE_AUTH,
            new AfterRequestEvent($request, new AuthResponse(), $psrResponse)
        );

        return new AuthResponse();
    }

    /**
     * @param null|string $authUri
     *
     * @return AuthController
     */
    public function setAuthUri(?string $authUri): AuthController
    {
        $this->authUri = $authUri;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAuthUri(): ?string
    {
        return $this->authUri;
    }
}
