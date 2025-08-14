<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm;

use DateTime;
use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve\Ticket;

/**
 * Class IssueOrderResponse
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm
 */
class IssueOrderResponse
{
    /**
     * @var null|Collection|OrderCancellation[] $OrderCancellations
     */
    protected $OrderCancellations;
    /**
     * @var null|Collection|OrderConfirmation[] $OrderConfirmations
     */
    protected $OrderConfirmations;
    /**
     * @var null|int $TransactionId
     */
    protected $TransactionId;
    /**
     * @var null|int $OrderId
     */
    protected $OrderId;
    /**
     * @var null|string $OrderExpressId
     */
    protected $OrderExpressId;
    /**
     * @var null|string $CarrierName
     */
    protected $CarrierName;
    /**
     * @var null|string $CarrierCode
     */
    protected $CarrierCode;
    /**
     * @var null|string $CarrierINN
     */
    protected $CarrierINN;
    /**
     * @var null|DateTime $OrderDateTime
     */
    protected $OrderDateTime;
    /**
     * @var null|string $DepartureTrainNumber
     */
    protected $DepartureTrainNumber;
    /**
     * @var null|DateTime $DepartureDateTime
     */
    protected $DepartureDateTime;
    /**
     * @var null|string $DepartureStationName
     */
    protected $DepartureStationName;
    /**
     * @var null|string $DepartureStationCode
     */
    protected $DepartureStationCode;
    /**
     * @var null|string $ArrivalStationName
     */
    protected $ArrivalStationName;
    /**
     * @var null|string $ArrivalStationCode
     */
    protected $ArrivalStationCode;
    /**
     * @var null|string $CarNumber
     */
    protected $CarNumber;
    /**
     * @var null|string $CarOwner
     */
    protected $CarOwner;
    /**
     * @var null|int $CarType
     */
    protected $CarType;
    /**
     * @var null|string $ServiceClass
     */
    protected $ServiceClass;
    /**
     * @var null|string $CarCarrierName
     */
    protected $CarCarrierName;
    /**
     * @var null|int $PaymentType
     */
    protected $PaymentType;
    /**
     * @var null|string $TimeDescription
     */
    protected $TimeDescription;
    /**
     * @var null|string $SignR0
     */
    protected $SignR0;
    /**
     * @var null|string $CarGender
     */
    protected $CarGender;
    /**
     * @var null|string $ArrivalTrainNumber
     */
    protected $ArrivalTrainNumber;
    /**
     * @var null|DateTime $ArrivalDateTime
     */
    protected $ArrivalDateTime;
    /**
     * @var null|Collection|Ticket[] $Tickets
     */
    protected $Tickets;
    /**
     * @var null|TerminalInfo $TerminalInfo
     */
    protected $TerminalInfo;
    /**
     * @var null|PayerInfo $PayerInfo
     */
    protected $PayerInfo;
    /**
     * @var null|bool $IsWithoutBedding
     */
    protected $IsWithoutBedding;
    /**
     * @var null|string $RoadCode
     */
    protected $RoadCode;
    /**
     * @var null|BookingInfo $BookingInfo
     */
    protected $BookingInfo;
    /**
     * @var null|int $TransportCommunicationType
     */
    protected $TransportCommunicationType;
    /**
     * @var null|string $TerminalIdentity
     */
    protected $TerminalIdentity;
    /**
     * @var null|string $FKSNumber
     */
    protected $FKSNumber;
    /**
     * @var null|string $OrderNumberInSystem
     */
    protected $OrderNumberInSystem;
    /**
     * @var null|int $GroupMembersCount
     */
    protected $GroupMembersCount;
    /**
     * @var null|string $InvalidOrder
     */
    protected $InvalidOrder;
    /**
     * @var null|bool $AllOrderTicketsLink
     */
    protected $AllOrderTicketsLink;
    /**
     * @var null|string $DepartureAndArrivalTimeInfo
     */
    protected $DepartureAndArrivalTimeInfo;
    /**
     * @var null|string $DepartureAndArrivaleTimeInfo
     */
    protected $DepartureAndArrivaleTimeInfo;
    /**
     * @var null|float $DepartureTimeGmtOffset
     */
    protected $DepartureTimeGmtOffset;
    /**
     * @var null|float $ArrivalTimeGmtOffset
     */
    protected $ArrivalTimeGmtOffset;

    /**
     * @return Collection|OrderCancellation[]|null
     */
    public function getOrderCancellations()
    {
        return $this->OrderCancellations;
    }

    /**
     * @param Collection|OrderCancellation[]|null $OrderCancellations
     * @return IssueOrderResponse
     */
    public function setOrderCancellations($OrderCancellations)
    {
        $this->OrderCancellations = $OrderCancellations;

        return $this;
    }

    /**
     * @return Collection|OrderConfirmation[]|null
     */
    public function getOrderConfirmations()
    {
        return $this->OrderConfirmations;
    }

    /**
     * @param Collection|OrderConfirmation[]|null $OrderConfirmations
     * @return IssueOrderResponse
     */
    public function setOrderConfirmations($OrderConfirmations)
    {
        $this->OrderConfirmations = $OrderConfirmations;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTransactionId(): ?int
    {
        return $this->TransactionId;
    }

    /**
     * @param int|null $TransactionId
     * @return IssueOrderResponse
     */
    public function setTransactionId(?int $TransactionId): IssueOrderResponse
    {
        $this->TransactionId = $TransactionId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->OrderId;
    }

    /**
     * @param int|null $OrderId
     * @return IssueOrderResponse
     */
    public function setOrderId(?int $OrderId): IssueOrderResponse
    {
        $this->OrderId = $OrderId;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setOrderExpressId(?string $OrderExpressId): IssueOrderResponse
    {
        $this->OrderExpressId = $OrderExpressId;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setCarrierName(?string $CarrierName): IssueOrderResponse
    {
        $this->CarrierName = $CarrierName;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setCarrierCode(?string $CarrierCode): IssueOrderResponse
    {
        $this->CarrierCode = $CarrierCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarrierINN(): ?string
    {
        return $this->CarrierINN;
    }

    /**
     * @param string|null $CarrierINN
     * @return IssueOrderResponse
     */
    public function setCarrierINN(?string $CarrierINN): IssueOrderResponse
    {
        $this->CarrierINN = $CarrierINN;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getOrderDateTime(): ?DateTime
    {
        return $this->OrderDateTime;
    }

    /**
     * @param DateTime|null $OrderDateTime
     * @return IssueOrderResponse
     */
    public function setOrderDateTime(?DateTime $OrderDateTime): IssueOrderResponse
    {
        $this->OrderDateTime = $OrderDateTime;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDepartureTrainNumber(): ?string
    {
        return $this->DepartureTrainNumber;
    }

    /**
     * @param string|null $DepartureTrainNumber
     * @return IssueOrderResponse
     */
    public function setDepartureTrainNumber(?string $DepartureTrainNumber): IssueOrderResponse
    {
        $this->DepartureTrainNumber = $DepartureTrainNumber;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureDateTime(): ?DateTime
    {
        return $this->DepartureDateTime;
    }

    /**
     * @param DateTime|null $DepartureDateTime
     * @return IssueOrderResponse
     */
    public function setDepartureDateTime(?DateTime $DepartureDateTime): IssueOrderResponse
    {
        $this->DepartureDateTime = $DepartureDateTime;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setDepartureStationName(?string $DepartureStationName): IssueOrderResponse
    {
        $this->DepartureStationName = $DepartureStationName;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setDepartureStationCode(?string $DepartureStationCode): IssueOrderResponse
    {
        $this->DepartureStationCode = $DepartureStationCode;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setArrivalStationName(?string $ArrivalStationName): IssueOrderResponse
    {
        $this->ArrivalStationName = $ArrivalStationName;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setArrivalStationCode(?string $ArrivalStationCode): IssueOrderResponse
    {
        $this->ArrivalStationCode = $ArrivalStationCode;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setCarNumber(?string $CarNumber): IssueOrderResponse
    {
        $this->CarNumber = $CarNumber;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setCarOwner(?string $CarOwner): IssueOrderResponse
    {
        $this->CarOwner = $CarOwner;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setCarType(?int $CarType): IssueOrderResponse
    {
        $this->CarType = $CarType;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setServiceClass(?string $ServiceClass): IssueOrderResponse
    {
        $this->ServiceClass = $ServiceClass;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarCarrierName(): ?string
    {
        return $this->CarCarrierName;
    }

    /**
     * @param string|null $CarCarrierName
     * @return IssueOrderResponse
     */
    public function setCarCarrierName(?string $CarCarrierName): IssueOrderResponse
    {
        $this->CarCarrierName = $CarCarrierName;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setPaymentType(?int $PaymentType): IssueOrderResponse
    {
        $this->PaymentType = $PaymentType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTimeDescription(): ?string
    {
        return $this->TimeDescription;
    }

    /**
     * @param string|null $TimeDescription
     * @return IssueOrderResponse
     */
    public function setTimeDescription(?string $TimeDescription): IssueOrderResponse
    {
        $this->TimeDescription = $TimeDescription;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setSignR0(?string $SignR0): IssueOrderResponse
    {
        $this->SignR0 = $SignR0;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarGender(): ?string
    {
        return $this->CarGender;
    }

    /**
     * @param string|null $CarGender
     * @return IssueOrderResponse
     */
    public function setCarGender(?string $CarGender): IssueOrderResponse
    {
        $this->CarGender = $CarGender;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setArrivalTrainNumber(?string $ArrivalTrainNumber): IssueOrderResponse
    {
        $this->ArrivalTrainNumber = $ArrivalTrainNumber;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getArrivalDateTime(): ?DateTime
    {
        return $this->ArrivalDateTime;
    }

    /**
     * @param DateTime|null $ArrivalDateTime
     * @return IssueOrderResponse
     */
    public function setArrivalDateTime(?DateTime $ArrivalDateTime): IssueOrderResponse
    {
        $this->ArrivalDateTime = $ArrivalDateTime;

        return $this;
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
     * @return IssueOrderResponse
     */
    public function setTickets($Tickets)
    {
        $this->Tickets = $Tickets;

        return $this;
    }

    /**
     * @return TerminalInfo|null
     */
    public function getTerminalInfo(): ?TerminalInfo
    {
        return $this->TerminalInfo;
    }

    /**
     * @param TerminalInfo|null $TerminalInfo
     * @return IssueOrderResponse
     */
    public function setTerminalInfo(?TerminalInfo $TerminalInfo): IssueOrderResponse
    {
        $this->TerminalInfo = $TerminalInfo;

        return $this;
    }

    /**
     * @return PayerInfo|null
     */
    public function getPayerInfo(): ?PayerInfo
    {
        return $this->PayerInfo;
    }

    /**
     * @param PayerInfo|null $PayerInfo
     * @return IssueOrderResponse
     */
    public function setPayerInfo(?PayerInfo $PayerInfo): IssueOrderResponse
    {
        $this->PayerInfo = $PayerInfo;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsWithoutBedding(): ?bool
    {
        return $this->IsWithoutBedding;
    }

    /**
     * @param bool|null $IsWithoutBedding
     * @return IssueOrderResponse
     */
    public function setIsWithoutBedding(?bool $IsWithoutBedding): IssueOrderResponse
    {
        $this->IsWithoutBedding = $IsWithoutBedding;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRoadCode(): ?string
    {
        return $this->RoadCode;
    }

    /**
     * @param string|null $RoadCode
     * @return IssueOrderResponse
     */
    public function setRoadCode(?string $RoadCode): IssueOrderResponse
    {
        $this->RoadCode = $RoadCode;

        return $this;
    }

    /**
     * @return BookingInfo|null
     */
    public function getBookingInfo(): ?BookingInfo
    {
        return $this->BookingInfo;
    }

    /**
     * @param BookingInfo|null $BookingInfo
     * @return IssueOrderResponse
     */
    public function setBookingInfo(?BookingInfo $BookingInfo): IssueOrderResponse
    {
        $this->BookingInfo = $BookingInfo;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTransportCommunicationType(): ?int
    {
        return $this->TransportCommunicationType;
    }

    /**
     * @param int|null $TransportCommunicationType
     * @return IssueOrderResponse
     */
    public function setTransportCommunicationType(?int $TransportCommunicationType): IssueOrderResponse
    {
        $this->TransportCommunicationType = $TransportCommunicationType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTerminalIdentity(): ?string
    {
        return $this->TerminalIdentity;
    }

    /**
     * @param string|null $TerminalIdentity
     * @return IssueOrderResponse
     */
    public function setTerminalIdentity(?string $TerminalIdentity): IssueOrderResponse
    {
        $this->TerminalIdentity = $TerminalIdentity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFKSNumber(): ?string
    {
        return $this->FKSNumber;
    }

    /**
     * @param string|null $FKSNumber
     * @return IssueOrderResponse
     */
    public function setFKSNumber(?string $FKSNumber): IssueOrderResponse
    {
        $this->FKSNumber = $FKSNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrderNumberInSystem(): ?string
    {
        return $this->OrderNumberInSystem;
    }

    /**
     * @param string|null $OrderNumberInSystem
     * @return IssueOrderResponse
     */
    public function setOrderNumberInSystem(?string $OrderNumberInSystem): IssueOrderResponse
    {
        $this->OrderNumberInSystem = $OrderNumberInSystem;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGroupMembersCount(): ?int
    {
        return $this->GroupMembersCount;
    }

    /**
     * @param int|null $GroupMembersCount
     * @return IssueOrderResponse
     */
    public function setGroupMembersCount(?int $GroupMembersCount): IssueOrderResponse
    {
        $this->GroupMembersCount = $GroupMembersCount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvalidOrder(): ?string
    {
        return $this->InvalidOrder;
    }

    /**
     * @param string|null $InvalidOrder
     * @return IssueOrderResponse
     */
    public function setInvalidOrder(?string $InvalidOrder): IssueOrderResponse
    {
        $this->InvalidOrder = $InvalidOrder;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllOrderTicketsLink(): ?bool
    {
        return $this->AllOrderTicketsLink;
    }

    /**
     * @param bool|null $AllOrderTicketsLink
     * @return IssueOrderResponse
     */
    public function setAllOrderTicketsLink(?bool $AllOrderTicketsLink): IssueOrderResponse
    {
        $this->AllOrderTicketsLink = $AllOrderTicketsLink;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDepartureAndArrivalTimeInfo(): ?string
    {
        return $this->DepartureAndArrivalTimeInfo;
    }

    /**
     * @param string|null $DepartureAndArrivalTimeInfo
     * @return IssueOrderResponse
     */
    public function setDepartureAndArrivalTimeInfo(?string $DepartureAndArrivalTimeInfo): IssueOrderResponse
    {
        $this->DepartureAndArrivalTimeInfo = $DepartureAndArrivalTimeInfo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDepartureAndArrivaleTimeInfo(): ?string
    {
        return $this->DepartureAndArrivaleTimeInfo;
    }

    /**
     * @param string|null $DepartureAndArrivaleTimeInfo
     * @return IssueOrderResponse
     */
    public function setDepartureAndArrivaleTimeInfo(?string $DepartureAndArrivaleTimeInfo): IssueOrderResponse
    {
        $this->DepartureAndArrivaleTimeInfo = $DepartureAndArrivaleTimeInfo;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getDepartureTimeGmtOffset(): ?float
    {
        return $this->DepartureTimeGmtOffset;
    }

    /**
     * @param float|null $DepartureTimeGmtOffset
     * @return IssueOrderResponse
     */
    public function setDepartureTimeGmtOffset(?float $DepartureTimeGmtOffset): IssueOrderResponse
    {
        $this->DepartureTimeGmtOffset = $DepartureTimeGmtOffset;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getArrivalTimeGmtOffset(): ?float
    {
        return $this->ArrivalTimeGmtOffset;
    }

    /**
     * @param float|null $ArrivalTimeGmtOffset
     * @return IssueOrderResponse
     */
    public function setArrivalTimeGmtOffset(?float $ArrivalTimeGmtOffset): IssueOrderResponse
    {
        $this->ArrivalTimeGmtOffset = $ArrivalTimeGmtOffset;

        return $this;
    }
}
