<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 0:04
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\ITrainController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route\TrainRouteResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class TrainController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report
 * @method Provider getProvider
 */
class TrainController implements ITrainController, EventDispatcherAwareInterface, SerializerAwareInterface {
	use EventDispatcherAwareTrait;
	use TProviderAware;
	use SerializerAwareTrait;

	/**
	 * Event occurs before making train route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
	 */
	const BEFORE_REPORT_TRAIN_ROUTE = 'ktj.dcts.report.train.route.before';
	/**
	 * Event occurs after making train route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_REPORT_TRAIN_ROUTE = 'ktj.dcts.report.train.route.after';
	/**
	 * Event occurs after making car search result serialize
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_SERIALIZE = 'ktj.dcts.report.train.route.serialize';

	/**
	 * @var null|string $routeUri
	 */
	protected $routeUri;

	/**
	 * @param IRequest $statuses
	 *
	 * @return IResponse|null
	 * @throws GuzzleException
	 */
	function routeAuthorized( IRequest $statuses ): ?IResponse {
		try
		{
			return $this->route( $statuses );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->route( $statuses );
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
	function route( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_REPORT_TRAIN_ROUTE, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->routeUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $request, 'json' )
		] );
		$this->eventDispatcher->dispatch( static::AFTER_REPORT_TRAIN_ROUTE, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var TrainRouteResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			TrainRouteResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::AFTER_SERIALIZE, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @param null|string $routeUri
	 *
	 * @return TrainController
	 */
	public function setRouteUri( ?string $routeUri ): TrainController {
		$this->routeUri = $routeUri;

		return $this;
	}
}
