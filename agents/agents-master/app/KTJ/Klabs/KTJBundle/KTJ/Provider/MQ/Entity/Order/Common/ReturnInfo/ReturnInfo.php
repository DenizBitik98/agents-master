<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\ReturnInfo;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Ticket\Ticket;

/**
 * Class ReturnInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\ReturnInfo
 */
class ReturnInfo
{
    /**
     * @JMS\SerializedName("FKSNumber")
     * @JMS\Type("string")
     * @var null|string $FKSNumber
     */
    protected $FKSNumber;
    /**
     * @JMS\SerializedName("SalesAgent")
     * @JMS\Type("string")
     * @var null|string $SalesAgent
     */
    protected $SalesAgent;
    /**
     * @JMS\SerializedName("OperationType")
     * @JMS\Type("int")
     * @var null|integer $OperationType
     */
    protected $OperationType;
    /**
     * @JMS\SerializedName("PaymentType")
     * @JMS\Type("int")
     * @var null|integer $PaymentType
     */
    protected $PaymentType;
    /**
     * @JMS\SerializedName("WholeOrderReturnTariff")
     * @JMS\Type("float")
     * @var null|float $WholeOrderReturnTariff
     */
    protected $WholeOrderReturnTariff;
    /**
     * @JMS\SerializedName("ReturnTypeInfo")
     * @JMS\Type("string")
     * @var null|string $ReturnTypeInfo
     */
    protected $ReturnTypeInfo;
    /**
     * @JMS\SerializedName("SpecialReturnInfo")
     * @JMS\Type("string")
     * @var null|string $SpecialReturnInfo
     */
    protected $SpecialReturnInfo;
    /**
     * @JMS\SerializedName("TimeBeforeDeparture")
     * @JMS\Type("string")
     * @var null|DateTime $TimeBeforeDeparture
     */
    protected $TimeBeforeDeparture;
    /**
     * @JMS\SerializedName("OperationTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $OperationTimeStamp
     */
    protected $OperationTimeStamp;
    /**
     * @JMS\SerializedName("StopEnRouteStationCode")
     * @JMS\Type("string")
     * @var null|string $StopEnRouteStationCode
     */
    protected $StopEnRouteStationCode;
    /**
     * @JMS\SerializedName("StopEnRouteStationName")
     * @JMS\Type("string")
     * @var null|string $StopEnRouteStationName
     */
    protected $StopEnRouteStationName;
    /**
     * @JMS\SerializedName("OrderBookingId")
     * @JMS\Type("string")
     * @var null|string $OrderBookingId
     */
    protected $OrderBookingId;
    /**
     * @JMS\SerializedName("Tickets")
     * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Ticket\Ticket>")
     * @var null|Collection|Ticket[] $Tickets
     */
    protected $Tickets;
    /**
     * @JMS\SerializedName("IsWholeOrderReturn")
     * @JMS\Type("bool")
     * @var null|boolean $IsWholeOrderReturn
     */
    protected $IsWholeOrderReturn;
    /**
     * @JMS\SerializedName("ReturnSeatsOnly")
     * @JMS\Type("bool")
     * @var null|boolean $ReturnSeatsOnly
     */
    protected $ReturnSeatsOnly;
    /**
     * @JMS\SerializedName("DueToComplaint")
     * @JMS\Type("bool")
     * @var null|boolean $DueToComplaint
     */
    protected $DueToComplaint;
    /**
     * @JMS\SerializedName("DueToRailroadsGuilt")
     * @JMS\Type("bool")
     * @var null|boolean $DueToRailroadsGuilt
     */
    protected $DueToRailroadsGuilt;
    /**
     * @JMS\SerializedName("WithLaterTripRenewal")
     * @JMS\Type("bool")
     * @var null|boolean $WithLaterTripRenewal
     */
    protected $WithLaterTripRenewal;
    /**
     * @JMS\SerializedName("DueToIllness")
     * @JMS\Type("bool")
     * @var null|boolean $DueToIllness
     */
    protected $DueToIllness;
    /**
     * @JMS\SerializedName("ToReturnPlackartaNDS")
     * @JMS\Type("bool")
     * @var null|boolean $ToReturnPlackartaNDS
     */
    protected $ToReturnPlackartaNDS;
    /**
     * @JMS\SerializedName("PenaltyCharge")
     * @JMS\Type("bool")
     * @var null|boolean $PenaltyCharge
     */
    protected $PenaltyCharge;
    /**
     * @JMS\SerializedName("ExpiredCancellation")
     * @JMS\Type("bool")
     * @var null|boolean $ExpiredCancellation
     */
    protected $ExpiredCancellation;

    /**
     * @return string|null
     */
    public function getFKSNumber(): ?string
    {
        return $this->FKSNumber;
    }

    /**
     * @param string|null $FKSNumber
     */
    public function setFKSNumber(?string $FKSNumber): void
    {
        $this->FKSNumber = $FKSNumber;
    }

    /**
     * @return string|null
     */
    public function getSalesAgent(): ?string
    {
        return $this->SalesAgent;
    }

    /**
     * @param string|null $SalesAgent
     */
    public function setSalesAgent(?string $SalesAgent): void
    {
        $this->SalesAgent = $SalesAgent;
    }

    /**
     * @return int|null
     */
    public function getOperationType(): ?int
    {
        return $this->OperationType;
    }

    /**
     * @param int|null $OperationType
     */
    public function setOperationType(?int $OperationType): void
    {
        $this->OperationType = $OperationType;
    }

    /**
     * @return int|null
     */
    public function getPaymentType(): ?int
    {
        return $this->PaymentType;
    }

    /**
     * @param int|null $PaymentType
     */
    public function setPaymentType(?int $PaymentType): void
    {
        $this->PaymentType = $PaymentType;
    }

    /**
     * @return float|null
     */
    public function getWholeOrderReturnTariff(): ?float
    {
        return $this->WholeOrderReturnTariff;
    }

    /**
     * @param float|null $WholeOrderReturnTariff
     */
    public function setWholeOrderReturnTariff(?float $WholeOrderReturnTariff): void
    {
        $this->WholeOrderReturnTariff = $WholeOrderReturnTariff;
    }

    /**
     * @return string|null
     */
    public function getReturnTypeInfo(): ?string
    {
        return $this->ReturnTypeInfo;
    }

    /**
     * @param string|null $ReturnTypeInfo
     */
    public function setReturnTypeInfo(?string $ReturnTypeInfo): void
    {
        $this->ReturnTypeInfo = $ReturnTypeInfo;
    }

    /**
     * @return string|null
     */
    public function getSpecialReturnInfo(): ?string
    {
        return $this->SpecialReturnInfo;
    }

    /**
     * @param string|null $SpecialReturnInfo
     */
    public function setSpecialReturnInfo(?string $SpecialReturnInfo): void
    {
        $this->SpecialReturnInfo = $SpecialReturnInfo;
    }

    /**
     * @return DateTime|null
     */
    public function getTimeBeforeDeparture(): ?DateTime
    {
        return $this->TimeBeforeDeparture;
    }

    /**
     * @param DateTime|null $TimeBeforeDeparture
     */
    public function setTimeBeforeDeparture(?DateTime $TimeBeforeDeparture): void
    {
        $this->TimeBeforeDeparture = $TimeBeforeDeparture;
    }

    /**
     * @return DateTime|null
     */
    public function getOperationTimeStamp(): ?DateTime
    {
        return $this->OperationTimeStamp;
    }

    /**
     * @param DateTime|null $OperationTimeStamp
     */
    public function setOperationTimeStamp(?DateTime $OperationTimeStamp): void
    {
        $this->OperationTimeStamp = $OperationTimeStamp;
    }

    /**
     * @return string|null
     */
    public function getStopEnRouteStationCode(): ?string
    {
        return $this->StopEnRouteStationCode;
    }

    /**
     * @param string|null $StopEnRouteStationCode
     */
    public function setStopEnRouteStationCode(?string $StopEnRouteStationCode): void
    {
        $this->StopEnRouteStationCode = $StopEnRouteStationCode;
    }

    /**
     * @return string|null
     */
    public function getStopEnRouteStationName(): ?string
    {
        return $this->StopEnRouteStationName;
    }

    /**
     * @param string|null $StopEnRouteStationName
     */
    public function setStopEnRouteStationName(?string $StopEnRouteStationName): void
    {
        $this->StopEnRouteStationName = $StopEnRouteStationName;
    }

    /**
     * @return string|null
     */
    public function getOrderBookingId(): ?string
    {
        return $this->OrderBookingId;
    }

    /**
     * @param string|null $OrderBookingId
     */
    public function setOrderBookingId(?string $OrderBookingId): void
    {
        $this->OrderBookingId = $OrderBookingId;
    }

    /**
     * @return Collection|Ticket[]|null
     */
    public function getTickets()
    {
        return $this->Tickets;
    }

    /**
     * @param Collection|Ticket[]|null $Tickets
     */
    public function setTickets($Tickets): void
    {
        $this->Tickets = $Tickets;
    }

    /**
     * @return bool|null
     */
    public function getIsWholeOrderReturn(): ?bool
    {
        return $this->IsWholeOrderReturn;
    }

    /**
     * @param bool|null $IsWholeOrderReturn
     */
    public function setIsWholeOrderReturn(?bool $IsWholeOrderReturn): void
    {
        $this->IsWholeOrderReturn = $IsWholeOrderReturn;
    }

    /**
     * @return bool|null
     */
    public function getReturnSeatsOnly(): ?bool
    {
        return $this->ReturnSeatsOnly;
    }

    /**
     * @param bool|null $ReturnSeatsOnly
     */
    public function setReturnSeatsOnly(?bool $ReturnSeatsOnly): void
    {
        $this->ReturnSeatsOnly = $ReturnSeatsOnly;
    }

    /**
     * @return bool|null
     */
    public function getDueToComplaint(): ?bool
    {
        return $this->DueToComplaint;
    }

    /**
     * @param bool|null $DueToComplaint
     */
    public function setDueToComplaint(?bool $DueToComplaint): void
    {
        $this->DueToComplaint = $DueToComplaint;
    }

    /**
     * @return bool|null
     */
    public function getDueToRailroadsGuilt(): ?bool
    {
        return $this->DueToRailroadsGuilt;
    }

    /**
     * @param bool|null $DueToRailroadsGuilt
     */
    public function setDueToRailroadsGuilt(?bool $DueToRailroadsGuilt): void
    {
        $this->DueToRailroadsGuilt = $DueToRailroadsGuilt;
    }

    /**
     * @return bool|null
     */
    public function getWithLaterTripRenewal(): ?bool
    {
        return $this->WithLaterTripRenewal;
    }

    /**
     * @param bool|null $WithLaterTripRenewal
     */
    public function setWithLaterTripRenewal(?bool $WithLaterTripRenewal): void
    {
        $this->WithLaterTripRenewal = $WithLaterTripRenewal;
    }

    /**
     * @return bool|null
     */
    public function getDueToIllness(): ?bool
    {
        return $this->DueToIllness;
    }

    /**
     * @param bool|null $DueToIllness
     */
    public function setDueToIllness(?bool $DueToIllness): void
    {
        $this->DueToIllness = $DueToIllness;
    }

    /**
     * @return bool|null
     */
    public function getToReturnPlackartaNDS(): ?bool
    {
        return $this->ToReturnPlackartaNDS;
    }

    /**
     * @param bool|null $ToReturnPlackartaNDS
     */
    public function setToReturnPlackartaNDS(?bool $ToReturnPlackartaNDS): void
    {
        $this->ToReturnPlackartaNDS = $ToReturnPlackartaNDS;
    }

    /**
     * @return bool|null
     */
    public function getPenaltyCharge(): ?bool
    {
        return $this->PenaltyCharge;
    }

    /**
     * @param bool|null $PenaltyCharge
     */
    public function setPenaltyCharge(?bool $PenaltyCharge): void
    {
        $this->PenaltyCharge = $PenaltyCharge;
    }

    /**
     * @return bool|null
     */
    public function getExpiredCancellation(): ?bool
    {
        return $this->ExpiredCancellation;
    }

    /**
     * @param bool|null $ExpiredCancellation
     */
    public function setExpiredCancellation(?bool $ExpiredCancellation): void
    {
        $this->ExpiredCancellation = $ExpiredCancellation;
    }
}
