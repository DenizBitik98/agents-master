<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Order;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IFinalizeController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Finalize\Response as OrderFinalizeResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;

/**
 * Class FinalizeController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Order
 * @method Provider getProvider() : ?IProvider
 */
class FinalizeController implements IFinalizeController
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
     * Event occurs before making reservation finalize call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_RESERVE = 'ktj.mq.reservation.finalize.before';
    /**
     * Event occurs after making reservation finalize call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_RESERVE = 'ktj.mq.reservation.finalize.after';
    /**
     * Event occurs after making reservation finalize result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_RESERVE = 'ktj.mq.reservation.finalize.serialize';
    /**
     * @var null|string $finalizeUrl
     */
    protected $finalizeUrl;

    /**
     * @return string|null
     */
    public function getFinalizeUrl(): ?string
    {
        return $this->finalizeUrl;
    }

    /**
     * @param string|null $finalizeUrl
     * @return FinalizeController
     */
    public function setFinalizeUrl(?string $finalizeUrl): FinalizeController
    {
        $this->finalizeUrl = $finalizeUrl;

        return $this;
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function finalize(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_RESERVE.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getFinalizeUrl(),
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
            $response = new OrderFinalizeResponse($psrResponse);
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_RESERVE,
                new AfterRequestEvent($request, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->finalize($request);
            }
            throw $exception;
        }
    }
}
