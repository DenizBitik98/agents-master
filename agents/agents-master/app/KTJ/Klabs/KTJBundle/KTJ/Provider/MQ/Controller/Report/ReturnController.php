<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IReturnController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info\GetOrderInfoResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\ReturnInfo\ReturnReferenceResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;
use Symfony\Component\Intl\Exception\NotImplementedException;

/**
 * Class ReturnController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report
 * @method Provider getProvider
 */
class ReturnController implements IReturnController, EventDispatcherAwareInterface, SerializerAwareInterface
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;

    /**
     * Event occurs before making station data call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_REPORT_RETURN_REFERENCE = 'ktj.mq.report.return.reference.before';
    /**
     * Event occurs after making station data call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_REPORT_RETURN_REFERENCE = 'ktj.mq.report.return.reference.after';
    /**
     * Event occurs after making station data result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_REPORT_RETURN_REFERENCE = 'ktj.mq.report.return.reference.serialize';
    /**
     * Event occurs before making station data call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_ORDER = 'ktj.mq.report.return.order.before';
    /**
     * Event occurs after making station data call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_ORDER = 'ktj.mq.report.return.order.after';
    /**
     * Event occurs after making station data result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_ORDER = 'ktj.mq.report.return.order.serialize';

    /**
     * @var null|string $referenceUri
     */
    protected $referenceUri;
    /**
     * @var null|string $orderUri
     */
    protected $orderUri;

    /**
     * @inheritDoc
     */
    function orderInformationAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->orderInformation($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->orderInformation($request);
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     */
    function orderInformation(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_ORDER.$this->getProvider()->getQueueId(), new BeforeRequestEvent($this, $request));

        $psrResponse = $this->getProvider()->getHttpClient()->request('post', $this->getOrderUri(), [
            'cookies' => $this->getProvider()->getMqCookies(),
            'body' => $this->getSerializer()->serialize($request, 'json')
        ]);
        $this->eventDispatcher->dispatch(static::AFTER_ORDER, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();

        /** @var GetOrderInfoResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            GetOrderInfoResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_ORDER, new AfterRequestEvent($request, $response, $psrResponse));

        return $response;
    }


    /**
     * @inheritDoc
     */
    function ticketInformationAuthorized(IRequest $request): ?IResponse
    {
        throw new NotImplementedException('');
    }


    /**
     * @inheritDoc
     */
    function ticketInformation(IRequest $request): ?IResponse
    {
        throw new NotImplementedException('');
    }


    /**
     * @inheritDoc
     */
    function statusAuthorized(IRequest $request): ?IResponse
    {
        throw new NotImplementedException('');
    }


    /**
     * @inheritDoc
     */
    function status(IRequest $request): ?IResponse
    {
        throw new NotImplementedException('');
    }

    /**
     * @inheritDoc
     */
    function referenceAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->reference($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->reference($request);
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     */
    function reference(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_REPORT_RETURN_REFERENCE.$this->getProvider()->getQueueId(), new BeforeRequestEvent($this, $request));

        $psrResponse = $this->getProvider()->getHttpClient()->request('post', $this->getReferenceUri(), [
            'cookies' => $this->getProvider()->getMqCookies(),
            'body' => $this->getSerializer()->serialize($request, 'json')
        ]);
        $this->eventDispatcher->dispatch(static::AFTER_REPORT_RETURN_REFERENCE, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();

        /** @var ReturnReferenceResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            ReturnReferenceResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_REPORT_RETURN_REFERENCE, new AfterRequestEvent($request, $response, $psrResponse));

        return $response;
    }

    /**
     * @return string|null
     */
    public function getReferenceUri(): ?string
    {
        return $this->referenceUri;
    }

    /**
     * @param string|null $referenceUri
     */
    public function setReferenceUri(?string $referenceUri): void
    {
        $this->referenceUri = $referenceUri;
    }

    /**
     * @return string|null
     */
    public function getOrderUri(): ?string
    {
        return $this->orderUri;
    }

    /**
     * @param string|null $orderUri
     */
    public function setOrderUri(?string $orderUri): void
    {
        $this->orderUri = $orderUri;
    }
}
