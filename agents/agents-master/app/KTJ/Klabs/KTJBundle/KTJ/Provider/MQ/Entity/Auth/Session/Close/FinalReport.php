<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close;

use DateTime;

/**
 * Class FinalReport
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close
 */
class FinalReport
{
    /**
     * @var null|int $TransactionId
     */
    protected $TransactionId;
    /**
     * @var null|DateTime $ReportTimestamp
     */
    protected $ReportTimestamp;
    /**
     * @var null|string $LastBlankIdentity
     */
    protected $LastBlankIdentity;
    /**
     * @var null|string $CashierName
     */
    protected $CashierName;
    /**
     * @var null|string $SalePointNumber
     */
    protected $SalePointNumber;
    /**
     * @var null|string $SalePointTerminalNumber
     */
    protected $SalePointTerminalNumber;
    /**
     * @var null|int $UsedBlanksCount
     */
    protected $UsedBlanksCount;
    /**
     * @var null|int $DamagedBlanksCount
     */
    protected $DamagedBlanksCount;
    /**
     * @var null|int $SoldTicketsCount
     */
    protected $SoldTicketsCount;
    /**
     * @var null|int $SoldTicketSeatsCount
     */
    protected $SoldTicketSeatsCount;
    /**
     * @var null|float $SoldTicketsCashSum
     */
    protected $SoldTicketsCashSum;
    /**
     * @var null|float $SoldTicketsNonCashSum
     */
    protected $SoldTicketsNonCashSum;
    /**
     * @var null|float $SoldTicketsCommissionCashSum
     */
    protected $SoldTicketsCommissionCashSum;
    /**
     * @var null|float $SoldTicketsCommissionNonCashSum
     */
    protected $SoldTicketsCommissionNonCashSum;
    /**
     * @var null|int $ReturnedTicketsCount
     */
    protected $ReturnedTicketsCount;
    /**
     * @var null|float $ReturnedTicketsCommissionCashSum
     */
    protected $ReturnedTicketsCommissionCashSum;
    /**
     * @var null|int $SuburbUsedBlanksCount
     */
    protected $SuburbUsedBlanksCount;
    /**
     * @var null|int $SuburbDamagedBlanksCount
     */
    protected $SuburbDamagedBlanksCount;
    /**
     * @var null|int $SuburbSoldTicketsCount
     */
    protected $SuburbSoldTicketsCount;
    /**
     * @var null|float $SuburbSoldTicketsCashSum
     */
    protected $SuburbSoldTicketsCashSum;
    /**
     * @var null|float $SuburbSoldTicketsCommissionCashSum
     */
    protected $SuburbSoldTicketsCommissionCashSum;
    /**
     * @var null|float $GlobalSoldTicketsCashSum
     */
    protected $GlobalSoldTicketsCashSum;
    /**
     * @var null|float $GlobalSoldTicketsNonCashSum
     */
    protected $GlobalSoldTicketsNonCashSum;
    /**
     * @var null|float $GlobalSoldTicketsCommissionCashSum
     */
    protected $GlobalSoldTicketsCommissionCashSum;
    /**
     * @var null|float $GlobalSoldTicketsCommissionNonCashSum
     */
    protected $GlobalSoldTicketsCommissionNonCashSum;
    /**
     * @var null|float $CreditDepartmentsSum
     */
    protected $CreditDepartmentsSum;
    /**
     * @var null|int $PreferencePermitsCount
     */
    protected $PreferencePermitsCount;

    /**
     * @return int|null
     */
    public function getTransactionId(): ?int
    {
        return $this->TransactionId;
    }

    /**
     * @param int|null $TransactionId
     * @return FinalReport
     */
    public function setTransactionId(?int $TransactionId): FinalReport
    {
        $this->TransactionId = $TransactionId;

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
     * @return FinalReport
     */
    public function setReportTimestamp(?DateTime $ReportTimestamp): FinalReport
    {
        $this->ReportTimestamp = $ReportTimestamp;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastBlankIdentity(): ?string
    {
        return $this->LastBlankIdentity;
    }

    /**
     * @param string|null $LastBlankIdentity
     * @return FinalReport
     */
    public function setLastBlankIdentity(?string $LastBlankIdentity): FinalReport
    {
        $this->LastBlankIdentity = $LastBlankIdentity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCashierName(): ?string
    {
        return $this->CashierName;
    }

    /**
     * @param string|null $CashierName
     * @return FinalReport
     */
    public function setCashierName(?string $CashierName): FinalReport
    {
        $this->CashierName = $CashierName;

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
     * @return FinalReport
     */
    public function setSalePointNumber(?string $SalePointNumber): FinalReport
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
     * @return FinalReport
     */
    public function setSalePointTerminalNumber(?string $SalePointTerminalNumber): FinalReport
    {
        $this->SalePointTerminalNumber = $SalePointTerminalNumber;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUsedBlanksCount(): ?int
    {
        return $this->UsedBlanksCount;
    }

    /**
     * @param int|null $UsedBlanksCount
     * @return FinalReport
     */
    public function setUsedBlanksCount(?int $UsedBlanksCount): FinalReport
    {
        $this->UsedBlanksCount = $UsedBlanksCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDamagedBlanksCount(): ?int
    {
        return $this->DamagedBlanksCount;
    }

    /**
     * @param int|null $DamagedBlanksCount
     * @return FinalReport
     */
    public function setDamagedBlanksCount(?int $DamagedBlanksCount): FinalReport
    {
        $this->DamagedBlanksCount = $DamagedBlanksCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSoldTicketsCount(): ?int
    {
        return $this->SoldTicketsCount;
    }

    /**
     * @param int|null $SoldTicketsCount
     * @return FinalReport
     */
    public function setSoldTicketsCount(?int $SoldTicketsCount): FinalReport
    {
        $this->SoldTicketsCount = $SoldTicketsCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSoldTicketSeatsCount(): ?int
    {
        return $this->SoldTicketSeatsCount;
    }

    /**
     * @param int|null $SoldTicketSeatsCount
     * @return FinalReport
     */
    public function setSoldTicketSeatsCount(?int $SoldTicketSeatsCount): FinalReport
    {
        $this->SoldTicketSeatsCount = $SoldTicketSeatsCount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldTicketsCashSum(): ?float
    {
        return $this->SoldTicketsCashSum;
    }

    /**
     * @param float|null $SoldTicketsCashSum
     * @return FinalReport
     */
    public function setSoldTicketsCashSum(?float $SoldTicketsCashSum): FinalReport
    {
        $this->SoldTicketsCashSum = $SoldTicketsCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldTicketsNonCashSum(): ?float
    {
        return $this->SoldTicketsNonCashSum;
    }

    /**
     * @param float|null $SoldTicketsNonCashSum
     * @return FinalReport
     */
    public function setSoldTicketsNonCashSum(?float $SoldTicketsNonCashSum): FinalReport
    {
        $this->SoldTicketsNonCashSum = $SoldTicketsNonCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldTicketsCommissionCashSum(): ?float
    {
        return $this->SoldTicketsCommissionCashSum;
    }

    /**
     * @param float|null $SoldTicketsCommissionCashSum
     * @return FinalReport
     */
    public function setSoldTicketsCommissionCashSum(?float $SoldTicketsCommissionCashSum): FinalReport
    {
        $this->SoldTicketsCommissionCashSum = $SoldTicketsCommissionCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldTicketsCommissionNonCashSum(): ?float
    {
        return $this->SoldTicketsCommissionNonCashSum;
    }

    /**
     * @param float|null $SoldTicketsCommissionNonCashSum
     * @return FinalReport
     */
    public function setSoldTicketsCommissionNonCashSum(?float $SoldTicketsCommissionNonCashSum): FinalReport
    {
        $this->SoldTicketsCommissionNonCashSum = $SoldTicketsCommissionNonCashSum;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReturnedTicketsCount(): ?int
    {
        return $this->ReturnedTicketsCount;
    }

    /**
     * @param int|null $ReturnedTicketsCount
     * @return FinalReport
     */
    public function setReturnedTicketsCount(?int $ReturnedTicketsCount): FinalReport
    {
        $this->ReturnedTicketsCount = $ReturnedTicketsCount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getReturnedTicketsCommissionCashSum(): ?float
    {
        return $this->ReturnedTicketsCommissionCashSum;
    }

    /**
     * @param float|null $ReturnedTicketsCommissionCashSum
     * @return FinalReport
     */
    public function setReturnedTicketsCommissionCashSum(?float $ReturnedTicketsCommissionCashSum): FinalReport
    {
        $this->ReturnedTicketsCommissionCashSum = $ReturnedTicketsCommissionCashSum;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSuburbUsedBlanksCount(): ?int
    {
        return $this->SuburbUsedBlanksCount;
    }

    /**
     * @param int|null $SuburbUsedBlanksCount
     * @return FinalReport
     */
    public function setSuburbUsedBlanksCount(?int $SuburbUsedBlanksCount): FinalReport
    {
        $this->SuburbUsedBlanksCount = $SuburbUsedBlanksCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSuburbDamagedBlanksCount(): ?int
    {
        return $this->SuburbDamagedBlanksCount;
    }

    /**
     * @param int|null $SuburbDamagedBlanksCount
     * @return FinalReport
     */
    public function setSuburbDamagedBlanksCount(?int $SuburbDamagedBlanksCount): FinalReport
    {
        $this->SuburbDamagedBlanksCount = $SuburbDamagedBlanksCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSuburbSoldTicketsCount(): ?int
    {
        return $this->SuburbSoldTicketsCount;
    }

    /**
     * @param int|null $SuburbSoldTicketsCount
     * @return FinalReport
     */
    public function setSuburbSoldTicketsCount(?int $SuburbSoldTicketsCount): FinalReport
    {
        $this->SuburbSoldTicketsCount = $SuburbSoldTicketsCount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSuburbSoldTicketsCashSum(): ?float
    {
        return $this->SuburbSoldTicketsCashSum;
    }

    /**
     * @param float|null $SuburbSoldTicketsCashSum
     * @return FinalReport
     */
    public function setSuburbSoldTicketsCashSum(?float $SuburbSoldTicketsCashSum): FinalReport
    {
        $this->SuburbSoldTicketsCashSum = $SuburbSoldTicketsCashSum;

        return $this;
    }
}
