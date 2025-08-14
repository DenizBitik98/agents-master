<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm;

/**
 * Class PaymentInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm
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
     * @return string|null
     */
    public function getPaymentNumber(): ?string
    {
        return $this->PaymentNumber;
    }

    /**
     * @param string|null $PaymentNumber
     * @return PaymentInfo
     */
    public function setPaymentNumber(?string $PaymentNumber): PaymentInfo
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
}
