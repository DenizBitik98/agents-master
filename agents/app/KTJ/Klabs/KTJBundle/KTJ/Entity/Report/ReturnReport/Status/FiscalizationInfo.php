<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 12:12
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status;

use JMS\Serializer\Annotation as JMS;

/**
 * Class FiscalizationInfo
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status
 */
class FiscalizationInfo {
	/**
	 * @JMS\SerializedName("FiscalNumber")
	 * @JMS\Type("string")
	 * @var null|string $FiscalNumber
	 */
	protected $FiscalNumber;
	/**
	 * @JMS\SerializedName("PaymentNumber")
	 * @JMS\Type("string")
	 * @var null|string $PaymentNumber
	 */
	protected $PaymentNumber;

	/**
	 * @return null|string
	 */
	public function getFiscalNumber(): ?string {
		return $this->FiscalNumber;
	}

	/**
	 * @param null|string $FiscalNumber
	 *
	 * @return FiscalizationInfo
	 */
	public function setFiscalNumber( ?string $FiscalNumber ): FiscalizationInfo {
		$this->FiscalNumber = $FiscalNumber;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getPaymentNumber(): ?string {
		return $this->PaymentNumber;
	}

	/**
	 * @param null|string $PaymentNumber
	 *
	 * @return FiscalizationInfo
	 */
	public function setPaymentNumber( ?string $PaymentNumber ): FiscalizationInfo {
		$this->PaymentNumber = $PaymentNumber;

		return $this;
	}
}
