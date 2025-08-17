<?php


namespace App\ViewModels\Sale\Order;


use App\Models\SaleRailwayStation;
use \DateTime;

class FilterOrderForm
{
    /**
     * @var string | null
     */
    protected $orderNumber = '';
    /**
     * @var string | null
     */
    protected $ticketNumber = '';
    /**
     * @var string | null
     */
    protected $status = '';
    /**
     * @var string | null
     */
    protected $iin = '';
    /**
     * @var string | null
     */
    protected $documentNumber = '';
    /**
     * @var string | null
     */
    protected $passengerFirstName = '';
    /**
     * @var string | null
     */
    protected $passengerName = '';
    /**
     * @var DateTime | null
     */
    protected $orderDateFrom = '';
    /**
     * @var DateTime | null
     */
    protected $orderDateTo = '';
    /**
     * @var DateTime | null
     */
    protected $departureDateFrom = '';
    /**
     * @var DateTime | null
     */
    protected $departureDateTo = '';
    /**
     * @var string | null
     */
    protected $userName = '';

    /**
     * @var string | null
     */
    protected $departureStationCode = '';
    /**
     * @var string | null
     */
    protected $arrivalStationCode = '';

    /**
     * @var SaleRailwayStation  | null
     */
    protected $departureStation = null;

    /**
     * @var SaleRailwayStation  | null
     */
    protected $arrivalStation = null;

    /**
     * @var int  | null
     */
    protected $agentId = null;

    /**
     * @var array  | null
     */
    protected $dataTypes = [];


    public function getDepartureStationName(){
        return $this->departureStation != null ? $this->departureStation->station_name_full : "";
    }

    public function getArrivalStationName(){
        return $this->arrivalStation != null ? $this->arrivalStation->station_name_full : "";
    }

    /**
     * @return string|null
     */
    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    /**
     * @param string|null $orderNumber
     */
    public function setOrderNumber(?string $orderNumber): void
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return string|null
     */
    public function getTicketNumber(): ?string
    {
        return $this->ticketNumber;
    }

    /**
     * @param string|null $ticketNumber
     */
    public function setTicketNumber(?string $ticketNumber): void
    {
        $this->ticketNumber = $ticketNumber;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getIin(): ?string
    {
        return $this->iin;
    }

    /**
     * @param string|null $iin
     */
    public function setIin(?string $iin): void
    {
        $this->iin = $iin;
    }

    /**
     * @return string|null
     */
    public function getDocumentNumber(): ?string
    {
        return $this->documentNumber;
    }

    /**
     * @param string|null $documentNumber
     */
    public function setDocumentNumber(?string $documentNumber): void
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * @return string|null
     */
    public function getPassengerFirstName(): ?string
    {
        return $this->passengerFirstName;
    }

    /**
     * @param string|null $passengerFirstName
     */
    public function setPassengerFirstName(?string $passengerFirstName): void
    {
        $this->passengerFirstName = $passengerFirstName;
    }

    /**
     * @return string|null
     */
    public function getPassengerName(): ?string
    {
        return $this->passengerName;
    }

    /**
     * @param string|null $passengerName
     */
    public function setPassengerName(?string $passengerName): void
    {
        $this->passengerName = $passengerName;
    }

    /**
     * @return DateTime|null
     */
    public function getOrderDateFrom()
    {
        return $this->orderDateFrom;
    }

    /**
     * @param DateTime|null $orderDateFrom
     */
    public function setOrderDateFrom($orderDateFrom): void
    {
        $this->orderDateFrom = $orderDateFrom;
    }

    /**
     * @return DateTime|null
     */
    public function getOrderDateTo()
    {
        return $this->orderDateTo;
    }

    /**
     * @param DateTime|null $orderDateTo
     */
    public function setOrderDateTo($orderDateTo): void
    {
        $this->orderDateTo = $orderDateTo;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureDateFrom()
    {
        return $this->departureDateFrom;
    }

    /**
     * @param DateTime|null $departureDateFrom
     */
    public function setDepartureDateFrom($departureDateFrom): void
    {
        $this->departureDateFrom = $departureDateFrom;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureDateTo()
    {
        return $this->departureDateTo;
    }

    /**
     * @param DateTime|null $departureDateTo
     */
    public function setDepartureDateTo($departureDateTo): void
    {
        $this->departureDateTo = $departureDateTo;
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string|null $userName
     */
    public function setUserName(?string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string|null
     */
    public function getDepartureStationCode(): ?string
    {
        return $this->departureStationCode;
    }

    /**
     * @param string|null $departureStationCode
     */
    public function setDepartureStationCode(?string $departureStationCode): void
    {
        $this->departureStationCode = $departureStationCode;
    }

    /**
     * @return string|null
     */
    public function getArrivalStationCode(): ?string
    {
        return $this->arrivalStationCode;
    }

    /**
     * @param string|null $arrivalStationCode
     */
    public function setArrivalStationCode(?string $arrivalStationCode): void
    {
        $this->arrivalStationCode = $arrivalStationCode;
    }

    /**
     * @return SaleRailwayStation|null
     */
    public function getDepartureStation(): ?SaleRailwayStation
    {
        return $this->departureStation;
    }

    /**
     * @param SaleRailwayStation|null $departureStation
     */
    public function setDepartureStation(?SaleRailwayStation $departureStation): void
    {
        $this->departureStation = $departureStation;
    }

    /**
     * @return SaleRailwayStation|null
     */
    public function getArrivalStation(): ?SaleRailwayStation
    {
        return $this->arrivalStation;
    }

    /**
     * @param SaleRailwayStation|null $arrivalStation
     */
    public function setArrivalStation(?SaleRailwayStation $arrivalStation): void
    {
        $this->arrivalStation = $arrivalStation;
    }

    /**
     * @return int|null
     */
    public function getAgentId(): ?int
    {
        return $this->agentId;
    }

    /**
     * @param int|null $agentId
     */
    public function setAgentId(?int $agentId): void
    {
        $this->agentId = $agentId;
    }

    /**
     * @return array|null
     */
    public function getDataTypes(): ?array
    {
        return $this->dataTypes;
    }

    /**
     * @param array|null $dataTypes
     */
    public function setDataTypes(?array $dataTypes): void
    {
        $this->dataTypes = $dataTypes;
    }
}
