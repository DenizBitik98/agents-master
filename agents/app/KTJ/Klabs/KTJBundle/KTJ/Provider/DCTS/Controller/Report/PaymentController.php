<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 17:46
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IPaymentController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature\PaymentSignatureResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class PaymentController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report
 * @method Provider getProvider(): ?IProvider
 */
class PaymentController implements IPaymentController, EventDispatcherAwareInterface, SerializerAwareInterface {
	use TProviderAware;
	use EventDispatcherAwareTrait;
	use SerializerAwareTrait;

	/**
	 * Event occurs before making route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
	 */
	const BEFORE_SIGNATURE = 'ktj.dcts.report.payment.signature.before';
	/**
	 * Event occurs after making route search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_SIGNATURE = 'ktj.dcts.report.payment.signature.after';
	/**
	 * Event occurs after making car search result serialize
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_SERIALIZE = 'ktj.dcts.report.payment.signature.serialize';

	/**
	 * @var null|string $signatureUrl
	 */
	protected $signatureUrl;

	/**
	 * @inheritdoc
	 * @throws GuzzleException
	 */
	function getSignatureAuthorized( IRequest $request ): ?IResponse {
		try
		{
			return $this->getSignature( $request );
		}
		catch ( ClientException $exception )
		{
			switch ( $exception->getCode() )
			{
				case 401:
					$this->getProvider()->getAuthController()->refreshProviderCookies();

					return $this->getSignature( $request );
					break;
			}
			throw $exception;
		}
	}

	/**
	 * @inheritdoc
	 * @throws GuzzleException
	 */
	function getSignature( IRequest $request ): ?IResponse {
		$this->eventDispatcher->dispatch( static::BEFORE_SIGNATURE, new BeforeRequestEvent( $this, $request ) );
		$psrResponse = $this->getProvider()->getHttpClient()->request( 'post', $this->signatureUrl, [
			'cookies' => $this->getProvider()->getDctsCookies(),
			'body'    => $this->getSerializer()->serialize( $request, 'json' )
		] );
		$this->eventDispatcher->dispatch( static::AFTER_SIGNATURE, new AfterRequestEvent( $request, null, $psrResponse ) );
		$psrResponse->getBody()->rewind();
		$response = new PaymentSignatureResponse(
			$psrResponse->getBody()->getContents()
		);
		$this->eventDispatcher->dispatch( static::AFTER_SERIALIZE, new AfterRequestEvent( $request, $response, $psrResponse ) );

		return $response;
	}

	/**
	 * @param null|string $signatureUrl
	 *
	 * @return PaymentController
	 */
	public function setSignatureUrl( ?string $signatureUrl ): PaymentController {
		$this->signatureUrl = $signatureUrl;

		return $this;
	}
}
