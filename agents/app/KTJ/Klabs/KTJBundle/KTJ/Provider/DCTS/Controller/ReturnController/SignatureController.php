<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 15:28
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\ReturnController;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\ISignatureController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Signature\SignatureResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class SignatureController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\ReturnController
 * @method Provider getProvider(): ?IProvider
 */
class SignatureController implements ISignatureController, SerializerAwareInterface, EventDispatcherAwareInterface {
	use TProviderAware;
	use SerializerAwareTrait;
	use EventDispatcherAwareTrait;
	/**
	 * Event occurs before making route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
	 */
	const BEFORE_SIGNATURE = 'ktj.dcts.return.signature.before';
	/**
	 * Event occurs after making route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_SIGNATURE = 'ktj.dcts.return.signature.after';
	/**
	 * Event occurs after making car search result serialize
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const SERIALIZE_SIGNATURE = 'ktj.dcts.return.signature.serialize';
	/**
	 * @var null|string $signatureUri
	 */
	protected $signatureUri;

	/**
	 * @inheritDoc
	 * @throws GuzzleException
	 */
	function signatureAuthorized( IRequest $request ): ?IResponse {
		try
		{
			return $this->signature( $request );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->signatureAuthorized( $request );
					break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritDoc
	 * @throws GuzzleException
	 */
	function signature( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_SIGNATURE, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->signatureUri, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $request, 'json' ),
		] );
		$this->eventDispatcher->dispatch( static::AFTER_SIGNATURE, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		/** @var SignatureResponse $response */
		$response = new SignatureResponse(
			$psrResponse->getBody()->getContents()
		);
		$this->eventDispatcher->dispatch( static::SERIALIZE_SIGNATURE, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @param null|string $signatureUri
	 *
	 * @return SignatureController
	 */
	public function setSignatureUri( ?string $signatureUri ): SignatureController {
		$this->signatureUri = $signatureUri;

		return $this;
	}
}
