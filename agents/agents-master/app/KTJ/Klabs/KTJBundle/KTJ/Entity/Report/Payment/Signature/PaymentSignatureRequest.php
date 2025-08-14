<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 17:51
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class PaymentSignatureRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature
 */
class PaymentSignatureRequest implements IRequest {
	/**
	 * @JMS\SerializedName("Terminal")
	 * @JMS\Type("string")
	 * @var null|string $Terminal
	 */
	protected $Terminal;
	/**
	 * @JMS\SerializedName("PaymentTimestamp")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $PaymentTimestamp
	 */
	protected $PaymentTimestamp;
	/**
	 * @JMS\SerializedName("Service")
	 * @JMS\Type("int")
	 * @var null|int $Service
	 */
	protected $Service;
	/**
	 * @JMS\SerializedName("Requisite")
	 * @JMS\Type("string")
	 * @var null|string $Requisite
	 */
	protected $Requisite;
	/**
	 * @JMS\SerializedName("Amount")
	 * @JMS\Type("float")
	 * @var null|float $Amount
	 */
	protected $Amount;
	/**
	 * @JMS\SerializedName("Comission")
	 * @JMS\Type("float")
	 * @var null|float $Comission
	 */
	protected $Comission;
	/**
	 * @JMS\SerializedName("PaymentNumber")
	 * @JMS\Type("string")
	 * @var null|string $PaymentNumber
	 */
	protected $PaymentNumber;

	/**
	 * @return null|string
	 */
	public function getTerminal(): ?string {
		return $this->Terminal;
	}

	/**
	 * @param null|string $Terminal
	 *
	 * @return PaymentSignatureRequest
	 */
	public function setTerminal( ?string $Terminal ): PaymentSignatureRequest {
		$this->Terminal = $Terminal;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getPaymentTimestamp(): ?DateTime {
		return $this->PaymentTimestamp;
	}

	/**
	 * @param DateTime|null $PaymentTimestamp
	 *
	 * @return PaymentSignatureRequest
	 */
	public function setPaymentTimestamp( ?DateTime $PaymentTimestamp ): PaymentSignatureRequest {
		$this->PaymentTimestamp = $PaymentTimestamp;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getService(): ?int {
		return $this->Service;
	}

	/**
	 * @param int|null $Service
	 *
	 * @return PaymentSignatureRequest
	 */
	public function setService( ?int $Service ): PaymentSignatureRequest {
		$this->Service = $Service;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getRequisite(): ?string {
		return $this->Requisite;
	}

	/**
	 * @param null|string $Requisite
	 *
	 * @return PaymentSignatureRequest
	 */
	public function setRequisite( ?string $Requisite ): PaymentSignatureRequest {
		$this->Requisite = $Requisite;

		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getAmount(): ?float {
		return $this->Amount;
	}

	/**
	 * @param float|null $Amount
	 *
	 * @return PaymentSignatureRequest
	 */
	public function setAmount( ?float $Amount ): PaymentSignatureRequest {
		$this->Amount = $Amount;

		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getComission(): ?float {
		return $this->Comission;
	}

	/**
	 * @param float|null $Comission
	 *
	 * @return PaymentSignatureRequest
	 */
	public function setComission( ?float $Comission ): PaymentSignatureRequest {
		$this->Comission = $Comission;

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
	 * @return PaymentSignatureRequest
	 */
	public function setPaymentNumber( ?string $PaymentNumber ): PaymentSignatureRequest {
		$this->PaymentNumber = $PaymentNumber;

		return $this;
	}
}
