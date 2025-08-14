<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 13:07
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report;

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
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\GetTicketsStatuses\GetTicketsStatusesResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Ticket\TerminalInfo\TicketTerminalInfoResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class TicketController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report
 * @method Provider getProvider
 */
class TicketController implements ITicketController, EventDispatcherAwareInterface, SerializerAwareInterface {
	use EventDispatcherAwareTrait;
	use TProviderAware;
	use SerializerAwareTrait;

	/**
	 * Event occurs before making ticket status report
	 * @Event("Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent")
	 */
	const BEFORE_REPORT_TICKET_STATUS = 'ktj.dcts.report.ticket.status.before';
	/**
	 * Event occurs after making ticket status report
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_REPORT_TICKET_STATUS = 'ktj.dcts.report.ticket.status.after';
	/**
	 * Event occurs after serializing response of ticket status report
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_REPORT_TICKET_STATUS = 'ktj.dcts.report.ticket.status.serialize';

	/**
	 * Event occurs before making terminal info request
	 * @Event("Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent")
	 */
	const BEFORE_REPORT_TICKET_TERMINAL_INFO = 'ktj.dcts.report.ticket.terminal info.before';
	/**
	 * Event occurs after making terminal info request
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_REPORT_TICKET_TERMINAL_INFO = 'ktj.dcts.report.ticket.terminal info.after';
	/**
	 * Event occurs after serializing terminal info response
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_REPORT_TICKET_TERMINAL_INFO = 'ktj.dcts.report.ticket.terminal info.serialize';

	/**
	 * @var null|string $statusUri
	 */
	protected $statusUri;

	/**
	 * @var null|string $terminalInfoUri
	 */
	protected $terminalInfoUri;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 * @throws GuzzleException
	 */
	function statusAuthorized( IRequest $request ): ?IResponse {
		try
		{
			return $this->status( $request );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->statusAuthorized( $request );
					break;
			}
			throw $exception;
		}
	}

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 * @throws GuzzleException
	 */
	function status( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_REPORT_TICKET_STATUS, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->statusUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $request, 'json' )
		] );
		$this->eventDispatcher->dispatch( static::AFTER_REPORT_TICKET_STATUS, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var GetTicketsStatusesResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			GetTicketsStatusesResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_REPORT_TICKET_STATUS, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @inheritdoc
	 * @throws GuzzleException
	 */
	function terminalInfoAuthorized( IRequest $request ): ?IResponse {
		try
		{
			return $this->terminalInfo( $request );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->terminalInfoAuthorized( $request );
					break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritdoc
	 * @throws GuzzleException
	 */
	function terminalInfo( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_REPORT_TICKET_TERMINAL_INFO, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->terminalInfoUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $request, 'json' )
		] );
		$this->eventDispatcher->dispatch( static::AFTER_REPORT_TICKET_TERMINAL_INFO, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var TicketTerminalInfoResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			TicketTerminalInfoResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_REPORT_TICKET_TERMINAL_INFO, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @param null|string $statusUri
	 *
	 * @return TicketController
	 */
	public function setStatusUri( ?string $statusUri ): TicketController {
		$this->statusUri = $statusUri;

		return $this;
	}

	/**
	 * @param null|string $terminalInfoUri
	 *
	 * @return TicketController
	 */
	public function setTerminalInfoUri( ?string $terminalInfoUri ): TicketController {
		$this->terminalInfoUri = $terminalInfoUri;

		return $this;
	}
}
