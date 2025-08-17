<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\Defiscale;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;


/**
 * Class Refund
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\Defiscale
 */
class Refund
{
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
     * @JMS\Type("int")
     * @var null|integer $PaymentNumber
     */
    protected $PaymentNumber;
    /**
     * @JMS\SerializedName("Requisite")
     * @JMS\Type("string")
     * @var null|string $Requisite
     */
    protected $Requisite;

    /**
     * @return string|null
     */
    public function getTerminal(): ?string
    {
        return $this->Terminal;
    }

    /**
     * @param string|null $Terminal
     */
    public function setTerminal(?string $Terminal): void
    {
        $this->Terminal = $Terminal;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->Amount;
    }

    /**
     * @param float|null $Amount
     */
    public function setAmount(?float $Amount): void
    {
        $this->Amount = $Amount;
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
     */
    public function setSignature(?string $Signature): void
    {
        $this->Signature = $Signature;
    }

    /**
     * @return int|null
     */
    public function getPaymentNumber(): ?int
    {
        return $this->PaymentNumber;
    }

    /**
     * @param int|null $PaymentNumber
     */
    public function setPaymentNumber(?int $PaymentNumber): void
    {
        $this->PaymentNumber = $PaymentNumber;
    }

    /**
     * @return string|null
     */
    public function getRequisite(): ?string
    {
        return $this->Requisite;
    }

    /**
     * @param string|null $Requisite
     */
    public function setRequisite(?string $Requisite): void
    {
        $this->Requisite = $Requisite;
    }
}
