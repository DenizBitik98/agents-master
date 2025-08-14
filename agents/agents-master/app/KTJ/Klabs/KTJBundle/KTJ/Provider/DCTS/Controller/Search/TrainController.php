<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:19
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Search;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search\ITrainController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\TrainSearchResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class Train
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Search
 * @method Provider getProvider
 */
class TrainController implements ITrainController, EventDispatcherAwareInterface, SerializerAwareInterface {
	use EventDispatcherAwareTrait;
	use TProviderAware;
	use SerializerAwareTrait;
	/**
	 * Event occurs before making train search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
	 */
	const BEFORE_SEARCH = 'ktj.dcts.search.train.before';
	/**
	 * Event occurs after making train search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_SEARCH = 'ktj.dcts.search.train.after';
	/**
	 * Event occurs after making train search result serialize
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_SEARCH = 'ktj.dcts.search.train.serialize';
	/**
	 * @var null|string $searchUri
	 */
	protected $searchUri;

	/**
	 * @inheritDoc
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
	 * @inheritDoc
	 * @throws GuzzleException
	 */
	function search( IRequest $searchRequest ): ?IResponse {

		$this->eventDispatcher->dispatch( static::BEFORE_SEARCH, new BeforeRequestEvent( $this, $searchRequest ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->searchUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $searchRequest, 'json' )
		] );
		$this->eventDispatcher->dispatch( static::AFTER_SEARCH, new AfterRequestEvent( $searchRequest, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var TrainSearchResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			TrainSearchResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_SEARCH, new AfterRequestEvent( $searchRequest, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @param null|string $searchUri
	 *
	 * @return TrainController
	 */
	public function setSearchUri( ?string $searchUri ): TrainController {
		$this->searchUri = $searchUri;

		return $this;
	}
}
