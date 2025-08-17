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
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IConfirmController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\ConfirmResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Exception\MethodNotImplementedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class ReservationConfirmController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Reservation
 * @method Provider getProvider
 */
class ConfirmController implements IConfirmController, EventDispatcherAwareInterface, SerializerAwareInterface
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;
    /**
     * Event occurs before making reservation confirm call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_CONFIRM = 'ktj.dcts.order.confirm.before';
    /**
     * Event occurs after making reservation confirm call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_CONFIRM = 'ktj.dcts.order.confirm.after';
    /**
     * Event occurs after making reservation confirm result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_CONFIRM = 'ktj.dcts.order.confirm.serialize';

    /**
     * @var null|string $confirmUri
     */
    protected $confirmUri;

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     * @throws GuzzleException
     */
    function reservationConfirmAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->reservationConfirm($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->reservationConfirmAuthorized($request);
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
    function reservationConfirm(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_CONFIRM, new BeforeRequestEvent($this, $request));
        $psrResponse = $this->getProvider()->getHttpClient()->request(
            'post',
            $this->confirmUri,
            [
                'cookies' => $this->getProvider()->getDctsCookies(),
                'body' => $this->getSerializer()->serialize($request, 'json'),
            ]
        );
        $this->eventDispatcher->dispatch(static::AFTER_CONFIRM, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        /** @var ConfirmResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            ConfirmResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(
            static::SERIALIZE_CONFIRM,
            new AfterRequestEvent($request, $response, $psrResponse)
        );

        return $response;
    }

    /**
     * @inheritDoc
     */
    function reservationRetryConfirm(): ?IResponse
    {
        throw new MethodNotImplementedException('DCTS has not retry confirm request');
    }

    /**
     * @param null|string $confirmUri
     *
     * @return ConfirmController
     */
    public function setConfirmUri(?string $confirmUri): ConfirmController
    {
        $this->confirmUri = $confirmUri;

        return $this;
    }
}
