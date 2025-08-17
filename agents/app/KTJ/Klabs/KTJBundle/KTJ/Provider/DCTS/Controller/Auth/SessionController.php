<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 23:59
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Auth;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use DateTime;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Auth\ISessionController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Session\Close\CloseResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Session\Open\OpenResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class SessionController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Auth
 * @method Provider getProvider(): ?IProvider
 */
class SessionController implements ISessionController, EventDispatcherAwareInterface, SerializerAwareInterface
{
    use TProviderAware;
    use EventDispatcherAwareTrait;
    use SerializerAwareTrait;
    /**
     * Event occurs before open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_OPEN = 'ktj.dcts.auth.session.open.before';
    /**
     * Event occurs after making open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_OPEN = 'ktj.dcts.auth.session.open.after';
    /**
     * Event occurs after serializing response of open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_OPEN = 'ktj.dcts.auth.session.open.after.serialize';

    /**
     * Event occurs before open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_CLOSE = 'ktj.dcts.auth.session.close.before';
    /**
     * Event occurs after making open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_CLOSE = 'ktj.dcts.auth.session.close.after';
    /**
     * Event occurs after making open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_CLOSE = 'ktj.dcts.auth.session.close.after';

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
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

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
        $this->eventDispatcher->dispatch(static::BEFORE_OPEN, new BeforeRequestEvent($this, null));
        $psrResponse = $this->getProvider()->getHttpClient()->request(
            'get',
            $this->openUri,
            [
                'cookies' => $this->getProvider()->getDctsCookies(),
                'query' => [
                    'machineKey' => $this->getProvider()->getMachineKey(),
                ],
            ]
        );
        $this->eventDispatcher->dispatch(static::AFTER_OPEN, new AfterRequestEvent(null, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        /** @var OpenResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            OpenResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_OPEN, new AfterRequestEvent(null, $response, $psrResponse));

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
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

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
        $this->eventDispatcher->dispatch(static::BEFORE_CLOSE, new BeforeRequestEvent($this));
        $psrResponse = $this->getProvider()->getHttpClient()->request(
            'post',
            $this->closeUri,
            [
                'cookies' => $this->getProvider()->getDctsCookies(),
                'body' => "\"{$this->getProvider()->getMachineKey()}\"",
            ]
        );
        $this->eventDispatcher->dispatch(static::AFTER_CLOSE, new AfterRequestEvent(null, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        $response = new CloseResponse(
            new DateTime(trim($psrResponse->getBody()->getContents(), '"'))
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_CLOSE, new AfterRequestEvent(null, $response, $psrResponse));

        return $response;
    }

    /**
     * @param null|string $openUri
     *
     * @return SessionController
     */
    public function setOpenUri(?string $openUri): SessionController
    {
        $this->openUri = $openUri;

        return $this;
    }

    /**
     * @param null|string $closeUri
     *
     * @return SessionController
     */
    public function setCloseUri(?string $closeUri): SessionController
    {
        $this->closeUri = $closeUri;

        return $this;
    }
}
