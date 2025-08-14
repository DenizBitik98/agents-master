<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Order;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\ICancelController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Cancel\Response as OrderCancelResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;

/**
 * Class CancelController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Order
 * @method Provider getProvider() : ?IProvider
 */
class CancelController implements ICancelController
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
     * Event occurs before making reservation cancel call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_CANCEL = 'ktj.mq.reservation.cancel.before';
    /**
     * Event occurs after making reservation cancel call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_CANCEL = 'ktj.mq.reservation.cancel.after';
    /**
     * Event occurs after making reservation cancel result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_CANCEL = 'ktj.mq.reservation.cancel.serialize';

    /**
     * @var null|string $cancelUrl
     */
    protected $cancelUrl;
    /**
     * @var null|string $retryCancelUrl
     */
    protected $retryCancelUrl;

    /**
     * @return string|null
     */
    public function getCancelUrl(): ?string
    {
        return $this->cancelUrl;
    }

    /**
     * @param string|null $cancelUrl
     * @return CancelController
     */
    public function setCancelUrl(?string $cancelUrl): CancelController
    {
        $this->cancelUrl = $cancelUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRetryCancelUrl(): ?string
    {
        return $this->retryCancelUrl;
    }

    /**
     * @param string|null $retryCancelUrl
     * @return CancelController
     */
    public function setRetryCancelUrl(?string $retryCancelUrl): CancelController
    {
        $this->retryCancelUrl = $retryCancelUrl;

        return $this;
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function cancel(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_CANCEL.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getCancelUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_CANCEL,
                new AfterRequestEvent(null, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var OrderCancelResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                OrderCancelResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_CANCEL,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->retryCancel();
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function retryCancel(): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_CANCEL.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getRetryCancelUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_CANCEL,
                new AfterRequestEvent(null, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var OrderCancelResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                OrderCancelResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_CANCEL,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse())) {
                return $this->retryCancel();
            }
            throw $exception;
        }
    }
}
