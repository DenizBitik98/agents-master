<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 16:34
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Payment
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Confirm
 */
class Payment {
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
	protected $Service = 1;
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
	 * @JMS\SerializedName("Signature")
	 * @JMS\Type("string")
	 * @var null|string $Signature
	 */
	protected $Signature;

	/**
	 * @return null|string
	 */
	public function getTerminal(): ?string {
		return $this->Terminal;
	}

	/**
	 * @param null|string $Terminal
	 *
	 * @return Payment
	 */
	public function setTerminal( ?string $Terminal ): Payment {
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
	 * @return Payment
	 */
	public function setPaymentTimestamp( ?DateTime $PaymentTimestamp ): Payment {
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
	 * @return Payment
	 */
	public function setService( ?int $Service ): Payment {
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
	 * @return Payment
	 */
	public function setRequisite( ?string $Requisite ): Payment {
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
	 * @return Payment
	 */
	public function setAmount( ?float $Amount ): Payment {
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
	 * @return Payment
	 */
	public function setComission( ?float $Comission ): Payment {
		$this->Comission = $Comission;

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
	 * @return Payment
	 */
	public function setSignature( ?string $Signature ): Payment {
		$this->Signature = $Signature;

		return $this;
	}
}
