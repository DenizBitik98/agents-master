<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 16:22
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\ITicketController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Ticket\TerminalInfo\TicketTerminalInfoResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\IErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;
use Symfony\Component\Intl\Exception\MethodNotImplementedException;
use Symfony\Component\Intl\Exception\NotImplementedException;

/**
 * Class TicketController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report
 * @method Provider getProvider
 */
class TicketController implements ITicketController, EventDispatcherAwareInterface, SerializerAwareInterface, IErrorHandlerAware
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;
    use TErrorHandlerAware;
    /**
     * Event occurs before making ticket status report
     * @Event("Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent")
     */
    const BEFORE_REPORT_TICKET_STATUS = 'ktj.mq.report.ticket.status.before';
    /**
     * Event occurs after making ticket status report
     * @Event("Klabs\KTJBundle\KTJ\Provider\mq\Event\AfterRequestEvent")
     */
    const AFTER_REPORT_TICKET_STATUS = 'ktj.mq.report.ticket.status.after';
    /**
     * Event occurs after serializing response of ticket status report
     * @Event("Klabs\KTJBundle\KTJ\Provider\mq\Event\AfterRequestEvent")
     */
    const SERIALIZE_REPORT_TICKET_STATUS = 'ktj.mq.report.ticket.status.serialize';

    /**
     * Event occurs before making terminal info request
     * @Event("Klabs\KTJBundle\KTJ\Provider\mq\Event\BeforeRequestEvent")
     */
    const BEFORE_REPORT_TICKET_TERMINAL_INFO = 'ktj.mq.report.ticket.terminal info.before';
    /**
     * Event occurs after making terminal info request
     * @Event("Klabs\KTJBundle\KTJ\Provider\mq\Event\AfterRequestEvent")
     */
    const AFTER_REPORT_TICKET_TERMINAL_INFO = 'ktj.mq.report.ticket.terminal info.after';
    /**
     * Event occurs after serializing terminal info response
     * @Event("Klabs\KTJBundle\KTJ\Provider\mq\Event\AfterRequestEvent")
     */
    const SERIALIZE_REPORT_TICKET_TERMINAL_INFO = 'ktj.mq.report.ticket.terminal info.serialize';

    /**
     * @var null|string $reportStatusUri
     */
    protected $reportStatusUri;

    /**
     * @var null|string $reportTerminalInfoUri
     */
    protected $reportTerminalInfoUri;

    /**
     * @inheritDoc
     */
    function statusAuthorized(IRequest $request): ?IResponse
    {
        throw new MethodNotImplementedException('statusAuthorized');
    }

    /**
     * @inheritDoc
     */
    function status(IRequest $request): ?IResponse
    {
        throw new MethodNotImplementedException('status');
    }

    /**
     * @inheritDoc
     */
    function terminalInfoAuthorized(IRequest $request): ?IResponse
    {
        throw new NotImplementedException('');
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function terminalInfo(IRequest $request): ?IResponse
    {
        try {
            $this->eventDispatcher->dispatch(
                static::BEFORE_REPORT_TICKET_TERMINAL_INFO.$this->getProvider()->getQueueId(),
                new BeforeRequestEvent($this, $request)
            );
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->reportTerminalInfoUri,
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $this->eventDispatcher->dispatch(
                static::AFTER_REPORT_TICKET_TERMINAL_INFO,
                new AfterRequestEvent($request, null, $psrResponse)
            );
            $psrResponse->getBody()->rewind();
            /** @var TicketTerminalInfoResponse $response */
            $response = $this->getSerializer()->deserialize(
                $psrResponse->getBody()->getContents(),
                TicketTerminalInfoResponse::class,
                'json'
            );
            $this->eventDispatcher->dispatch(
                static::SERIALIZE_REPORT_TICKET_TERMINAL_INFO,
                new AfterRequestEvent($request, $response, $psrResponse)
            );

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->terminalInfo($request);
            }
            throw $exception;
        }

    }

    /**
     * @param null|string $reportStatusUri
     *
     * @return TicketController
     */
    public function setReportStatusUri(?string $reportStatusUri): TicketController
    {
        $this->reportStatusUri = $reportStatusUri;

        return $this;
    }

    /**
     * @param null|string $reportTerminalInfoUri
     *
     * @return TicketController
     */
    public function setReportTerminalInfoUri(?string $reportTerminalInfoUri): TicketController
    {
        $this->reportTerminalInfoUri = $reportTerminalInfoUri;

        return $this;
    }
}
