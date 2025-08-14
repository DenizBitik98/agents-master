<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Order;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IConfirmController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Exception\MethodNotImplementedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm\Response as OrderConfirmResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;

/**
 * Class ConfirmController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Order
 * @method Provider getProvider() : ?IProvider
 */
class ConfirmController implements IConfirmController
{
    use TErrorHandlerAware;
    use SerializerAwareTrait;
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use TIdpCookieAware;
    use TCacheAdapterAware {
        setCacheAdapter as setCacheAdapterTrait;
    }
    /**
     * Event occurs before making reservation confirm call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_RESERVE = 'ktj.mq.reservation.confirm.before';
    /**
     * Event occurs after making reservation confirm call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_RESERVE = 'ktj.mq.reservation.confirm.after';
    /**
     * Event occurs after making reservation confirm result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_RESERVE = 'ktj.mq.reservation.confirm.serialize';

    /**
     * @var null|string $confirmationUrl
     */
    protected $confirmationUrl;
    /**
     * @var null|string $retryConfirmationUrl
     */
    protected $retryConfirmationUrl;

    /**
     * @param IRequest $request
     * @return IResponse|null
     * @throws MethodNotImplementedException
     */
    function reservationConfirmAuthorized(IRequest $request): ?IResponse
    {
        throw new MethodNotImplementedException('');
    }

    /**
     * @return OrderConfirmResponse
     * @throws GuzzleException
     */
    function reservationRetryConfirm(): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_RESERVE.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getRetryConfirmationUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_RESERVE,
                new AfterRequestEvent(null, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var OrderConfirmResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                OrderConfirmResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_RESERVE,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse())) {
                return $this->reservationRetryConfirm();
            }
            throw $exception;
        }
    }

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     * @throws GuzzleException
     */
    function reservationConfirm(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_RESERVE.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getConfirmationUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_RESERVE,
                new AfterRequestEvent($request, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var OrderConfirmResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                OrderConfirmResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_RESERVE,
                new AfterRequestEvent($request, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->reservationConfirm($request);
            }
            throw $exception;
        }
    }

    /**
     * @return string|null
     */
    public function getConfirmationUrl(): ?string
    {
        return $this->confirmationUrl;
    }

    /**
     * @param string|null $confirmationUrl
     * @return ConfirmController
     */
    public function setConfirmationUrl(?string $confirmationUrl): ConfirmController
    {
        $this->confirmationUrl = $confirmationUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRetryConfirmationUrl(): ?string
    {
        return $this->retryConfirmationUrl;
    }

    /**
     * @param string|null $retryConfirmationUrl
     * @return ConfirmController
     */
    public function setRetryConfirmationUrl(?string $retryConfirmationUrl): ConfirmController
    {
        $this->retryConfirmationUrl = $retryConfirmationUrl;

        return $this;
    }
}
