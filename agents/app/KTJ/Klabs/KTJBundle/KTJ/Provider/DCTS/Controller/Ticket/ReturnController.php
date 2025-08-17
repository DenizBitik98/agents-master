<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 10:43
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Ticket;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Ticket\IReturnController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn\TicketReturnRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn\TicketReturnResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\TerminalsSessionNotStartedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\WorkSessionMustBeClosedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;
use Symfony\Component\Intl\Exception\NotImplementedException;

/**
 * Class TicketReturnController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Ticket
 * @method Provider getProvider(): ?IProvider
 */
class ReturnController implements IReturnController, EventDispatcherAwareInterface, SerializerAwareInterface {
	use EventDispatcherAwareTrait;
	use TProviderAware;
	use SerializerAwareTrait;
	/**
	 * Event occurs before making ticket return request
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
	 */
	const BEFORE_RETURN = 'ktj.dcts.ticket.return.before';
	/**
	 * Event occurs after making ticket return request
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_RETURN = 'ktj.dcts.ticket.return.after';
	/**
	 * Event occurs after making ticket return result serialize
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_RETURN = 'ktj.dcts.ticket.return.serialize';

	/**
	 * @var null|string $returnUri
	 */
	protected $returnUri;

	/**
	 * @inheritDoc
	 * @throws GuzzleException
	 */
	function returnTicketAuthorized( IRequest $request ): ?IResponse {
		try
		{
			return $this->returnTicket( $request );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->returnTicketAuthorized( $request );
					break;
				case 400:
					$dctsException = ExceptionFactory::buildExceptionClassFromResponse( $exception->getResponse() );
					if ( $dctsException instanceof WorkSessionMustBeClosedException )
					{
						$this->getProvider()->getSessionController()->closeAuthorized();

						return $this->returnTicketAuthorized( $request );
					}
					if ( $dctsException instanceof TerminalsSessionNotStartedException )
					{
						$this->getProvider()->getSessionController()->openAuthorized();

						return $this->returnTicketAuthorized( $request );
					}
					break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritDoc
	 * @var TicketReturnRequest $request
	 * @throws GuzzleException
	 */
	function returnTicket( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_RETURN, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->returnUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'query'   => [
				'orderId'  => $request->getOrderId(),
				'ticketId' => $request->getTicketId(),
			]
		] );
		$this->eventDispatcher->dispatch( static::AFTER_RETURN, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var TicketReturnResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			TicketReturnResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_RETURN, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

    /**
     * @inheritDoc
     */
    function retryReturnTicket(): ?IResponse
    {
        throw new NotImplementedException('');
    }

	/**
	 * @param null|string $returnUri
	 *
	 * @return ReturnController
	 */
	public function setReturnUri( ?string $returnUri ): ReturnController {
		$this->returnUri = $returnUri;

		return $this;
	}
}
