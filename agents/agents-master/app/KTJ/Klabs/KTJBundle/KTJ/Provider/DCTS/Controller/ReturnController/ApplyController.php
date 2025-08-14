<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 13:39
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\ReturnController;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IApplyControllerController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Fail\ApplyFailRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Fail\ApplyFailResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\ApplySuccessRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\ApplySuccessResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class ReturnController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\ReturnController
 * @method Provider getProvider
 */
class ApplyController implements IApplyControllerController, EventDispatcherAwareInterface, SerializerAwareInterface {
	use EventDispatcherAwareTrait;
	use TProviderAware;
	use SerializerAwareTrait;

	/**
	 * Event occurs before making route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
	 */
	const BEFORE_SUCCESS = 'ktj.dcts.return.apply.success.before';
	/**
	 * Event occurs after making route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_SUCCESS = 'ktj.dcts.return.apply.success.after';
	/**
	 * Event occurs after making car search result serialize
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_SUCCESS = 'ktj.dcts.return.apply.success.serialize';

	/**
	 * Event occurs before making route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
	 */
	const BEFORE_FAIL = 'ktj.dcts.return.apply.fail.before';
	/**
	 * Event occurs after making route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_FAIL = 'ktj.dcts.return.apply.fail.after';
	/**
	 * Event occurs after making car search result serialize
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_FAIL = 'ktj.dcts.return.apply.fail.serialize';
	/**
	 * @var null|string $successUri
	 */
	protected $successUri;
	/**
	 * @var null|string $failUri
	 */
	protected $failUri;

	/**
	 * @inheritDoc
	 * @throws GuzzleException
	 */
	function applySuccessAuthorized( IRequest $request ): ?IResponse {
		try
		{
			return $this->applySuccess( $request );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->applySuccessAuthorized( $request );
					break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritDoc
	 * @var ApplySuccessRequest $request
	 * @throws GuzzleException
	 */
	function applySuccess( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_SUCCESS, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->successUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $request, 'json' ),
		] );
		$this->eventDispatcher->dispatch( static::AFTER_SUCCESS, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		$response = new ApplySuccessResponse;
		$this->eventDispatcher->dispatch( static::SERIALIZE_SUCCESS, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @inheritDoc
	 * @throws GuzzleException
	 */
	function applyFailAuthorized( IRequest $request ): ?IResponse {
		try
		{
			return $this->applyFail( $request );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->applyFailAuthorized( $request );
					break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritDoc
	 * @var ApplyFailRequest $request
	 * @throws GuzzleException
	 */
	function applyFail( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_FAIL, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->failUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $request, 'json' ),
		] );
		$this->eventDispatcher->dispatch( static::AFTER_FAIL, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var ApplyFailResponse $response */
		$response = $this->getSerializer()->deserialize(
			$psrResponse->getBody()->getContents(),
			ApplyFailResponse::class,
			'json'
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_FAIL, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @param null|string $successUri
	 *
	 * @return ApplyController
	 */
	public function setSuccessUri( ?string $successUri ): ApplyController {
		$this->successUri = $successUri;

		return $this;
	}

	/**
	 * @param null|string $failUri
	 *
	 * @return ApplyController
	 */
	public function setFailUri( ?string $failUri ): ApplyController {
		$this->failUri = $failUri;

		return $this;
	}
}
