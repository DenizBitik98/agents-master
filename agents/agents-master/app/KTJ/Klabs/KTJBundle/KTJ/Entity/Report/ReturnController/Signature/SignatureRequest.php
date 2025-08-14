<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 15:40
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Signature;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class SignatureRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Signature
 */
class
SignatureRequest implements IRequest {
	/**
	 * @JMS\SerializedName("Terminal")
	 * @JMS\Type("string")
	 * @var null|string $Terminal
	 */
	protected $Terminal;
    /**
     * @JMS\SerializedName("Amount")
     * @JMS\Type("string")
     * @var null|float $Amount
     */
    protected $Amount;
    /**
     * @JMS\SerializedName("Signature")
     * @JMS\Type("string")
     * @var null|string $Signature
     */
    protected $Signature = null;
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
	 * @return SignatureRequest
	 */
	public function setTerminal( ?string $Terminal ): SignatureRequest {
		$this->Terminal = $Terminal;

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
	 * @return SignatureRequest
	 */
	public function setRequisite( ?string $Requisite ): SignatureRequest {
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
	 * @return SignatureRequest
	 */
	public function setAmount( ?float $Amount ): SignatureRequest {
		$this->Amount = $Amount;

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
	 * @return SignatureRequest
	 */
	public function setPaymentNumber( ?string $PaymentNumber ): SignatureRequest {
		$this->PaymentNumber = $PaymentNumber;

		return $this;
	}

    /**
     * @return string|null
     */
    public function getSignature(): ?string
    {
        return $this->Signature;
    }

    /**
     * @param string|null $Signature
     * @return SignatureRequest
     */
    public function setSignature(?string $Signature): SignatureRequest
    {
        $this->Signature = $Signature;

        return $this;
    }
}
