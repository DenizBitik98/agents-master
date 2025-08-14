<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 14:39
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\AccessorOrder;

/**
 * Class Refund
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success
 *
 * @AccessorOrder("custom", custom = {"Terminal", "Amount", "Signature", "PaymentNumber", "Requisite"})
 */
class Refund {
	/**
	 * @JMS\SerializedName("Terminal")
	 * @JMS\Type("string")
	 * @var null|string $Terminal
	 */
	protected $Terminal;
	/**
	 * @JMS\SerializedName("Amount")
	 * @JMS\Type("float")
	 * @var null|float $Amount
	 */
	protected $Amount;
	/**
	 * @JMS\SerializedName("Signature")
	 * @JMS\Type("string")
	 * @var null|string $Signature
	 */
	protected $Signature;
	/**
	 * @JMS\SerializedName("PaymentNumber")
	 * @JMS\Type("string")
	 * @var null|string $PaymentNumber
	 */
	protected $PaymentNumber;
	/**
	 * @JMS\SerializedName("Requisite")
	 * @JMS\Type("string")
	 * @var null|string $Requisite
	 */
	protected $Requisite;

	/**
	 * @return null|string
	 */
	public function getTerminal(): ?string {
		return $this->Terminal;
	}

	/**
	 * @param null|string $Terminal
	 *
	 * @return Refund
	 */
	public function setTerminal( ?string $Terminal ): Refund {
		$this->Terminal = $Terminal;

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
	 * @return Refund
	 */
	public function setAmount( ?float $Amount ): Refund {
		$this->Amount = $Amount;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getSignature(): ?string {
		return $this->Signature;
	}

	/**
	 * @param null|string $Signature
	 *
	 * @return Refund
	 */
	public function setSignature( ?string $Signature ): Refund {
		$this->Signature = $Signature;

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
	 * @return Refund
	 */
	public function setPaymentNumber( ?string $PaymentNumber ): Refund {
		$this->PaymentNumber = $PaymentNumber;

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
	 * @return Refund
	 */
	public function setRequisite( ?string $Requisite ): Refund {
		$this->Requisite = $Requisite;

		return $this;
	}
}
