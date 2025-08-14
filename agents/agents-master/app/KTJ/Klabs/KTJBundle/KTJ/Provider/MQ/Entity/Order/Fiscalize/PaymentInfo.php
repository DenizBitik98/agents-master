<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Fiscalize;

use DateTime;

/**
 * Class PaymentsInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Fiscalize
 */
class PaymentInfo
{
    /**
     * @var null|string $TicketExpressId
     */
    protected $TicketExpressId;
    /**
     * @var null|string $FiscalNumber
     */
    protected $FiscalNumber;
    /**
     * @var null|string $FiscalDocumentNumber
     */
    protected $FiscalDocumentNumber;
    /**
     * @var null|int $PaymentNumber
     */
    protected $PaymentNumber;
    /**
     * @var null|string $RNM
     */
    protected $RNM;
    /**
     * @var null|string $FiscalDataOperator
     */
    protected $FiscalDataOperator;
    /**
     * @var null|DateTime $FiscalDate
     */
    protected $FiscalDate;

    /**
     * @return string|null
     */
    public function getTicketExpressId(): ?string
    {
        return $this->TicketExpressId;
    }

    /**
     * @param string|null $TicketExpressId
     * @return PaymentInfo
     */
    public function setTicketExpressId(?string $TicketExpressId): PaymentInfo
    {
        $this->TicketExpressId = $TicketExpressId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFiscalNumber(): ?string
    {
        return $this->FiscalNumber;
    }

    /**
     * @param string|null $FiscalNumber
     * @return PaymentInfo
     */
    public function setFiscalNumber(?string $FiscalNumber): PaymentInfo
    {
        $this->FiscalNumber = $FiscalNumber;

        return $this;
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
     * @return PaymentInfo
     */
    public function setPaymentNumber(?int $PaymentNumber): PaymentInfo
    {
        $this->PaymentNumber = $PaymentNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRNM(): ?string
    {
        return $this->RNM;
    }

    /**
     * @param string|null $RNM
     * @return PaymentInfo
     */
    public function setRNM(?string $RNM): PaymentInfo
    {
        $this->RNM = $RNM;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFiscalDataOperator(): ?string
    {
        return $this->FiscalDataOperator;
    }

    /**
     * @param string|null $FiscalDataOperator
     * @return PaymentInfo
     */
    public function setFiscalDataOperator(?string $FiscalDataOperator): PaymentInfo
    {
        $this->FiscalDataOperator = $FiscalDataOperator;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFiscalDocumentNumber(): ?string
    {
        return $this->FiscalDocumentNumber;
    }

    /**
     * @param string|null $FiscalDocumentNumber
     * @return PaymentInfo
     */
    public function setFiscalDocumentNumber(?string $FiscalDocumentNumber): PaymentInfo
    {
        $this->FiscalDocumentNumber = $FiscalDocumentNumber;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getFiscalDate(): ?DateTime
    {
        return $this->FiscalDate;
    }

    /**
     * @param DateTime|null $FiscalDate
     * @return PaymentInfo
     */
    public function setFiscalDate(?DateTime $FiscalDate): PaymentInfo
    {
        $this->FiscalDate = $FiscalDate;

        return $this;
    }
}
