<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:29
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Order;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IReserveController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ReserveResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Exception\MethodNotImplementedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\DefaultException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\TerminalsSessionNotStartedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\WorkSessionMustBeClosedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class ReservationReserveController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Order
 * @method Provider getProvider
 */
class ReserveController implements IReserveController, EventDispatcherAwareInterface, SerializerAwareInterface
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;
    /**
     * Event occurs before making reservation reserve call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_RESERVE = 'ktj.dcts.reservation.reserve.before';
    /**
     * Event occurs after making reservation reserve call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_RESERVE = 'ktj.dcts.reservation.reserve.after';
    /**
     * Event occurs after making reservation reserve result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_RESERVE = 'ktj.dcts.reservation.reserve.serialize';

    /**
     * @var null|string $reserveUri
     */
    protected $reserveUri;

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     * @throws GuzzleException
     * @throws DefaultException
     */
    function reservationReserveAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->reservationReserve($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->reservationReserveAuthorized($request);
                    break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
                    if ($dctsException instanceof WorkSessionMustBeClosedException) {
                        $this->getProvider()->getSessionController()->closeAuthorized();

                        return $this->reservationReserveAuthorized($request);
                    }
                    if ($dctsException instanceof TerminalsSessionNotStartedException) {
                        $this->getProvider()->getSessionController()->openAuthorized();

                        return $this->reservationReserveAuthorized($request);
                    }
                    break;
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
        $this->eventDispatcher->dispatch(static::BEFORE_RESERVE, new BeforeRequestEvent($this, $request));
        $psrResponse = $this->getProvider()->getHttpClient()->request(
            'post',
            $this->reserveUri,
            [
                'cookies' => $this->getProvider()->getDctsCookies(),
                'body' => $this->getSerializer()->serialize($request, 'json'),
            ]
        );
        $this->eventDispatcher->dispatch(static::AFTER_RESERVE, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        /** @var ReserveResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            ReserveResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(
            static::SERIALIZE_RESERVE,
            new AfterRequestEvent($request, $response, $psrResponse)
        );

        return $response;
    }

    /**
     * @inheritDoc
     */
    function retryReservationReserve(): ?IResponse
    {
        throw new MethodNotImplementedException();
    }

    /**
     * @param null|string $reserveUri
     *
     * @return ReserveController
     */
    public function setReserveUri(?string $reserveUri): ReserveController
    {
        $this->reserveUri = $reserveUri;

        return $this;
    }
}
