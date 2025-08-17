<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close;

use DateTime;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open\BlankIdentity;

/**
 * Class InitialReport
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close
 */
class InitialReport
{
    /**
     * @var null|string $TransactionId
     */
    protected $TransactionId;
    /**
     * @var null|bool $TransactionCommitted
     */
    protected $TransactionCommitted;
    /**
     * @var null|DateTime $ReportTimestamp
     */
    protected $ReportTimestamp;
    /**
     * @var null|BlankIdentity $BlankIdentity
     */
    protected $BlankIdentity;
    /**
     * @var null|string $SalePointNumber
     */
    protected $SalePointNumber;
    /**
     * @var null|string $SalePointTerminalNumber
     */
    protected $SalePointTerminalNumber;

    /**
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->TransactionId;
    }

    /**
     * @param string|null $TransactionId
     * @return InitialReport
     */
    public function setTransactionId(?string $TransactionId): InitialReport
    {
        $this->TransactionId = $TransactionId;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTransactionCommitted(): ?bool
    {
        return $this->TransactionCommitted;
    }

    /**
     * @param bool|null $TransactionCommitted
     * @return InitialReport
     */
    public function setTransactionCommitted(?bool $TransactionCommitted): InitialReport
    {
        $this->TransactionCommitted = $TransactionCommitted;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getReportTimestamp(): ?DateTime
    {
        return $this->ReportTimestamp;
    }

    /**
     * @param DateTime|null $ReportTimestamp
     * @return InitialReport
     */
    public function setReportTimestamp(?DateTime $ReportTimestamp): InitialReport
    {
        $this->ReportTimestamp = $ReportTimestamp;

        return $this;
    }

    /**
     * @return BlankIdentity|null
     */
    public function getBlankIdentity(): ?BlankIdentity
    {
        return $this->BlankIdentity;
    }

    /**
     * @param BlankIdentity|null $BlankIdentity
     * @return InitialReport
     */
    public function setBlankIdentity(?BlankIdentity $BlankIdentity): InitialReport
    {
        $this->BlankIdentity = $BlankIdentity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSalePointNumber(): ?string
    {
        return $this->SalePointNumber;
    }

    /**
     * @param string|null $SalePointNumber
     * @return InitialReport
     */
    public function setSalePointNumber(?string $SalePointNumber): InitialReport
    {
        $this->SalePointNumber = $SalePointNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSalePointTerminalNumber(): ?string
    {
        return $this->SalePointTerminalNumber;
    }

    /**
     * @param string|null $SalePointTerminalNumber
     * @return InitialReport
     */
    public function setSalePointTerminalNumber(?string $SalePointTerminalNumber): InitialReport
    {
        $this->SalePointTerminalNumber = $SalePointTerminalNumber;

        return $this;
    }
}
