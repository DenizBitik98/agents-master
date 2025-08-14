<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class GetOrderInfoResponse
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info
 */
class GetOrderInfoResponse implements IResponse
{
    /**
     * @JMS\SerializedName("RequestTimestamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $RequestTimestamp
     */
    protected $RequestTimestamp;
    /**
     * @JMS\SerializedName("ReferenceInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info\ReferenceInfo")
     * @var null|ReferenceInfo $ReferenceInfo
     */
    protected $ReferenceInfo;
    /**
     * @JMS\SerializedName("SalesAgent")
     * @JMS\Type("string")
     * @var null|string $SalesAgent
     */
    protected $SalesAgent;
    /**
     * @JMS\SerializedName("OrderExpressId")
     * @JMS\Type("string")
     * @var null|string $OrderExpressId
     */
    protected $OrderExpressId;
    /**
     * @JMS\SerializedName("OperationTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $OperationTimeStamp
     */
    protected $OperationTimeStamp;
    /**
     * @JMS\SerializedName("TrainNumber")
     * @JMS\Type("string")
     * @var null|string $TrainNumber
     */
    protected $TrainNumber;
    /**
     * @JMS\SerializedName("DepartureTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $DepartureTimeStamp
     */
    protected $DepartureTimeStamp;
    /**
     * @JMS\SerializedName("DepartureStationName")
     * @JMS\Type("string")
     * @var null|string $DepartureStationName
     */
    protected $DepartureStationName;
    /**
     * @JMS\SerializedName("DepartureStationCode")
     * @JMS\Type("string")
     * @var null|string $DepartureStationCode
     */
    protected $DepartureStationCode;
    /**
     * @JMS\SerializedName("ArrivalStationName")
     * @JMS\Type("string")
     * @var null|string $ArrivalStationName
     */
    protected $ArrivalStationName;
    /**
     * @JMS\SerializedName("ArrivalStationCode")
     * @JMS\Type("string")
     * @var null|string $ArrivalStationCode
     */
    protected $ArrivalStationCode;
    /**
     * @JMS\SerializedName("ArrivalTrainNumber")
     * @JMS\Type("string")
     * @var null|string $ArrivalTrainNumber
     */
    protected $ArrivalTrainNumber;
    /**
     * @JMS\SerializedName("PassengerArrivalTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $PassengerArrivalTimeStamp
     */
    protected $PassengerArrivalTimeStamp;
    /**
     * @JMS\SerializedName("CarNumber")
     * @JMS\Type("string")
     * @var null|string $CarNumber
     */
    protected $CarNumber;
    /**
     * @JMS\SerializedName("CarOwner")
     * @JMS\Type("string")
     * @var null|string $CarOwner
     */
    protected $CarOwner;
    /**
     * @JMS\SerializedName("CarType")
     * @JMS\Type("int")
     * @var null|integer $CarType
     */
    protected $CarType;
    /**
     * @JMS\SerializedName("ServiceClass")
     * @JMS\Type("string")
     * @var null|string $ServiceClass
     */
    protected $ServiceClass;
    /**
     * @JMS\SerializedName("CarrierName")
     * @JMS\Type("string")
     * @var null|string $CarrierName
     */
    protected $CarrierName;
    /**
     * @JMS\SerializedName("CarrierMnemonicCode")
     * @JMS\Type("string")
     * @var null|string $CarrierMnemonicCode
     */
    protected $CarrierMnemonicCode;
    /**
     * @JMS\SerializedName("CarrierCode")
     * @JMS\Type("string")
     * @var null|string $CarrierCode
     */
    protected $CarrierCode;
    /**
     * @JMS\SerializedName("CarrierStateCode")
     * @JMS\Type("string")
     * @var null|string $CarrierStateCode
     */
    protected $CarrierStateCode;
    /**
     * @JMS\SerializedName("SignR0")
     * @JMS\Type("string")
     * @var null|string $SignR0
     */
    protected $SignR0;
    /**
     * @JMS\SerializedName("Tickets")
     * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info\Ticket>")
     * @var null|Collection|Ticket[] $Tickets
     */
    protected $Tickets;

    /**
     * @return DateTime|null
     */
    public function getRequestTimestamp(): ?DateTime
    {
        return $this->RequestTimestamp;
    }

    /**
     * @param DateTime|null $RequestTimestamp
     */
    public function setRequestTimestamp(?DateTime $RequestTimestamp): void
    {
        $this->RequestTimestamp = $RequestTimestamp;
    }

    /**
     * @return ReferenceInfo|null
     */
    public function getReferenceInfo(): ?ReferenceInfo
    {
        return $this->ReferenceInfo;
    }

    /**
     * @param ReferenceInfo|null $ReferenceInfo
     */
    public function setReferenceInfo(?ReferenceInfo $ReferenceInfo): void
    {
        $this->ReferenceInfo = $ReferenceInfo;
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
     * @return string|null
     */
    public function getOrderExpressId(): ?string
    {
        return $this->OrderExpressId;
    }

    /**
     * @param string|null $OrderExpressId
     */
    public function setOrderExpressId(?string $OrderExpressId): void
    {
        $this->OrderExpressId = $OrderExpressId;
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
    public function getTrainNumber(): ?string
    {
        return $this->TrainNumber;
    }

    /**
     * @param string|null $TrainNumber
     */
    public function setTrainNumber(?string $TrainNumber): void
    {
        $this->TrainNumber = $TrainNumber;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureTimeStamp(): ?DateTime
    {
        return $this->DepartureTimeStamp;
    }

    /**
     * @param DateTime|null $DepartureTimeStamp
     */
    public function setDepartureTimeStamp(?DateTime $DepartureTimeStamp): void
    {
        $this->DepartureTimeStamp = $DepartureTimeStamp;
    }

    /**
     * @return string|null
     */
    public function getDepartureStationName(): ?string
    {
        return $this->DepartureStationName;
    }

    /**
     * @param string|null $DepartureStationName
     */
    public function setDepartureStationName(?string $DepartureStationName): void
    {
        $this->DepartureStationName = $DepartureStationName;
    }

    /**
     * @return string|null
     */
    public function getDepartureStationCode(): ?string
    {
        return $this->DepartureStationCode;
    }

    /**
     * @param string|null $DepartureStationCode
     */
    public function setDepartureStationCode(?string $DepartureStationCode): void
    {
        $this->DepartureStationCode = $DepartureStationCode;
    }

    /**
     * @return string|null
     */
    public function getArrivalStationName(): ?string
    {
        return $this->ArrivalStationName;
    }

    /**
     * @param string|null $ArrivalStationName
     */
    public function setArrivalStationName(?string $ArrivalStationName): void
    {
        $this->ArrivalStationName = $ArrivalStationName;
    }

    /**
     * @return string|null
     */
    public function getArrivalStationCode(): ?string
    {
        return $this->ArrivalStationCode;
    }

    /**
     * @param string|null $ArrivalStationCode
     */
    public function setArrivalStationCode(?string $ArrivalStationCode): void
    {
        $this->ArrivalStationCode = $ArrivalStationCode;
    }

    /**
     * @return string|null
     */
    public function getArrivalTrainNumber(): ?string
    {
        return $this->ArrivalTrainNumber;
    }

    /**
     * @param string|null $ArrivalTrainNumber
     */
    public function setArrivalTrainNumber(?string $ArrivalTrainNumber): void
    {
        $this->ArrivalTrainNumber = $ArrivalTrainNumber;
    }

    /**
     * @return DateTime|null
     */
    public function getPassengerArrivalTimeStamp(): ?DateTime
    {
        return $this->PassengerArrivalTimeStamp;
    }

    /**
     * @param DateTime|null $PassengerArrivalTimeStamp
     */
    public function setPassengerArrivalTimeStamp(?DateTime $PassengerArrivalTimeStamp): void
    {
        $this->PassengerArrivalTimeStamp = $PassengerArrivalTimeStamp;
    }

    /**
     * @return string|null
     */
    public function getCarNumber(): ?string
    {
        return $this->CarNumber;
    }

    /**
     * @param string|null $CarNumber
     */
    public function setCarNumber(?string $CarNumber): void
    {
        $this->CarNumber = $CarNumber;
    }

    /**
     * @return string|null
     */
    public function getCarOwner(): ?string
    {
        return $this->CarOwner;
    }

    /**
     * @param string|null $CarOwner
     */
    public function setCarOwner(?string $CarOwner): void
    {
        $this->CarOwner = $CarOwner;
    }

    /**
     * @return int|null
     */
    public function getCarType(): ?int
    {
        return $this->CarType;
    }

    /**
     * @param int|null $CarType
     */
    public function setCarType(?int $CarType): void
    {
        $this->CarType = $CarType;
    }

    /**
     * @return string|null
     */
    public function getServiceClass(): ?string
    {
        return $this->ServiceClass;
    }

    /**
     * @param string|null $ServiceClass
     */
    public function setServiceClass(?string $ServiceClass): void
    {
        $this->ServiceClass = $ServiceClass;
    }

    /**
     * @return string|null
     */
    public function getCarrierName(): ?string
    {
        return $this->CarrierName;
    }

    /**
     * @param string|null $CarrierName
     */
    public function setCarrierName(?string $CarrierName): void
    {
        $this->CarrierName = $CarrierName;
    }

    /**
     * @return string|null
     */
    public function getCarrierMnemonicCode(): ?string
    {
        return $this->CarrierMnemonicCode;
    }

    /**
     * @param string|null $CarrierMnemonicCode
     */
    public function setCarrierMnemonicCode(?string $CarrierMnemonicCode): void
    {
        $this->CarrierMnemonicCode = $CarrierMnemonicCode;
    }

    /**
     * @return string|null
     */
    public function getCarrierCode(): ?string
    {
        return $this->CarrierCode;
    }

    /**
     * @param string|null $CarrierCode
     */
    public function setCarrierCode(?string $CarrierCode): void
    {
        $this->CarrierCode = $CarrierCode;
    }

    /**
     * @return string|null
     */
    public function getCarrierStateCode(): ?string
    {
        return $this->CarrierStateCode;
    }

    /**
     * @param string|null $CarrierStateCode
     */
    public function setCarrierStateCode(?string $CarrierStateCode): void
    {
        $this->CarrierStateCode = $CarrierStateCode;
    }

    /**
     * @return string|null
     */
    public function getSignR0(): ?string
    {
        return $this->SignR0;
    }

    /**
     * @param string|null $SignR0
     */
    public function setSignR0(?string $SignR0): void
    {
        $this->SignR0 = $SignR0;
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
}
