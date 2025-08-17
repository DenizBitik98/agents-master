<?php


namespace App\Services\KTJ\Provider\DCTS;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Session\Close\CloseResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Session\Open\OpenResponse;
use App\Services\KTJ\Provider\DCTS\Aware\KTJServiceTrait;
use App\Services\KTJ\Provider\DCTS\Aware\SerializerTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use \DateTime;

class LoginService
{
    use KTJServiceTrait;
    use SerializerTrait;

    /**
     * @var null|string $openUri
     */
    protected $openUri;
    /**
     * @var null|string $closeUri
     */
    protected $closeUri;

    /**
     * @inheritdoc
     * @throws GuzzleException
     */
    function openAuthorized(IRequest $request = null): IResponse
    {
        try {
            return $this->open($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->openAuthorized();
                    break;
            }
        }

        return new OpenResponse();
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function open(IRequest $request = null): ?IResponse
    {

        $psrResponse = $this->getKTJService()->getDctsClient()->request(
            'get',
            $this->openUri,
            [
                'cookies' => $this->getKTJService()->loadDCTSPCookies(),
                'query' => [
                    'machineKey' => $this->getKTJService()->getMachineKey(),
                ],
            ]
        );

        $psrResponse->getBody()->rewind();
        /** @var OpenResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            OpenResponse::class,
            'json'
        );

        return $response;
    }

    /**
     * @inheritdoc
     * @throws GuzzleException
     */
    function closeAuthorized(IRequest $request = null): IResponse
    {
        try {
            return $this->close($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->closeAuthorized();
                    break;
            }
        }

        return new CloseResponse();
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function close(IRequest $request = null): ?IResponse
    {
        $psrResponse = $this->getKTJService()->getDctsClient()->request(
            'post',
            $this->closeUri,
            [
                'cookies' => $this->getKTJService()->loadDCTSPCookies(),
                'body' => "\"{$this->getKTJService()->getMachineKey()}\"",
            ]
        );

        $psrResponse->getBody()->rewind();

        $response = new CloseResponse(
            new DateTime(trim($psrResponse->getBody()->getContents(), '"'))
        );


        return $response;
    }


    /**
     * @return string|null
     */
    public function getOpenUri(): ?string
    {
        return $this->openUri;
    }

    /**
     * @param string|null $openUri
     */
    public function setOpenUri(?string $openUri): void
    {
        $this->openUri = $openUri;
    }

    /**
     * @return string|null
     */
    public function getCloseUri(): ?string
    {
        return $this->closeUri;
    }

    /**
     * @param string|null $closeUri
     */
    public function setCloseUri(?string $closeUri): void
    {
        $this->closeUri = $closeUri;
    }
}
