<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 27.02.19
 * Time: 13:20
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Board;


use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class BoardPassResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Board
 */
class BoardPass
{
    /**
     * @JMS\SerializedName("TerminalId")
     * @JMS\Type("int")
     *
     * @var null|int $TerminalId
     */
    protected $TerminalId;
    /**
     * @JMS\SerializedName("ConductorUserId")
     * @JMS\Type("int")
     *
     * @var null|int $ConductorUserId
     */
    protected $ConductorUserId;
    /**
     * @JMS\SerializedName("TicketExpressId")
     * @JMS\Type("string")
     *
     * @var null|string $TicketExpressId
     */
    protected $TicketExpressId;
    /**
     * @JMS\SerializedName("PassengerName")
     * @JMS\Type("string")
     *
     * @var null|string $PassengerName
     */
    protected $PassengerName;
    /**
     * @JMS\SerializedName("PassengerDocument")
     * @JMS\Type("string")
     *
     * @var null|string $PassengerDocument
     */
    protected $PassengerDocument;
    /**
     * @JMS\SerializedName("DepartureStationName")
     * @JMS\Type("string")
     *
     * @var null|string $DepartureStationName
     */
    protected $DepartureStationName;
    /**
     * @JMS\SerializedName("ArrivalStationName")
     * @JMS\Type("string")
     *
     * @var null|string $ArrivalStationName
     */
    protected $ArrivalStationName;
    /**
     * @JMS\SerializedName("DepartureDate")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     *
     * @var null|DateTime $DepartureDate
     */
    protected $DepartureDate;
    /**
     * @JMS\SerializedName("BoardingDate")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     *
     * @var null|DateTime $BoardingDate
     */
    protected $BoardingDate;
    /**
     * @JMS\SerializedName("BoardingStationName")
     * @JMS\Type("string")
     *
     * @var null|string $BoardingStationName
     */
    protected $BoardingStationName;
    /**
     * @JMS\SerializedName("TrainNumber")
     * @JMS\Type("string")
     *
     * @var null|string $TrainNumber
     */
    protected $TrainNumber;
    /**
     * @JMS\SerializedName("CarNumber")
     * @JMS\Type("string")
     *
     * @var null|string $CarNumber
     */
    protected $CarNumber;
    /**
     * @JMS\SerializedName("CarType")
     * @JMS\Type("string")
     *
     * @var null|string $CarType
     */
    protected $CarType;
    /**
     * @JMS\SerializedName("Seat")
     * @JMS\Type("string")
     *
     * @var null|string $Seat
     */
    protected $Seat;
    /**
     * @JMS\SerializedName("PreferenceDocument")
     * @JMS\Type("string")
     *
     * @var null|string $PreferenceDocument
     */
    protected $PreferenceDocument;
    /**
     * @JMS\SerializedName("Tariff")
     * @JMS\Type("float")
     * @var null|float $Tariff
     */
    protected $Tariff;

    /**
     * @return int|null
     */
    public function getTerminalId(): ?int
    {
        return $this->TerminalId;
    }

    /**
     * @param int|null $TerminalId
     * @return BoardPass
     */
    public function setTerminalId(?int $TerminalId): BoardPass
    {
        $this->TerminalId = $TerminalId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getConductorUserId(): ?int
    {
        return $this->ConductorUserId;
    }

    /**
     * @param int|null $ConductorUserId
     * @return BoardPass
     */
    public function setConductorUserId(?int $ConductorUserId): BoardPass
    {
        $this->ConductorUserId = $ConductorUserId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTicketExpressId(): ?string
    {
        return $this->TicketExpressId;
    }

    /**
     * @param string|null $TicketExpressId
     * @return BoardPass
     */
    public function setTicketExpressId(?string $TicketExpressId): BoardPass
    {
        $this->TicketExpressId = $TicketExpressId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassengerName(): ?string
    {
        return $this->PassengerName;
    }

    /**
     * @param string|null $PassengerName
     * @return BoardPass
     */
    public function setPassengerName(?string $PassengerName): BoardPass
    {
        $this->PassengerName = $PassengerName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassengerDocument(): ?string
    {
        return $this->PassengerDocument;
    }

    /**
     * @param string|null $PassengerDocument
     * @return BoardPass
     */
    public function setPassengerDocument(?string $PassengerDocument): BoardPass
    {
        $this->PassengerDocument = $PassengerDocument;
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
     * @return BoardPass
     */
    public function setDepartureStationName(?string $DepartureStationName): BoardPass
    {
        $this->DepartureStationName = $DepartureStationName;
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
     * @return BoardPass
     */
    public function setArrivalStationName(?string $ArrivalStationName): BoardPass
    {
        $this->ArrivalStationName = $ArrivalStationName;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureDate(): ?DateTime
    {
        return $this->DepartureDate;
    }

    /**
     * @param DateTime|null $DepartureDate
     * @return BoardPass
     */
    public function setDepartureDate(?DateTime $DepartureDate): BoardPass
    {
        $this->DepartureDate = $DepartureDate;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getBoardingDate(): ?DateTime
    {
        return $this->BoardingDate;
    }

    /**
     * @param DateTime|null $BoardingDate
     * @return BoardPass
     */
    public function setBoardingDate(?DateTime $BoardingDate): BoardPass
    {
        $this->BoardingDate = $BoardingDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBoardingStationName(): ?string
    {
        return $this->BoardingStationName;
    }

    /**
     * @param string|null $BoardingStationName
     * @return BoardPass
     */
    public function setBoardingStationName(?string $BoardingStationName): BoardPass
    {
        $this->BoardingStationName = $BoardingStationName;
        return $this;
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
     * @return BoardPass
     */
    public function setTrainNumber(?string $TrainNumber): BoardPass
    {
        $this->TrainNumber = $TrainNumber;
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
     * @return BoardPass
     */
    public function setCarNumber(?string $CarNumber): BoardPass
    {
        $this->CarNumber = $CarNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarType(): ?string
    {
        return $this->CarType;
    }

    /**
     * @param string|null $CarType
     * @return BoardPass
     */
    public function setCarType(?string $CarType): BoardPass
    {
        $this->CarType = $CarType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSeat(): ?string
    {
        return $this->Seat;
    }

    /**
     * @param string|null $Seat
     * @return BoardPass
     */
    public function setSeat(?string $Seat): BoardPass
    {
        $this->Seat = $Seat;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPreferenceDocument(): ?string
    {
        return $this->PreferenceDocument;
    }

    /**
     * @param string|null $PreferenceDocument
     * @return BoardPass
     */
    public function setPreferenceDocument(?string $PreferenceDocument): BoardPass
    {
        $this->PreferenceDocument = $PreferenceDocument;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariff(): ?float
    {
        return $this->Tariff;
    }

    /**
     * @param float|null $Tariff
     */
    public function setTariff(?float $Tariff): void
    {
        $this->Tariff = $Tariff;
    }
}
