<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking;

use DateTime;
use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking
 */
class Response implements IResponse
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
     * @var null|InvalidOrder $InvalidOrder
     */
    protected $InvalidOrder;
    /**
     * @var null|bool $AllOrderTicketsLink
     */
    protected $AllOrderTicketsLink;

    /**
     * @return Collection|OrderCancellation[]|null
     */
    public function getOrderCancellations()
    {
        return $this->OrderCancellations;
    }

    /**
     * @param Collection|OrderCancellation[]|null $OrderCancellations
     * @return Response
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
     * @return Response
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
     * @return Response
     */
    public function setTransactionId(?int $TransactionId): Response
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
     * @return Response
     */
    public function setOrderId(?int $OrderId): Response
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
     * @return Response
     */
    public function setOrderExpressId(?string $OrderExpressId): Response
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
     * @return Response
     */
    public function setCarrierName(?string $CarrierName): Response
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
     * @return Response
     */
    public function setCarrierCode(?string $CarrierCode): Response
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
     * @return Response
     */
    public function setCarrierINN(?string $CarrierINN): Response
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
     * @return Response
     */
    public function setOrderDateTime(?DateTime $OrderDateTime): Response
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
     * @return Response
     */
    public function setDepartureTrainNumber(?string $DepartureTrainNumber): Response
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
     * @return Response
     */
    public function setDepartureDateTime(?DateTime $DepartureDateTime): Response
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
     * @return Response
     */
    public function setDepartureStationName(?string $DepartureStationName): Response
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
     * @return Response
     */
    public function setDepartureStationCode(?string $DepartureStationCode): Response
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
     * @return Response
     */
    public function setArrivalStationName(?string $ArrivalStationName): Response
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
     * @return Response
     */
    public function setArrivalStationCode(?string $ArrivalStationCode): Response
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
     * @return Response
     */
    public function setCarNumber(?string $CarNumber): Response
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
     * @return Response
     */
    public function setCarOwner(?string $CarOwner): Response
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
     * @return Response
     */
    public function setCarType(?int $CarType): Response
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
     * @return Response
     */
    public function setServiceClass(?string $ServiceClass): Response
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
     * @return Response
     */
    public function setCarCarrierName(?string $CarCarrierName): Response
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
     * @return Response
     */
    public function setPaymentType(?int $PaymentType): Response
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
     * @return Response
     */
    public function setTimeDescription(?string $TimeDescription): Response
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
     * @return Response
     */
    public function setSignR0(?string $SignR0): Response
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
     * @return Response
     */
    public function setCarGender(?string $CarGender): Response
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
     * @return Response
     */
    public function setArrivalTrainNumber(?string $ArrivalTrainNumber): Response
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
     * @return Response
     */
    public function setArrivalDateTime(?DateTime $ArrivalDateTime): Response
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
     * @return Response
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
     * @return Response
     */
    public function setTerminalInfo(?TerminalInfo $TerminalInfo): Response
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
     * @return Response
     */
    public function setPayerInfo(?PayerInfo $PayerInfo): Response
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
     * @return Response
     */
    public function setIsWithoutBedding(?bool $IsWithoutBedding): Response
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
     * @return Response
     */
    public function setRoadCode(?string $RoadCode): Response
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
     * @return Response
     */
    public function setBookingInfo(?BookingInfo $BookingInfo): Response
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
     * @return Response
     */
    public function setTransportCommunicationType(?int $TransportCommunicationType): Response
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
     * @return Response
     */
    public function setTerminalIdentity(?string $TerminalIdentity): Response
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
     * @return Response
     */
    public function setFKSNumber(?string $FKSNumber): Response
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
     * @return Response
     */
    public function setOrderNumberInSystem(?string $OrderNumberInSystem): Response
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
     * @return Response
     */
    public function setGroupMembersCount(?int $GroupMembersCount): Response
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
     * @return Response
     */
    public function setInvalidOrder(?InvalidOrder $InvalidOrder): Response
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
     * @return Response
     */
    public function setAllOrderTicketsLink(?bool $AllOrderTicketsLink): Response
    {
        $this->AllOrderTicketsLink = $AllOrderTicketsLink;

        return $this;
    }
}
