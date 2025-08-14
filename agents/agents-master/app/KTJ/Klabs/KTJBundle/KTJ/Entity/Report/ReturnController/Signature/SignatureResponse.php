<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 15:40
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Signature;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class SignatureResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Signature
 */
class SignatureResponse implements IResponse {
	/**
	 * @JMS\SerializedName("signature")
	 * @JMS\Type("string")
	 * @var null|string $signature
	 */
	protected $signature;

	/**
	 * SignatureResponse constructor.
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
	 * @return SignatureResponse
	 */
	public function setSignature( ?string $signature ): SignatureResponse {
		$this->signature = $signature;

		return $this;
	}
}
