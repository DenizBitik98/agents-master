<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 12:26
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Order;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IReturnController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\OrderReturn\OrderReturnRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\OrderReturn\OrderReturnResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\TerminalsSessionNotStartedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\WorkSessionMustBeClosedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class ReturnController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Order
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
	const BEFORE_RETURN = 'ktj.dcts.order.return.before';
	/**
	 * Event occurs after making ticket return request
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_RETURN = 'ktj.dcts.order.return.after';
	/**
	 * Event occurs after making ticket return result serialize
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_RETURN = 'ktj.dcts.order.return.serialize';

	/**
	 * @var null|string $returnUri
	 */
	protected $returnUri;

	/**
	 * @inheritDoc
	 * @var OrderReturnRequest $request
	 * @throws GuzzleException
	 */
	function orderAuthorized( IRequest $request ): ?IResponse {
		try
		{
			return $this->order( $request );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->orderAuthorized( $request );
					break;
				case 400:
					$dctsException = ExceptionFactory::buildExceptionClassFromResponse( $exception->getResponse() );
					if ( $dctsException instanceof WorkSessionMustBeClosedException )
					{
						$this->getProvider()->getSessionController()->closeAuthorized();

						return $this->orderAuthorized( $request );
					}
					if ( $dctsException instanceof TerminalsSessionNotStartedException )
					{
						$this->getProvider()->getSessionController()->openAuthorized();

						return $this->orderAuthorized( $request );
					}
					break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritDoc
	 * @var OrderReturnRequest $request
	 * @throws GuzzleException
	 */
	function order( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_RETURN, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->returnUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'query'   => [
				'orderId' => $request->getOrderId(),
			]
		] );
		$this->eventDispatcher->dispatch( static::AFTER_RETURN, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var OrderReturnResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			OrderReturnResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_RETURN, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
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
