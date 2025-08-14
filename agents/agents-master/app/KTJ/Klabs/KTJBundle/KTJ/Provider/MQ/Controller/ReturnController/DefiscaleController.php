<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\ReturnController;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IDefiscaleController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Finalize\Response as OrderFinalizeResponse;

/**
 * Class DefiscaleController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\ReturnController
 * @method Provider getProvider(): ?IProvider
 */
class DefiscaleController implements IDefiscaleController, EventDispatcherAwareInterface, SerializerAwareInterface
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;

    /**
     * @var null|string $defiscaleUri
     */
    protected $defiscaleUri;

    /**
     * Event occurs before making reservation fiscalize call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_DEFISCALE = 'ktj.mq.return.defiscale.before';
    /**
     * Event occurs after making reservation fiscalize call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_DEFISCALE = 'ktj.mq.return.defiscale.after';
    /**
     * Event occurs after making reservation fiscalize result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_DEFISCALE = 'ktj.mq.return.defiscale.serialize';

    /**
     * @inheritDoc
     */
    function defiscale(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_DEFISCALE.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getDefiscaleUri(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_DEFISCALE,
                new \Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent($request, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            $response = new OrderFinalizeResponse($psrResponse);
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_DEFISCALE,
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
    public function getDefiscaleUri(): ?string
    {
        return $this->defiscaleUri;
    }

    /**
     * @param string|null $defiscaleUri
     */
    public function setDefiscaleUri(?string $defiscaleUri): void
    {
        $this->defiscaleUri = $defiscaleUri;
    }
}
