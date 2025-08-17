<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class FinalizeSaleTicketPaymentInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class FinalizeSaleTicketPaymentInfo
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
     * @var null|string $PaymentNumber
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
     * @return string|null
     */
    public function getTicketExpressId(): ?string
    {
        return $this->TicketExpressId;
    }

    /**
     * @param string|null $TicketExpressId
     * @return FinalizeSaleTicketPaymentInfo
     */
    public function setTicketExpressId(?string $TicketExpressId): FinalizeSaleTicketPaymentInfo
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
     * @return FinalizeSaleTicketPaymentInfo
     */
    public function setFiscalNumber(?string $FiscalNumber): FinalizeSaleTicketPaymentInfo
    {
        $this->FiscalNumber = $FiscalNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentNumber(): ?string
    {
        return $this->PaymentNumber;
    }

    /**
     * @param string|null $PaymentNumber
     * @return FinalizeSaleTicketPaymentInfo
     */
    public function setPaymentNumber(?string $PaymentNumber): FinalizeSaleTicketPaymentInfo
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
     * @return FinalizeSaleTicketPaymentInfo
     */
    public function setRNM(?string $RNM): FinalizeSaleTicketPaymentInfo
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
     * @return FinalizeSaleTicketPaymentInfo
     */
    public function setFiscalDataOperator(?string $FiscalDataOperator): FinalizeSaleTicketPaymentInfo
    {
        $this->FiscalDataOperator = $FiscalDataOperator;

        return $this;
    }
}
