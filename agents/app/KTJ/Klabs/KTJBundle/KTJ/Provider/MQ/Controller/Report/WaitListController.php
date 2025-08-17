<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IWaitListController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\IErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetWaitListTerminalInfo\Response as GetWaitListDisplayTerminalsResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;

/**
 * Class WaitListController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report
 * @method Provider getProvider() : ?IProvider
 */
class WaitListController implements IWaitListController, EventDispatcherAwareInterface, SerializerAwareInterface, IErrorHandlerAware
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;
    use TErrorHandlerAware;
    /**
     * Event occurs before making ticket status report
     * @Event("Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent")
     */
    const BEFORE_DISPLAY_TERMINALS = 'ktj.mq.report.waitlist.display_terminals.before';
    /**
     * Event occurs after making ticket status report
     * @Event("Klabs\KTJBundle\KTJ\Provider\mq\Event\AfterRequestEvent")
     */
    const AFTER_DISPLAY_TERMINALS = 'ktj.mq.report.waitlist.display_terminals.after';
    /**
     * Event occurs after serializing response of ticket status report
     * @Event("Klabs\KTJBundle\KTJ\Provider\mq\Event\AfterRequestEvent")
     */
    const SERIALIZE_DISPLAY_TERMINALS = 'ktj.mq.report.waitlist.display_terminals.serialize';
    /**
     * @var null|string $displayTerminalsUrl
     */
    protected $displayTerminalsUrl;

    /**
     * @return string|null
     */
    public function getDisplayTerminalsUrl(): ?string
    {
        return $this->displayTerminalsUrl;
    }

    /**
     * @param string|null $displayTerminalsUrl
     * @return WaitListController
     */
    public function setDisplayTerminalsUrl(?string $displayTerminalsUrl): WaitListController
    {
        $this->displayTerminalsUrl = $displayTerminalsUrl;

        return $this;
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function GetWaitlistDisplayTerminals(): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_DISPLAY_TERMINALS.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'get',
                $this->getDisplayTerminalsUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_DISPLAY_TERMINALS,
                new AfterRequestEvent(null, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var null|GetWaitListDisplayTerminalsResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                GetWaitListDisplayTerminalsResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_DISPLAY_TERMINALS,
                new AfterRequestEvent(null, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse())) {
                return $this->GetWaitlistDisplayTerminals();
            }
            throw $exception;
        }
    }
}
