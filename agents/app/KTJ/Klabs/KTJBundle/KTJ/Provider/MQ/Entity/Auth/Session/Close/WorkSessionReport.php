<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close;

/**
 * Class WorkSessionReport
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close
 */
class WorkSessionReport
{
    /**
     * @var null|float $TerminalBallance
     */
    protected $TerminalBallance;
    /**
     * @var null|int $SoldTicketsCount
     */
    protected $SoldTicketsCount;
    /**
     * @var null|int $SoldTicketPassengersCount
     */
    protected $SoldTicketPassengersCount;
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
     * @var null|float $SoldTicketsCommissionSum
     */
    protected $SoldTicketsCommissionSum;
    /**
     * @var null|float $SoldTicketsCommissionNonCashSum
     */
    protected $SoldTicketsCommissionNonCashSum;
    /**
     * @var null|int $ReturnedTicketsCount
     */
    protected $ReturnedTicketsCount;
    /**
     * @var null|float $ReturnedTicketsCashSum
     */
    protected $ReturnedTicketsCashSum;
    /**
     * @var null|float $ReturnedTicketsNonCashSum
     */
    protected $ReturnedTicketsNonCashSum;
    /**
     * @var null|float $ReturnedTicketsCommissionSum
     */
    protected $ReturnedTicketsCommissionSum;
    /**
     * @var null|float $ReturnedTicketsCommissionNonCashSum
     */
    protected $ReturnedTicketsCommissionNonCashSum;
    /**
     * @var null|int $CancelledTicketsCount
     */
    protected $CancelledTicketsCount;
    /**
     * @var null|int $CancelledConfirmedTicketsCount
     */
    protected $CancelledConfirmedTicketsCount;
    /**
     * @var null|int $CancelledConfirmedTicketPassengersCount
     */
    protected $CancelledConfirmedTicketPassengersCount;
    /**
     * @var null|float $CancelledConfirmedTicketsCashSum
     */
    protected $CancelledConfirmedTicketsCashSum;
    /**
     * @var null|float $CancelledConfirmedTicketsNonCashSum
     */
    protected $CancelledConfirmedTicketsNonCashSum;
    /**
     * @var null|float $CancelledConfirmedTicketsCommissionSum
     */
    protected $CancelledConfirmedTicketsCommissionSum;
    /**
     * @var null|float $CancelledConfirmedTicketsCommissionNonCashSum
     */
    protected $CancelledConfirmedTicketsCommissionNonCashSum;
    /**
     * @var null|float $CancelledConfirmedTicketsSumWithCommission
     */
    protected $CancelledConfirmedTicketsSumWithCommission;
    /**
     * @var null|int $SoldWithoutCancelledConfirmedTicketsCount
     */
    protected $SoldWithoutCancelledConfirmedTicketsCount;
    /**
     * @var null|int $SoldWithoutCancelledConfirmedTicketPassengersCount
     */
    protected $SoldWithoutCancelledConfirmedTicketPassengersCount;
    /**
     * @var null|float $SoldWithoutCancelledConfirmedTicketsCashSum
     */
    protected $SoldWithoutCancelledConfirmedTicketsCashSum;
    /**
     * @var null|float $SoldWithoutCancelledConfirmedTicketsNonCashSum
     */
    protected $SoldWithoutCancelledConfirmedTicketsNonCashSum;
    /**
     * @var null|float $SoldWithoutCancelledConfirmedTicketsCommissionSum
     */
    protected $SoldWithoutCancelledConfirmedTicketsCommissionSum;
    /**
     * @var null|float $TotalSumWithoutCommission
     */
    protected $TotalSumWithoutCommission;
    /**
     * @var null|float $TotalCommissionSum
     */
    protected $TotalCommissionSum;
    /**
     * @var null|float $TotalCommissionCashSum
     */
    protected $TotalCommissionCashSum;
    /**
     * @var null|float $TotalCommissionNonCashSum
     */
    protected $TotalCommissionNonCashSum;
    /**
     * @var null|float $TotalSum
     */
    protected $TotalSum;
    /**
     * @var null|float $TotalCashSum
     */
    protected $TotalCashSum;
    /**
     * @var null|float $TotalNonCashSum
     */
    protected $TotalNonCashSum;
    /**
     * @var null|int $DamagedBlanksCount
     */
    protected $DamagedBlanksCount;
    /**
     * @var null|int $SoldOptionalServiceCashCount
     */
    protected $SoldOptionalServiceCashCount;
    /**
     * @var null|int $SoldOptionalServiceNonCashCount
     */
    protected $SoldOptionalServiceNonCashCount;
    /**
     * @var null|int $CancelledOptionalServiceCount
     */
    protected $CancelledOptionalServiceCount;
    /**
     * @var null|float $SoldOptionalServiceCashSum
     */
    protected $SoldOptionalServiceCashSum;
    /**
     * @var null|float $SoldOptionalServiceNonCashSum
     */
    protected $SoldOptionalServiceNonCashSum;
    /**
     * @var null|float $CancelledOptionalServiceSum
     */
    protected $CancelledOptionalServiceSum;

    /**
     * @return float|null
     */
    public function getTerminalBallance(): ?float
    {
        return $this->TerminalBallance;
    }

    /**
     * @param float|null $TerminalBallance
     * @return WorkSessionReport
     */
    public function setTerminalBallance(?float $TerminalBallance): WorkSessionReport
    {
        $this->TerminalBallance = $TerminalBallance;

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
     * @return WorkSessionReport
     */
    public function setSoldTicketsCount(?int $SoldTicketsCount): WorkSessionReport
    {
        $this->SoldTicketsCount = $SoldTicketsCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSoldTicketPassengersCount(): ?int
    {
        return $this->SoldTicketPassengersCount;
    }

    /**
     * @param int|null $SoldTicketPassengersCount
     * @return WorkSessionReport
     */
    public function setSoldTicketPassengersCount(?int $SoldTicketPassengersCount): WorkSessionReport
    {
        $this->SoldTicketPassengersCount = $SoldTicketPassengersCount;

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
     * @return WorkSessionReport
     */
    public function setSoldTicketSeatsCount(?int $SoldTicketSeatsCount): WorkSessionReport
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
     * @return WorkSessionReport
     */
    public function setSoldTicketsCashSum(?float $SoldTicketsCashSum): WorkSessionReport
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
     * @return WorkSessionReport
     */
    public function setSoldTicketsNonCashSum(?float $SoldTicketsNonCashSum): WorkSessionReport
    {
        $this->SoldTicketsNonCashSum = $SoldTicketsNonCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldTicketsCommissionSum(): ?float
    {
        return $this->SoldTicketsCommissionSum;
    }

    /**
     * @param float|null $SoldTicketsCommissionSum
     * @return WorkSessionReport
     */
    public function setSoldTicketsCommissionSum(?float $SoldTicketsCommissionSum): WorkSessionReport
    {
        $this->SoldTicketsCommissionSum = $SoldTicketsCommissionSum;

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
     * @return WorkSessionReport
     */
    public function setSoldTicketsCommissionNonCashSum(?float $SoldTicketsCommissionNonCashSum): WorkSessionReport
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
     * @return WorkSessionReport
     */
    public function setReturnedTicketsCount(?int $ReturnedTicketsCount): WorkSessionReport
    {
        $this->ReturnedTicketsCount = $ReturnedTicketsCount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getReturnedTicketsCashSum(): ?float
    {
        return $this->ReturnedTicketsCashSum;
    }

    /**
     * @param float|null $ReturnedTicketsCashSum
     * @return WorkSessionReport
     */
    public function setReturnedTicketsCashSum(?float $ReturnedTicketsCashSum): WorkSessionReport
    {
        $this->ReturnedTicketsCashSum = $ReturnedTicketsCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getReturnedTicketsNonCashSum(): ?float
    {
        return $this->ReturnedTicketsNonCashSum;
    }

    /**
     * @param float|null $ReturnedTicketsNonCashSum
     * @return WorkSessionReport
     */
    public function setReturnedTicketsNonCashSum(?float $ReturnedTicketsNonCashSum): WorkSessionReport
    {
        $this->ReturnedTicketsNonCashSum = $ReturnedTicketsNonCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getReturnedTicketsCommissionSum(): ?float
    {
        return $this->ReturnedTicketsCommissionSum;
    }

    /**
     * @param float|null $ReturnedTicketsCommissionSum
     * @return WorkSessionReport
     */
    public function setReturnedTicketsCommissionSum(?float $ReturnedTicketsCommissionSum): WorkSessionReport
    {
        $this->ReturnedTicketsCommissionSum = $ReturnedTicketsCommissionSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getReturnedTicketsCommissionNonCashSum(): ?float
    {
        return $this->ReturnedTicketsCommissionNonCashSum;
    }

    /**
     * @param float|null $ReturnedTicketsCommissionNonCashSum
     * @return WorkSessionReport
     */
    public function setReturnedTicketsCommissionNonCashSum(?float $ReturnedTicketsCommissionNonCashSum
    ): WorkSessionReport {
        $this->ReturnedTicketsCommissionNonCashSum = $ReturnedTicketsCommissionNonCashSum;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCancelledTicketsCount(): ?int
    {
        return $this->CancelledTicketsCount;
    }

    /**
     * @param int|null $CancelledTicketsCount
     * @return WorkSessionReport
     */
    public function setCancelledTicketsCount(?int $CancelledTicketsCount): WorkSessionReport
    {
        $this->CancelledTicketsCount = $CancelledTicketsCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCancelledConfirmedTicketsCount(): ?int
    {
        return $this->CancelledConfirmedTicketsCount;
    }

    /**
     * @param int|null $CancelledConfirmedTicketsCount
     * @return WorkSessionReport
     */
    public function setCancelledConfirmedTicketsCount(?int $CancelledConfirmedTicketsCount): WorkSessionReport
    {
        $this->CancelledConfirmedTicketsCount = $CancelledConfirmedTicketsCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCancelledConfirmedTicketPassengersCount(): ?int
    {
        return $this->CancelledConfirmedTicketPassengersCount;
    }

    /**
     * @param int|null $CancelledConfirmedTicketPassengersCount
     * @return WorkSessionReport
     */
    public function setCancelledConfirmedTicketPassengersCount(?int $CancelledConfirmedTicketPassengersCount
    ): WorkSessionReport {
        $this->CancelledConfirmedTicketPassengersCount = $CancelledConfirmedTicketPassengersCount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCancelledConfirmedTicketsCashSum(): ?float
    {
        return $this->CancelledConfirmedTicketsCashSum;
    }

    /**
     * @param float|null $CancelledConfirmedTicketsCashSum
     * @return WorkSessionReport
     */
    public function setCancelledConfirmedTicketsCashSum(?float $CancelledConfirmedTicketsCashSum): WorkSessionReport
    {
        $this->CancelledConfirmedTicketsCashSum = $CancelledConfirmedTicketsCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCancelledConfirmedTicketsNonCashSum(): ?float
    {
        return $this->CancelledConfirmedTicketsNonCashSum;
    }

    /**
     * @param float|null $CancelledConfirmedTicketsNonCashSum
     * @return WorkSessionReport
     */
    public function setCancelledConfirmedTicketsNonCashSum(?float $CancelledConfirmedTicketsNonCashSum
    ): WorkSessionReport {
        $this->CancelledConfirmedTicketsNonCashSum = $CancelledConfirmedTicketsNonCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCancelledConfirmedTicketsCommissionSum(): ?float
    {
        return $this->CancelledConfirmedTicketsCommissionSum;
    }

    /**
     * @param float|null $CancelledConfirmedTicketsCommissionSum
     * @return WorkSessionReport
     */
    public function setCancelledConfirmedTicketsCommissionSum(?float $CancelledConfirmedTicketsCommissionSum
    ): WorkSessionReport {
        $this->CancelledConfirmedTicketsCommissionSum = $CancelledConfirmedTicketsCommissionSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCancelledConfirmedTicketsCommissionNonCashSum(): ?float
    {
        return $this->CancelledConfirmedTicketsCommissionNonCashSum;
    }

    /**
     * @param float|null $CancelledConfirmedTicketsCommissionNonCashSum
     * @return WorkSessionReport
     */
    public function setCancelledConfirmedTicketsCommissionNonCashSum(
        ?float $CancelledConfirmedTicketsCommissionNonCashSum
    ): WorkSessionReport {
        $this->CancelledConfirmedTicketsCommissionNonCashSum = $CancelledConfirmedTicketsCommissionNonCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCancelledConfirmedTicketsSumWithCommission(): ?float
    {
        return $this->CancelledConfirmedTicketsSumWithCommission;
    }

    /**
     * @param float|null $CancelledConfirmedTicketsSumWithCommission
     * @return WorkSessionReport
     */
    public function setCancelledConfirmedTicketsSumWithCommission(?float $CancelledConfirmedTicketsSumWithCommission
    ): WorkSessionReport {
        $this->CancelledConfirmedTicketsSumWithCommission = $CancelledConfirmedTicketsSumWithCommission;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSoldWithoutCancelledConfirmedTicketsCount(): ?int
    {
        return $this->SoldWithoutCancelledConfirmedTicketsCount;
    }

    /**
     * @param int|null $SoldWithoutCancelledConfirmedTicketsCount
     * @return WorkSessionReport
     */
    public function setSoldWithoutCancelledConfirmedTicketsCount(?int $SoldWithoutCancelledConfirmedTicketsCount
    ): WorkSessionReport {
        $this->SoldWithoutCancelledConfirmedTicketsCount = $SoldWithoutCancelledConfirmedTicketsCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSoldWithoutCancelledConfirmedTicketPassengersCount(): ?int
    {
        return $this->SoldWithoutCancelledConfirmedTicketPassengersCount;
    }

    /**
     * @param int|null $SoldWithoutCancelledConfirmedTicketPassengersCount
     * @return WorkSessionReport
     */
    public function setSoldWithoutCancelledConfirmedTicketPassengersCount(
        ?int $SoldWithoutCancelledConfirmedTicketPassengersCount
    ): WorkSessionReport {
        $this->SoldWithoutCancelledConfirmedTicketPassengersCount = $SoldWithoutCancelledConfirmedTicketPassengersCount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldWithoutCancelledConfirmedTicketsCashSum(): ?float
    {
        return $this->SoldWithoutCancelledConfirmedTicketsCashSum;
    }

    /**
     * @param float|null $SoldWithoutCancelledConfirmedTicketsCashSum
     * @return WorkSessionReport
     */
    public function setSoldWithoutCancelledConfirmedTicketsCashSum(?float $SoldWithoutCancelledConfirmedTicketsCashSum
    ): WorkSessionReport {
        $this->SoldWithoutCancelledConfirmedTicketsCashSum = $SoldWithoutCancelledConfirmedTicketsCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldWithoutCancelledConfirmedTicketsNonCashSum(): ?float
    {
        return $this->SoldWithoutCancelledConfirmedTicketsNonCashSum;
    }

    /**
     * @param float|null $SoldWithoutCancelledConfirmedTicketsNonCashSum
     * @return WorkSessionReport
     */
    public function setSoldWithoutCancelledConfirmedTicketsNonCashSum(
        ?float $SoldWithoutCancelledConfirmedTicketsNonCashSum
    ): WorkSessionReport {
        $this->SoldWithoutCancelledConfirmedTicketsNonCashSum = $SoldWithoutCancelledConfirmedTicketsNonCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldWithoutCancelledConfirmedTicketsCommissionSum(): ?float
    {
        return $this->SoldWithoutCancelledConfirmedTicketsCommissionSum;
    }

    /**
     * @param float|null $SoldWithoutCancelledConfirmedTicketsCommissionSum
     * @return WorkSessionReport
     */
    public function setSoldWithoutCancelledConfirmedTicketsCommissionSum(
        ?float $SoldWithoutCancelledConfirmedTicketsCommissionSum
    ): WorkSessionReport {
        $this->SoldWithoutCancelledConfirmedTicketsCommissionSum = $SoldWithoutCancelledConfirmedTicketsCommissionSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalSumWithoutCommission(): ?float
    {
        return $this->TotalSumWithoutCommission;
    }

    /**
     * @param float|null $TotalSumWithoutCommission
     * @return WorkSessionReport
     */
    public function setTotalSumWithoutCommission(?float $TotalSumWithoutCommission): WorkSessionReport
    {
        $this->TotalSumWithoutCommission = $TotalSumWithoutCommission;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalCommissionSum(): ?float
    {
        return $this->TotalCommissionSum;
    }

    /**
     * @param float|null $TotalCommissionSum
     * @return WorkSessionReport
     */
    public function setTotalCommissionSum(?float $TotalCommissionSum): WorkSessionReport
    {
        $this->TotalCommissionSum = $TotalCommissionSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalCommissionCashSum(): ?float
    {
        return $this->TotalCommissionCashSum;
    }

    /**
     * @param float|null $TotalCommissionCashSum
     * @return WorkSessionReport
     */
    public function setTotalCommissionCashSum(?float $TotalCommissionCashSum): WorkSessionReport
    {
        $this->TotalCommissionCashSum = $TotalCommissionCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalCommissionNonCashSum(): ?float
    {
        return $this->TotalCommissionNonCashSum;
    }

    /**
     * @param float|null $TotalCommissionNonCashSum
     * @return WorkSessionReport
     */
    public function setTotalCommissionNonCashSum(?float $TotalCommissionNonCashSum): WorkSessionReport
    {
        $this->TotalCommissionNonCashSum = $TotalCommissionNonCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalSum(): ?float
    {
        return $this->TotalSum;
    }

    /**
     * @param float|null $TotalSum
     * @return WorkSessionReport
     */
    public function setTotalSum(?float $TotalSum): WorkSessionReport
    {
        $this->TotalSum = $TotalSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalCashSum(): ?float
    {
        return $this->TotalCashSum;
    }

    /**
     * @param float|null $TotalCashSum
     * @return WorkSessionReport
     */
    public function setTotalCashSum(?float $TotalCashSum): WorkSessionReport
    {
        $this->TotalCashSum = $TotalCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalNonCashSum(): ?float
    {
        return $this->TotalNonCashSum;
    }

    /**
     * @param float|null $TotalNonCashSum
     * @return WorkSessionReport
     */
    public function setTotalNonCashSum(?float $TotalNonCashSum): WorkSessionReport
    {
        $this->TotalNonCashSum = $TotalNonCashSum;

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
     * @return WorkSessionReport
     */
    public function setDamagedBlanksCount(?int $DamagedBlanksCount): WorkSessionReport
    {
        $this->DamagedBlanksCount = $DamagedBlanksCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSoldOptionalServiceCashCount(): ?int
    {
        return $this->SoldOptionalServiceCashCount;
    }

    /**
     * @param int|null $SoldOptionalServiceCashCount
     * @return WorkSessionReport
     */
    public function setSoldOptionalServiceCashCount(?int $SoldOptionalServiceCashCount): WorkSessionReport
    {
        $this->SoldOptionalServiceCashCount = $SoldOptionalServiceCashCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSoldOptionalServiceNonCashCount(): ?int
    {
        return $this->SoldOptionalServiceNonCashCount;
    }

    /**
     * @param int|null $SoldOptionalServiceNonCashCount
     * @return WorkSessionReport
     */
    public function setSoldOptionalServiceNonCashCount(?int $SoldOptionalServiceNonCashCount): WorkSessionReport
    {
        $this->SoldOptionalServiceNonCashCount = $SoldOptionalServiceNonCashCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCancelledOptionalServiceCount(): ?int
    {
        return $this->CancelledOptionalServiceCount;
    }

    /**
     * @param int|null $CancelledOptionalServiceCount
     * @return WorkSessionReport
     */
    public function setCancelledOptionalServiceCount(?int $CancelledOptionalServiceCount): WorkSessionReport
    {
        $this->CancelledOptionalServiceCount = $CancelledOptionalServiceCount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldOptionalServiceCashSum(): ?float
    {
        return $this->SoldOptionalServiceCashSum;
    }

    /**
     * @param float|null $SoldOptionalServiceCashSum
     * @return WorkSessionReport
     */
    public function setSoldOptionalServiceCashSum(?float $SoldOptionalServiceCashSum): WorkSessionReport
    {
        $this->SoldOptionalServiceCashSum = $SoldOptionalServiceCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSoldOptionalServiceNonCashSum(): ?float
    {
        return $this->SoldOptionalServiceNonCashSum;
    }

    /**
     * @param float|null $SoldOptionalServiceNonCashSum
     * @return WorkSessionReport
     */
    public function setSoldOptionalServiceNonCashSum(?float $SoldOptionalServiceNonCashSum): WorkSessionReport
    {
        $this->SoldOptionalServiceNonCashSum = $SoldOptionalServiceNonCashSum;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCancelledOptionalServiceSum(): ?float
    {
        return $this->CancelledOptionalServiceSum;
    }

    /**
     * @param float|null $CancelledOptionalServiceSum
     * @return WorkSessionReport
     */
    public function setCancelledOptionalServiceSum(?float $CancelledOptionalServiceSum): WorkSessionReport
    {
        $this->CancelledOptionalServiceSum = $CancelledOptionalServiceSum;

        return $this;
    }
}
