<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

use DateTime;
use Doctrine\Common\Collections\Collection;

/**
 * Class Order
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class Order
{
    /**
     * @var null|Collection|CancelOrder[] $OrderCancellations
     */
    protected $OrderCancellations;
    /**
     * @var null|Collection|ConfirmOrder[] $OrderConfirmations
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
     * @var null|string $PaymentOrderPayerCode
     */
    protected $PaymentOrderPayerCode;
    /**
     * @var null|string $TimeDescription
     */
    protected $TimeDescription;
    /**
     * @var null|string $SignR0
     */
    protected $SignR0;
    /**
     * @var null|int $CarGender
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
     * @var null|Ticket[]|Collection $Tickets
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
     * @var null|InvalidOrder $InvalidOrder
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
     * @return Collection|CancelOrder[]|null
     */
    public function getOrderCancellations()
    {
        return $this->OrderCancellations;
    }

    /**
     * @param Collection|CancelOrder[]|null $OrderCancellations
     * @return Order
     */
    public function setOrderCancellations($OrderCancellations)
    {
        $this->OrderCancellations = $OrderCancellations;

        return $this;
    }

    /**
     * @return Collection|ConfirmOrder[]|null
     */
    public function getOrderConfirmations()
    {
        return $this->OrderConfirmations;
    }

    /**
     * @param Collection|ConfirmOrder[]|null $OrderConfirmations
     * @return Order
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
     * @return Order
     */
    public function setTransactionId(?int $TransactionId): Order
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
     * @return Order
     */
    public function setOrderId(?int $OrderId): Order
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
     * @return Order
     */
    public function setOrderExpressId(?string $OrderExpressId): Order
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
     * @return Order
     */
    public function setCarrierName(?string $CarrierName): Order
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
     * @return Order
     */
    public function setCarrierCode(?string $CarrierCode): Order
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
     * @return Order
     */
    public function setCarrierINN(?string $CarrierINN): Order
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
     * @return Order
     */
    public function setOrderDateTime(?DateTime $OrderDateTime): Order
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
     * @return Order
     */
    public function setDepartureTrainNumber(?string $DepartureTrainNumber): Order
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
     * @return Order
     */
    public function setDepartureDateTime(?DateTime $DepartureDateTime): Order
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
     * @return Order
     */
    public function setDepartureStationName(?string $DepartureStationName): Order
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
     * @return Order
     */
    public function setDepartureStationCode(?string $DepartureStationCode): Order
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
     * @return Order
     */
    public function setArrivalStationName(?string $ArrivalStationName): Order
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
     * @return Order
     */
    public function setArrivalStationCode(?string $ArrivalStationCode): Order
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
     * @return Order
     */
    public function setCarNumber(?string $CarNumber): Order
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
     * @return Order
     */
    public function setCarOwner(?string $CarOwner): Order
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
     * @return Order
     */
    public function setCarType(?int $CarType): Order
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
     * @return Order
     */
    public function setServiceClass(?string $ServiceClass): Order
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
     * @return Order
     */
    public function setCarCarrierName(?string $CarCarrierName): Order
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
     * @return Order
     */
    public function setPaymentType(?int $PaymentType): Order
    {
        $this->PaymentType = $PaymentType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentOrderPayerCode(): ?string
    {
        return $this->PaymentOrderPayerCode;
    }

    /**
     * @param string|null $PaymentOrderPayerCode
     * @return Order
     */
    public function setPaymentOrderPayerCode(?string $PaymentOrderPayerCode): Order
    {
        $this->PaymentOrderPayerCode = $PaymentOrderPayerCode;

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
     * @return Order
     */
    public function setTimeDescription(?string $TimeDescription): Order
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
     * @return Order
     */
    public function setSignR0(?string $SignR0): Order
    {
        $this->SignR0 = $SignR0;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCarGender(): ?int
    {
        return $this->CarGender;
    }

    /**
     * @param int|null $CarGender
     * @return Order
     */
    public function setCarGender(?int $CarGender): Order
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
     * @return Order
     */
    public function setArrivalTrainNumber(?string $ArrivalTrainNumber): Order
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
     * @return Order
     */
    public function setArrivalDateTime(?DateTime $ArrivalDateTime): Order
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
     * @return Order
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
     * @return Order
     */
    public function setTerminalInfo(?TerminalInfo $TerminalInfo): Order
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
     * @return Order
     */
    public function setPayerInfo(?PayerInfo $PayerInfo): Order
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
     * @return Order
     */
    public function setIsWithoutBedding(?bool $IsWithoutBedding): Order
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
     * @return Order
     */
    public function setRoadCode(?string $RoadCode): Order
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
     * @return Order
     */
    public function setBookingInfo(?BookingInfo $BookingInfo): Order
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
     * @return Order
     */
    public function setTransportCommunicationType(?int $TransportCommunicationType): Order
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
     * @return Order
     */
    public function setTerminalIdentity(?string $TerminalIdentity): Order
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
     * @return Order
     */
    public function setFKSNumber(?string $FKSNumber): Order
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
     * @return Order
     */
    public function setOrderNumberInSystem(?string $OrderNumberInSystem): Order
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
     * @return Order
     */
    public function setGroupMembersCount(?int $GroupMembersCount): Order
    {
        $this->GroupMembersCount = $GroupMembersCount;

        return $this;
    }

    /**
     * @return InvalidOrder|null
     */
    public function getInvalidOrder(): ?InvalidOrder
    {
        return $this->InvalidOrder;
    }

    /**
     * @param InvalidOrder|null $InvalidOrder
     * @return Order
     */
    public function setInvalidOrder(?InvalidOrder $InvalidOrder): Order
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
     * @return Order
     */
    public function setAllOrderTicketsLink(?bool $AllOrderTicketsLink): Order
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
     * @return Order
     */
    public function setDepartureAndArrivalTimeInfo(?string $DepartureAndArrivalTimeInfo): Order
    {
        $this->DepartureAndArrivalTimeInfo = $DepartureAndArrivalTimeInfo;

        return $this;
    }
}
