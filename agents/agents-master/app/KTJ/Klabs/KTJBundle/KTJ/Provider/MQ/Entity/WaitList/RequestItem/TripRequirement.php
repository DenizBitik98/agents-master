<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class TripRequirement
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class TripRequirement
{
    /**
     * @var null|string $DepartureStationCode
     */
    protected $DepartureStationCode;
    /**
     * @var null|string $ArrivalStationCode
     */
    protected $ArrivalStationCode;
    /**
     * @var null|Period $DepartureDate
     */
    protected $DepartureDate;
    /**
     * @var null|string $TrainNumber
     */
    protected $TrainNumber;
    /**
     * @var null|int $CarType
     */
    protected $CarType;
    /**
     * @var null|string $ServiceClass
     */
    protected $ServiceClass;
    /**
     * Max ticket cost for one passenger. Not for all
     * @var null|float $MaxTariff
     */
    protected $MaxTariff;

    /**
     * @return string|null
     */
    public function getDepartureStationCode(): ?string
    {
        return $this->DepartureStationCode;
    }

    /**
     * @param string|null $DepartureStationCode
     * @return TripRequirement
     */
    public function setDepartureStationCode(?string $DepartureStationCode): TripRequirement
    {
        $this->DepartureStationCode = $DepartureStationCode;

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
     * @return TripRequirement
     */
    public function setArrivalStationCode(?string $ArrivalStationCode): TripRequirement
    {
        $this->ArrivalStationCode = $ArrivalStationCode;

        return $this;
    }

    /**
     * @return Period|null
     */
    public function getDepartureDate(): ?Period
    {
        return $this->DepartureDate;
    }

    /**
     * @param Period|null $DepartureDate
     * @return TripRequirement
     */
    public function setDepartureDate(?Period $DepartureDate): TripRequirement
    {
        $this->DepartureDate = $DepartureDate;

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
     * @return TripRequirement
     */
    public function setTrainNumber(?string $TrainNumber): TripRequirement
    {
        $this->TrainNumber = $TrainNumber;

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
     * @return TripRequirement
     */
    public function setCarType(?int $CarType): TripRequirement
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
     * @return TripRequirement
     */
    public function setServiceClass(?string $ServiceClass): TripRequirement
    {
        $this->ServiceClass = $ServiceClass;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMaxTariff(): ?float
    {
        return $this->MaxTariff;
    }

    /**
     * @param float|null $MaxTariff
     * @return TripRequirement
     */
    public function setMaxTariff(?float $MaxTariff): TripRequirement
    {
        $this->MaxTariff = $MaxTariff;

        return $this;
    }
}
