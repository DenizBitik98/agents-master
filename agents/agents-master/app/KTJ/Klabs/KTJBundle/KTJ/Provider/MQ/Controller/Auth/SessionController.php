<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Auth;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Auth\ISessionController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\IErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close\Response as SessionCloseResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open\Request;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open\Response as SessionOpenResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info\Response as SessionInfoResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;

/**
 * Class SessionController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Auth
 * @method Provider getProvider(): ?IProvider
 */
class SessionController implements ISessionController, EventDispatcherAwareInterface, SerializerAwareInterface, IErrorHandlerAware
{
    use TProviderAware;
    use EventDispatcherAwareTrait;
    use SerializerAwareTrait;
    use TErrorHandlerAware;
    /**
     * Event occurs before open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_OPEN = 'ktj.mq.auth.session.open.before';
    /**
     * Event occurs after making open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_OPEN = 'ktj.mq.auth.session.open.after';
    /**
     * Event occurs after serializing response of open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_OPEN = 'ktj.mq.auth.session.open.after.serialize';

    /**
     * Event occurs before open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_CLOSE = 'ktj.mq.auth.session.close.before';
    /**
     * Event occurs after making open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_CLOSE = 'ktj.mq.auth.session.close.after';
    /**
     * Event occurs after making open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_CLOSE = 'ktj.mq.auth.session.close.after';
    /**
     * Event occurs before open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_INFO = 'ktj.mq.auth.session.info.before';
    /**
     * Event occurs before open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_INFO = 'ktj.mq.auth.session.info.after';
    /**
     * Event occurs before open session call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_INFO = 'ktj.mq.auth.session.info.serialize';
    /**
     * @var null|string $openUri
     */
    protected $openUri;
    /**
     * @var null|string $retryOpenUri
     */
    protected $retryOpenUri;
    /**
     * @var null|string $closeUri
     */
    protected $closeUri;
    /**
     * @var null|string $retryCloseUri
     */
    protected $retryCloseUri;
    /**
     * @var null|string $infoUri
     */
    protected $infoUri;

    /**
     * @return string|null
     */
    public function getOpenUri(): ?string
    {
        return $this->openUri;
    }

    /**
     * @param string|null $openUri
     * @return SessionController
     */
    public function setOpenUri(?string $openUri): SessionController
    {
        $this->openUri = $openUri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRetryOpenUri(): ?string
    {
        return $this->retryOpenUri;
    }

    /**
     * @param string|null $retryOpenUri
     * @return SessionController
     */
    public function setRetryOpenUri(?string $retryOpenUri): SessionController
    {
        $this->retryOpenUri = $retryOpenUri;

        return $this;
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
     * @return SessionController
     */
    public function setCloseUri(?string $closeUri): SessionController
    {
        $this->closeUri = $closeUri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRetryCloseUri(): ?string
    {
        return $this->retryCloseUri;
    }

    /**
     * @param string|null $retryCloseUri
     * @return SessionController
     */
    public function setRetryCloseUri(?string $retryCloseUri): SessionController
    {
        $this->retryCloseUri = $retryCloseUri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInfoUri(): ?string
    {
        return $this->infoUri;
    }

    /**
     * @param string|null $infoUri
     * @return SessionController
     */
    public function setInfoUri(?string $infoUri): SessionController
    {
        $this->infoUri = $infoUri;

        return $this;
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function openAuthorized(IRequest $request = null): IResponse
    {
        return $this->open($request);
    }

    /**
     * @inheritDoc
     * @param Request $request
     * @throws GuzzleException
     */
    function open(IRequest $request = null): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(static::BEFORE_OPEN, new BeforeRequestEvent($this, null));
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getOpenUri(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(static::AFTER_OPEN, new AfterRequestEvent(null, null, $psrResponse));
            $psrResponse->getBody()->rewind();
            /** @var null|SessionOpenResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                SessionOpenResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_OPEN,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->open($request);
            }
            throw $exception;
        }
    }

    /**
     * @return IResponse|SessionOpenResponse|null
     * @throws GuzzleException
     */
    function retryOpen()
    {
        try {
            $this->eventDispatcher->dispatch(static::BEFORE_OPEN, new BeforeRequestEvent($this, null));
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getRetryOpenUri(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                ]
            );
            $this->eventDispatcher->dispatch(static::AFTER_OPEN, new AfterRequestEvent(null, null, $psrResponse));
            $psrResponse->getBody()->rewind();
            /** @var null|SessionOpenResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                SessionOpenResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_OPEN,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse())) {
                return $this->retryOpen();
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function closeAuthorized(IRequest $request = null): IResponse
    {
        return $this->close($request);
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function close(IRequest $request = null): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(static::BEFORE_OPEN.$this->getProvider()->getQueueId(), new BeforeRequestEvent($this, null));
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getCloseUri(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                ]
            );
            $this->eventDispatcher->dispatch(static::AFTER_OPEN, new AfterRequestEvent(null, null, $psrResponse));
            $psrResponse->getBody()->rewind();
            /** @var SessionCloseResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                SessionCloseResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_OPEN,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->open($request);
            }
            throw $exception;
        }
    }

    /**
     * @return IResponse|SessionOpenResponse|null
     * @throws GuzzleException
     */
    function retryClose()
    {
        try {
            $this->eventDispatcher->dispatch(static::BEFORE_CLOSE.$this->getProvider()->getQueueId(), new BeforeRequestEvent($this, null));
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getRetryCloseUri(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                ]
            );
            $this->eventDispatcher->dispatch(static::AFTER_CLOSE, new AfterRequestEvent(null, null, $psrResponse));
            $psrResponse->getBody()->rewind();
            /** @var null|SessionCloseResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                SessionCloseResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_CLOSE,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse())) {
                return $this->retryOpen();
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @param Request $request
     * @throws GuzzleException
     */
    function info(IRequest $request = null): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(static::BEFORE_INFO.$this->getProvider()->getQueueId(), new BeforeRequestEvent($this, null));
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'get',
                $this->getInfoUri(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => null,
                ]
            );
            $this->eventDispatcher->dispatch(static::AFTER_INFO, new AfterRequestEvent(null, null, $psrResponse));
            $psrResponse->getBody()->rewind();
            /** @var null|SessionInfoResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                SessionInfoResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_INFO,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->open($request);
            }
            throw $exception;
        }
    }
}
