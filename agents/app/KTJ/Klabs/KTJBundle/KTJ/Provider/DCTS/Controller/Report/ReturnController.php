<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.09.2018
 * Time: 12:08
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IReturnController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnOrderRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnOrderResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnTicketRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnTicketResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\StatusRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\StatusResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\TerminalsSessionNotStartedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\WorkSessionMustBeClosedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;
use Symfony\Component\Intl\Exception\NotImplementedException;

/**
 * Class ReturnController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report
 * @method Provider getProvider
 */
class ReturnController implements IReturnController, EventDispatcherAwareInterface, SerializerAwareInterface {
	use EventDispatcherAwareTrait;
	use TProviderAware;
	use SerializerAwareTrait;
	/**
	 * Event occurs before making return order report
	 * @Event("Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent")
	 */
	const BEFORE_ORDER = 'ktj.dcts.report.return.order.before';
	/**
	 * Event occurs after making return order report
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_ORDER = 'ktj.dcts.report.return.order.after';
	/**
	 * Event occurs after serializing response of return order report
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_ORDER = 'ktj.dcts.report.return.order.serialize';
	/**
	 * Event occurs before making return ticket report
	 * @Event("Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent")
	 */
	const BEFORE_TICKET_INFORMATION = 'ktj.dcts.report.return.ticket.before';
	/**
	 * Event occurs after making return ticket report
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_TICKET_INFORMATION = 'ktj.dcts.report.return.ticket.after';
	/**
	 * Event occurs after serializing response of return ticket report
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_TICKET_INFORMATION = 'ktj.dcts.report.return.ticket.serialize';
	/**
	 * Event occurs before making return ticket report
	 * @Event("Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent")
	 */
	const BEFORE_STATUS = 'ktj.dcts.report.return.status.before';
	/**
	 * Event occurs after making return ticket report
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_STATUS = 'ktj.dcts.report.return.status.after';
	/**
	 * Event occurs after serializing response of return ticket report
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_STATUS = 'ktj.dcts.report.return.status.serialize';
	/**
	 * @var null|string $orderUri
	 */
	protected $orderUri;
	/**
	 * @var null|string $ticketInfoUri
	 */
	protected $ticketInfoUri;
	/**
	 * @var null|string $statusUri
	 */
	protected $statusUri;

	/**
	 * @inheritDoc
	 * @throws GuzzleException
	 */
	function orderInformationAuthorized( IRequest $statuses ): ?IResponse {
		try
		{
			return $this->orderInformation( $statuses );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->orderInformationAuthorized( $statuses );
					break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
                    if ($dctsException instanceof WorkSessionMustBeClosedException) {
                        $this->getProvider()->getSessionController()->closeAuthorized();

                        return $this->orderInformationAuthorized($statuses);
                    }
                    if ($dctsException instanceof TerminalsSessionNotStartedException) {
                        $this->getProvider()->getSessionController()->openAuthorized();

                        return $this->orderInformationAuthorized($statuses);
                    }
                    break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritDoc
	 * @var ReturnOrderRequest $request
	 * @throws GuzzleException
	 */
	function orderInformation( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_ORDER, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'get', $this->orderUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'query'   => [
				'orderId' => $request->getOrderId(),
			]
		] );
		$this->eventDispatcher->dispatch( static::AFTER_ORDER, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var ReturnOrderResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			ReturnOrderResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_ORDER, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @inheritDoc
	 * @throws GuzzleException
	 */
	function ticketInformationAuthorized( IRequest $request ): ?IResponse {
		try
		{
			return $this->ticketInformation( $request );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->ticketInformationAuthorized( $request );
					break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
                    if ($dctsException instanceof WorkSessionMustBeClosedException) {
                        $this->getProvider()->getSessionController()->closeAuthorized();

                        return $this->ticketInformationAuthorized($request);
                    }
                    if ($dctsException instanceof TerminalsSessionNotStartedException) {
                        $this->getProvider()->getSessionController()->openAuthorized();

                        return $this->ticketInformationAuthorized($request);
                    }
                    break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritDoc
	 * @var ReturnTicketRequest $request
	 * @throws GuzzleException
	 */
	function ticketInformation( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_TICKET_INFORMATION, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'get', $this->ticketInfoUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'query'   => [
				'orderId'  => $request->getOrderId(),
				'ticketId' => $request->getTicketId(),
			]
		] );
		$this->eventDispatcher->dispatch( static::AFTER_TICKET_INFORMATION, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var ReturnTicketResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			ReturnTicketResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_TICKET_INFORMATION, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @inheritDoc
	 * @var StatusRequest $request
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
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse( $exception->getResponse() );
                    if ( $dctsException instanceof WorkSessionMustBeClosedException )
                    {
                        $this->getProvider()->getSessionController()->closeAuthorized();

                        return $this->statusAuthorized( $request );
                    }
                    if ( $dctsException instanceof TerminalsSessionNotStartedException )
                    {
                        $this->getProvider()->getSessionController()->openAuthorized();

                        return $this->statusAuthorized( $request );
                    }
                    break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritDoc
	 * @var StatusRequest $request
	 * @throws GuzzleException
	 */
	function status( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_STATUS, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->statusUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $request, 'json' )
		] );
		$this->eventDispatcher->dispatch( static::AFTER_STATUS, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var StatusResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			StatusResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_STATUS, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

    /**
     * @inheritDoc
     */
    function referenceAuthorized(IRequest $request): ?IResponse
    {
        throw new NotImplementedException('');
    }

    /**
     * @inheritDoc
     */
    function reference(IRequest $request): ?IResponse
    {
        throw new NotImplementedException('');
    }

	/**
	 * @param null|string $orderUri
	 *
	 * @return ReturnController
	 */
	public function setOrderUri( ?string $orderUri ): ReturnController {
		$this->orderUri = $orderUri;

		return $this;
	}

	/**
	 * @param null|string $ticketInfoUri
	 *
	 * @return ReturnController
	 */
	public function setTicketInfoUri( ?string $ticketInfoUri ): ReturnController {
		$this->ticketInfoUri = $ticketInfoUri;

		return $this;
	}

	/**
	 * @param null|string $statusUri
	 *
	 * @return ReturnController
	 */
	public function setStatusUri( ?string $statusUri ): ReturnController {
		$this->statusUri = $statusUri;

		return $this;
	}
}
