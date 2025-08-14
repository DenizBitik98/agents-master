<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\SeatReserve;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use JMS\Serializer\SerializationContext;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\IIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\IErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument\TicketDocumentResponse as RequestItemResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\Response\Response as ConfirmItemResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;

/**
 * Class SeatReserveController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\SeatReserve
 * @method Provider getProvider() : ?IProvider
 */
class SeatReserveController implements IController,  SerializerAwareInterface, EventDispatcherAwareInterface, IIdpCookieAware, IErrorHandlerAware
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
    const BEFORE_REQUEST_ITEM = 'ktj.mq.seat_reserve.requestItem.before';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const AFTER_REQUEST_ITEM = 'ktj.mq.seat_reserve.requestItem.after';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const SERIALIZE_REQUEST_ITEM = 'ktj.mq.seat_reserve.requestItem.serialize';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\BeforeRequestEvent")
     */
    const BEFORE_CONFIRM_ITEM = 'ktj.mq.seat_reserve.confirm.before';
    /**
     * @Event("Klabs\KTJBundle\KTJ\Provider\MQ\Event\AfterRequestEvent")
     */
    const AFTER_CONFIRM_ITEM = 'ktj.mq.seat_reserve.confirm.after';

    /**
     * @var null|string $authUrl
     */
    protected $requestItemUrl;
    /**
     * @var null|string $confirmItemUrl
     */
    protected $confirmItemUrl;

    /**
     * @return string|null
     */
    public function getRequestItemUrl(): ?string
    {
        return $this->requestItemUrl;
    }

    /**
     * @param string|null $requestItemUrl
     * @return SeatReserveController
     */
    public function setRequestItemUrl(?string $requestItemUrl): SeatReserveController
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
     * @return SeatReserveController
     */
    public function setConfirmItemUrl(?string $confirmItemUrl): SeatReserveController
    {
        $this->confirmItemUrl = $confirmItemUrl;

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

            $context = new SerializationContext();
            $context->setSerializeNull(true);
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getConfirmItemUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json', $context),
                ]
            );
            $psrResponse->getBody()->rewind();
            /** @var ConfirmItemResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                ConfirmItemResponse::class,
                'json'
            );

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
}
