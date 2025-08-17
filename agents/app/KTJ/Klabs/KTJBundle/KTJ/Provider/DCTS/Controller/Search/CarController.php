<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:20
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Search;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search\ICarController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\CarSearchResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class Car
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Search
 * @method Provider getProvider
 */
class CarController implements ICarController, EventDispatcherAwareInterface, SerializerAwareInterface {
	use EventDispatcherAwareTrait;
	use TProviderAware;
	use SerializerAwareTrait;

	/**
	 * @var null|string $searchUri
	 */
	protected $searchUri;

	/**
	 * @param IRequest $searchRequest
	 *
	 * @return IResponse|null
	 * @throws GuzzleException
	 */
	function searchAuthorized( IRequest $searchRequest ): ?IResponse {
		try
		{
			return $this->search( $searchRequest );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->search( $searchRequest );
					break;
			}
			throw $exception;
		}
	}

	/**
	 * @param IRequest $searchRequest
	 *
	 * @return IResponse|null
	 * @throws GuzzleException
	 */
	function search( IRequest $searchRequest ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_CAR_SEARCH, new BeforeRequestEvent( $this, $searchRequest ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->searchUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $searchRequest, 'json' )
		] );
		$this->eventDispatcher->dispatch( static::AFTER_CAR_SEARCH, new AfterRequestEvent( $searchRequest, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var CarSearchResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			CarSearchResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::AFTER_SERIALIZE, new AfterRequestEvent( $searchRequest, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @param null|string $searchUri
	 *
	 * @return CarController
	 */
	public function setSearchUri( ?string $searchUri ): CarController {
		$this->searchUri = $searchUri;

		return $this;
	}
}
