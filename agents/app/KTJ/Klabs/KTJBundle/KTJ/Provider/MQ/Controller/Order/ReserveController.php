<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Order;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IReserveController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Exception\MethodNotImplementedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\IErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve\Response as OrderReserveResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking\Response as ConfirmBookingResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;

/**
 * Class ReserveController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\OrderController
 * @method Provider getProvider() : ?IProvider
 */
class ReserveController implements IReserveController, EventDispatcherAwareInterface, SerializerAwareInterface, IErrorHandlerAware
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
     * Event occurs before making reservation reserve call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_RESERVE = 'ktj.mq.reservation.reserve.before';
    /**
     * Event occurs after making reservation reserve call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_RESERVE = 'ktj.mq.reservation.reserve.after';
    /**
     * Event occurs after making reservation reserve result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_RESERVE = 'ktj.mq.reservation.reserve.serialize';

    /**
     * @var null|string $reserveUri
     */
    protected $reserveUri;
    /**
     * @var null|string $retryReserveUrl
     */
    protected $retryReserveUrl;

    /**
     * @param IRequest $request
     * @return IResponse|null
     * @throws MethodNotImplementedException
     */
    function reservationReserveAuthorized(IRequest $request): ?IResponse
    {
        throw new MethodNotImplementedException('');
    }

    /**
     * @return OrderReserveResponse
     * @throws GuzzleException
     */
    function retryReservationReserve(): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_RESERVE,
                new BeforeRequestEvent($this)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getRetryReserveUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_RESERVE,
                new AfterRequestEvent(null, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var ConfirmBookingResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                ConfirmBookingResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_RESERVE,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse())) {
                return $this->retryReservationReserve();
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
    function reservationReserve(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_RESERVE,
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getReserveUri(),
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
            /** @var OrderReserveResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                OrderReserveResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_RESERVE,
                new AfterRequestEvent($request, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->reservationReserve($request);
            }
            throw $exception;
        }
    }

    /**
     * @return string|null
     */
    public function getReserveUri(): ?string
    {
        return $this->reserveUri;
    }

    /**
     * @param string|null $reserveUri
     * @return ReserveController
     */
    public function setReserveUri(?string $reserveUri): ReserveController
    {
        $this->reserveUri = $reserveUri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRetryReserveUrl(): ?string
    {
        return $this->retryReserveUrl;
    }

    /**
     * @param string|null $retryReserveUrl
     * @return ReserveController
     */
    public function setRetryReserveUrl(?string $retryReserveUrl): ReserveController
    {
        $this->retryReserveUrl = $retryReserveUrl;

        return $this;
    }
}
