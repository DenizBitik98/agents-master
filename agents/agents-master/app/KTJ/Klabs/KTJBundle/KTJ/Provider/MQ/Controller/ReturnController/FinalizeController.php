<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\ReturnController;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IDefiscaleController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IFinalizeController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Finalize\Response as OrderFinalizeResponse;

/**
 * Class FinalizeController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\ReturnController
 * @method Provider getProvider(): ?IProvider
 */
class FinalizeController implements IFinalizeController, EventDispatcherAwareInterface, SerializerAwareInterface
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;

    /**
     * @var null|string $finalizeUri
     */
    protected $finalizeUri;

    /**
     * Event occurs before making reservation fiscalize call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_FINALIZE = 'ktj.mq.return.finalize.before';
    /**
     * Event occurs after making reservation fiscalize call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_FINALIZE = 'ktj.mq.return.finalize.after';
    /**
     * Event occurs after making reservation fiscalize result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_FINALIZE = 'ktj.mq.return.finalize.serialize';

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function finalize(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_FINALIZE.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getFinalizeUri(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_FINALIZE,
                new AfterRequestEvent($request, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            $response = new OrderFinalizeResponse($psrResponse);
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_FINALIZE,
                new AfterRequestEvent($request, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {

            throw $exception;
        }
    }

    /**
     * @return string|null
     */
    public function getFinalizeUri(): ?string
    {
        return $this->finalizeUri;
    }

    /**
     * @param string|null $finalizeUri
     */
    public function setFinalizeUri(?string $finalizeUri): void
    {
        $this->finalizeUri = $finalizeUri;
    }
}
