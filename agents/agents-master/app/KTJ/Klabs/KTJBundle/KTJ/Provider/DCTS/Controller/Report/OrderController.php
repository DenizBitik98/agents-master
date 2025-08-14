<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 10:57
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IOrderController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Order\Status\OrderStatusRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Order\Status\OrderStatusResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\TerminalsSessionNotStartedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\WorkSessionMustBeClosedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class OrderController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report
 * @method Provider getProvider
 */
class OrderController implements IOrderController, EventDispatcherAwareInterface, SerializerAwareInterface
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;

    /**
     * Event occurs before making status request
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_STATUS = 'ktj.dcts.report.order.status.before';
    /**
     * Event occurs after making status request
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_STATUS = 'ktj.dcts.report.order.status.after';
    /**
     * Event occurs after making status request
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_STATUS = 'ktj.dcts.report.order.status.serialize';

    /**
     * Event occurs before making express status request
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_EXPRESS_STATUS = 'ktj.dcts.report.order.express status.before';
    /**
     * Event occurs after making express status request
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_EXPRESS_STATUS = 'ktj.dcts.report.order.express status.after';
    /**
     * Event occurs after making express status request
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_EXPRESS_STATUS = 'ktj.dcts.report.order.express status.serialize';

    /**
     * @var null|string $expressStatusUri
     */
    protected $expressStatusUri;

    /**
     * @var null|string $statusUri
     */
    protected $statusUri;

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function getExpressStatusAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->getExpressStatus($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->getExpressStatusAuthorized($request);
                    break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
                    if ($dctsException instanceof WorkSessionMustBeClosedException) {
                        $this->getProvider()->getSessionController()->closeAuthorized();

                        return $this->getExpressStatusAuthorized($request);
                    }
                    if ($dctsException instanceof TerminalsSessionNotStartedException) {
                        $this->getProvider()->getSessionController()->openAuthorized();

                        return $this->getExpressStatusAuthorized($request);
                    }
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @param OrderStatusRequest $request
     *
     * @inheritDoc
     * @throws GuzzleException
     */
    function getExpressStatus(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_STATUS, new BeforeRequestEvent($this, $request));
        $psrResponse = $this->getProvider()->getHttpClient()->request('get', $this->getExpressStatusUri(), [
            'cookies' => $this->getProvider()->getDctsCookies(),
            'query' => [
                'orderId' => $request->getOrderId()
            ],
        ]);
        $this->eventDispatcher->dispatch(static::AFTER_STATUS, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        /** @var OrderStatusResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            OrderStatusResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_STATUS, new AfterRequestEvent($request, $response, $psrResponse));

        return $response;
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function getStatusAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->getStatus($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->getStatus($request);
                    break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
                    if ($dctsException instanceof WorkSessionMustBeClosedException) {
                        $this->getProvider()->getSessionController()->closeAuthorized();

                        return $this->getStatusAuthorized($request);
                    }
                    if ($dctsException instanceof TerminalsSessionNotStartedException) {
                        $this->getProvider()->getSessionController()->openAuthorized();

                        return $this->getStatusAuthorized($request);
                    }
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @param OrderStatusRequest $request
     * @throws GuzzleException
     */
    function getStatus(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_STATUS, new BeforeRequestEvent($this, $request));
        $psrResponse = $this->getProvider()->getHttpClient()->request('get', $this->getStatusUri(), [
            'cookies' => $this->getProvider()->getDctsCookies(),
            'query' => [
                'orderId' => $request->getOrderId()
            ],
        ]);
        $this->eventDispatcher->dispatch(static::AFTER_STATUS, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        /** @var OrderStatusResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            OrderStatusResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_STATUS, new AfterRequestEvent($request, $response, $psrResponse));

        return $response;
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function getExpressStatusByTicketNumberAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->getExpressByTicketNumberStatus($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->getExpressByTicketNumberStatus($request);
                    break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
                    if ($dctsException instanceof WorkSessionMustBeClosedException) {
                        $this->getProvider()->getSessionController()->closeAuthorized();

                        return $this->getExpressStatusByTicketNumberAuthorized($request);
                    }
                    if ($dctsException instanceof TerminalsSessionNotStartedException) {
                        $this->getProvider()->getSessionController()->openAuthorized();

                        return $this->getExpressStatusByTicketNumberAuthorized($request);
                    }
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @param OrderStatusRequest $request
     *
     * @inheritDoc
     * @throws GuzzleException
     */
    function getExpressByTicketNumberStatus(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_STATUS, new BeforeRequestEvent($this, $request));
        $psrResponse = $this->getProvider()->getHttpClient()->request('get', $this->getExpressStatusUri(), [
            'cookies' => $this->getProvider()->getDctsCookies(),
            'query' => [
                'ticketExpressId' => $request->getTicketNumber()
            ],
        ]);
        $this->eventDispatcher->dispatch(static::AFTER_STATUS, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        /** @var OrderStatusResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            OrderStatusResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_STATUS, new AfterRequestEvent($request, $response, $psrResponse));

        return $response;
    }


    /**
     * @param null|string $expressStatusUri
     *
     * @return OrderController
     */
    public function setExpressStatusUri(?string $expressStatusUri): OrderController
    {
        $this->expressStatusUri = $expressStatusUri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpressStatusUri(): ?string
    {
        return $this->expressStatusUri;
    }

    /**
     * @return string|null
     */
    public function getStatusUri(): ?string
    {
        return $this->statusUri;
    }

    /**
     * @param string|null $statusUri
     * @return OrderController
     */
    public function setStatusUri(?string $statusUri): OrderController
    {
        $this->statusUri = $statusUri;
        return $this;
    }
}
