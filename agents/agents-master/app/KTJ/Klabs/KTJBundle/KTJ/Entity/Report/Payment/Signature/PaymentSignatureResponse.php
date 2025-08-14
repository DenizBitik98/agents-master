<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 17:52
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class PaymentSignatureResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature
 */
class PaymentSignatureResponse implements IResponse {
	/**
	 * @JMS\SerializedName("signature")
	 * @JMS\Type("string")
	 * @var null|string $signature
	 */
	protected $signature;

	/**
	 * PaymentSignatureResponse constructor.
	 *
	 * @param null|string $signature
	 */
	public function __construct( ?string $signature = null ) {
		$this->setSignature( $signature );
	}

	/**
	 * @param bool $trimQuotes
	 *
	 * @return null|string
	 */
	public function getSignature( $trimQuotes = false ): ?string {
		if ( $trimQuotes )
		{
			return trim( $this->signature, '"' );
		}

		return $this->signature;
	}

	/**
	 * @param null|string $signature
	 *
	 * @return PaymentSignatureResponse
	 */
	public function setSignature( ?string $signature ): PaymentSignatureResponse {
		$this->signature = $signature;

		return $this;
	}
}
