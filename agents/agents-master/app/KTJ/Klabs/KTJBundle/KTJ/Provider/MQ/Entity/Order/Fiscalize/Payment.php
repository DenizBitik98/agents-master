<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Fiscalize;

use DateTime;

/**
 * Class Payment
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Fiscalize
 */
class Payment
{
    /**
     * @var null|string $Terminal
     */
    protected $Terminal;
    /**
     * @var null|DateTime $PaymentTimestamp
     */
    protected $PaymentTimestamp;
    /**
     * @var null|int $Service
     */
    protected $Service;
    /**
     * @var null|string $Requisite
     */
    protected $Requisite;
    /**
     * @var null|float $Amount
     */
    protected $Amount;
    /**
     * @var null|float $Comission
     */
    protected $Comission;
    /**
     * @var null|string $Signature
     */
    protected $Signature;

    /**
     * @return string|null
     */
    public function getTerminal(): ?string
    {
        return $this->Terminal;
    }

    /**
     * @param string|null $Terminal
     * @return Payment
     */
    public function setTerminal(?string $Terminal): Payment
    {
        $this->Terminal = $Terminal;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getPaymentTimestamp(): ?DateTime
    {
        return $this->PaymentTimestamp;
    }

    /**
     * @param DateTime|null $PaymentTimestamp
     * @return Payment
     */
    public function setPaymentTimestamp(?DateTime $PaymentTimestamp): Payment
    {
        $this->PaymentTimestamp = $PaymentTimestamp;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getService(): ?int
    {
        return $this->Service;
    }

    /**
     * @param int|null $Service
     * @return Payment
     */
    public function setService(?int $Service): Payment
    {
        $this->Service = $Service;

        return $this;
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
     * @return Payment
     */
    public function setRequisite(?string $Requisite): Payment
    {
        $this->Requisite = $Requisite;

        return $this;
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
     * @return Payment
     */
    public function setAmount(?float $Amount): Payment
    {
        $this->Amount = $Amount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getComission(): ?float
    {
        return $this->Comission;
    }

    /**
     * @param float|null $Comission
     * @return Payment
     */
    public function setComission(?float $Comission): Payment
    {
        $this->Comission = $Comission;

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
     * @return Payment
     */
    public function setSignature(?string $Signature): Payment
    {
        $this->Signature = $Signature;

        return $this;
    }
}
