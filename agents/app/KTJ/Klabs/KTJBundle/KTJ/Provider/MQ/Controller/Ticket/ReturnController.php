<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Ticket;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Ticket\IReturnController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\ReturnTickets\ReturnTicketsResponse;

/**
 * Class ReturnController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Ticket
 * @method Provider getProvider(): ?IProvider
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
    const BEFORE_TICKET_RETURN = 'ktj.mq.ticket.return.before';
    /**
     * Event occurs after making station data call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_TICKET_RETURN = 'ktj.mq.ticket.return.after';
    /**
     * Event occurs after making station data result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_TICKET_RETURN = 'ktj.mq.ticket.return.data.serialize';

    /**
     * @var null|string $returnUri
     */
    protected $returnUri;
    /**
     * @var null|string $retryReturnUri
     */
    protected $retryReturnUri;

    /**
     * @inheritDoc
     */
    function returnTicketAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->returnTicket($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->returnTicket($request);
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     */
    function returnTicket(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_TICKET_RETURN.$this->getProvider()->getQueueId(), new BeforeRequestEvent($this, $request));

        $psrResponse = $this->getProvider()->getHttpClient()->request('post', $this->getReturnUri(), [
            'cookies' => $this->getProvider()->getMqCookies(),
            'body' => $this->getSerializer()->serialize($request, 'json')
        ]);
        $this->eventDispatcher->dispatch(static::AFTER_TICKET_RETURN, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();

        /** @var ReturnTicketsResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            ReturnTicketsResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_TICKET_RETURN, new AfterRequestEvent($request, $response, $psrResponse));

        return $response;
    }

    /**
     * @return IResponse|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function retryReturnTicket(): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_TICKET_RETURN.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getRetryReturnUri(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_TICKET_RETURN,
                new AfterRequestEvent(null, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var ReturnTicketsResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                ReturnTicketsResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_TICKET_RETURN,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {

            throw $exception;
        }
    }


    /**
     * @return string|null
     */
    public function getReturnUri(): ?string
    {
        return $this->returnUri;
    }

    /**
     * @param string|null $returnUri
     */
    public function setReturnUri(?string $returnUri): void
    {
        $this->returnUri = $returnUri;
    }

    /**
     * @return string|null
     */
    public function getRetryReturnUri(): ?string
    {
        return $this->retryReturnUri;
    }

    /**
     * @param string|null $retryReturnUri
     */
    public function setRetryReturnUri(?string $retryReturnUri): void
    {
        $this->retryReturnUri = $retryReturnUri;
    }
}
