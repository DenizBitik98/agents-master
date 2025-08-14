<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Queue;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\IIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Queue\IQueueController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Exception\MethodNotImplementedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\IErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking\Response as ConfirmBookingResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmItem\Response as ConfirmItemResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem\Response as GetItemResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem\Response as RequestItemResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;

/**
 * Class QueueController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Queue
 * @method Provider getProvider
 */
class QueueController implements IQueueController, SerializerAwareInterface, EventDispatcherAwareInterface, IIdpCookieAware, IErrorHandlerAware
{
    use SerializerAwareTrait;
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use TIdpCookieAware;
    use TErrorHandlerAware;
    use TCacheAdapterAware {
        setCacheAdapter as setCacheAdapterTrait;
    }
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\BeforeRequestEvent")
     */
    const BEFORE_REQUEST_ITEM = 'ktj.mq.queue.requestItem.before';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const AFTER_REQUEST_ITEM = 'ktj.mq.queue.requestItem.after';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const SERIALIZE_REQUEST_ITEM = 'ktj.mq.queue.requestItem.serialize';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\BeforeRequestEvent")
     */
    const BEFORE_CONFIRM = 'ktj.mq.queue.confirmItem.before';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const AFTER_CONFIRM = 'ktj.mq.queue.confirmItem.after';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const SERIALIZE_CONFIRM_ITEM = 'ktj.mq.queue.confirmItem.serialize';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\BeforeRequestEvent")
     */
    const BEFORE_GET_REQUESTED_ITEMS = 'ktj.mq.queue.getRequestedItems.before';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const AFTER_GET_REQUESTED_ITEMS = 'ktj.mq.queue.getRequestedItems.after';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const SERIALIZE_GET_REQUESTED_ITEMS = 'ktj.mq.queue.getRequestedItems.serialize';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\BeforeRequestEvent")
     */
    const BEFORE_GET_ITEM = 'ktj.mq.queue.getItem.before';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const AFTER_GET_ITEM = 'ktj.mq.queue.getItem.after';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const SERIALIZE_GET_ITEM = 'ktj.mq.queue.getItem.serialize';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\BeforeRequestEvent")
     */
    const BEFORE_CONFIRM_BOOKING = 'ktj.mq.queue.confirmBooking.before';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const AFTER_CONFIRM_BOOKING = 'ktj.mq.queue.confirmBooking.after';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const SERIALIZE_CONFIRM_BOOKING = 'ktj.mq.queue.confirmBooking.serialize';

    /**
     * @var null|string $authUrl
     */
    protected $requestItemUrl;
    /**
     * @var null|string $confirmItemUrl
     */
    protected $confirmItemUrl;
    /**
     * @var null|string $getRequestedItemsUrl
     */
    protected $getRequestedItemsUrl;
    /**
     * @var null|string $getItemUrl
     */
    protected $getItemUrl;
    /**
     * @var null|string $confirmBookingUrl
     */
    protected $confirmBookingUrl;

    /**
     * @return string|null
     */
    public function getRequestItemUrl(): ?string
    {
        return $this->requestItemUrl;
    }

    /**
     * @param string|null $requestItemUrl
     * @return QueueController
     */
    public function setRequestItemUrl(?string $requestItemUrl): QueueController
    {
        $this->requestItemUrl = $requestItemUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmItemUrl(): ?string
    {
        return $this->confirmItemUrl;
    }

    /**
     * @param string|null $confirmItemUrl
     * @return QueueController
     */
    public function setConfirmItemUrl(?string $confirmItemUrl): QueueController
    {
        $this->confirmItemUrl = $confirmItemUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGetRequestedItemsUrl(): ?string
    {
        return $this->getRequestedItemsUrl;
    }

    /**
     * @param string|null $getRequestedItemsUrl
     * @return QueueController
     */
    public function setGetRequestedItemsUrl(?string $getRequestedItemsUrl): QueueController
    {
        $this->getRequestedItemsUrl = $getRequestedItemsUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGetItemUrl(): ?string
    {
        return $this->getItemUrl;
    }

    /**
     * @param string|null $getItemUrl
     * @return QueueController
     */
    public function setGetItemUrl(?string $getItemUrl): QueueController
    {
        $this->getItemUrl = $getItemUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmBookingUrl(): ?string
    {
        return $this->confirmBookingUrl;
    }

    /**
     * @param string|null $confirmBookingUrl
     * @return QueueController
     */
    public function setConfirmBookingUrl(?string $confirmBookingUrl): QueueController
    {
        $this->confirmBookingUrl = $confirmBookingUrl;

        return $this;
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function RequestItem(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_REQUEST_ITEM.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getRequestItemUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_REQUEST_ITEM,
                new AfterRequestEvent($request, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var RequestItemResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                RequestItemResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_REQUEST_ITEM,
                new AfterRequestEvent($request, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->RequestItem($request);
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function ConfirmItem(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_REQUEST_ITEM.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getConfirmItemUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_REQUEST_ITEM,
                new AfterRequestEvent($request, null, $psrResponse)
            );
            $response = new ConfirmItemResponse();
            $response->setResponse($psrResponse);

            $this->eventDispatcher->dispatch(
                static::SERIALIZE_REQUEST_ITEM,
                new AfterRequestEvent($request, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->ConfirmItem($request);
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws MethodNotImplementedException
     */
    function GetRequestedItems(IRequest $request): ?IResponse
    {
        throw new MethodNotImplementedException();
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function GetItem(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_GET_ITEM.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getGetItemUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_GET_ITEM,
                new AfterRequestEvent($request, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var GetItemResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                GetItemResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_GET_ITEM,
                new AfterRequestEvent($request, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->GetItem($request);
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function ConfirmBooking(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_CONFIRM_BOOKING.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getConfirmBookingUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_CONFIRM_BOOKING,
                new AfterRequestEvent($request, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var ConfirmBookingResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                ConfirmBookingResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_CONFIRM_BOOKING,
                new AfterRequestEvent($request, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->ConfirmBooking($request);
            }
            throw $exception;
        }
    }
}
