<?php


namespace App\ViewModels\Sale\Railway\Buy;

use \DateTime;

class BuyDirectionForm
{
    /**
     * @var null|string $train
     */
    protected $train;
    /**
     * @var null|bool $IsObligativeElReg
     */
    protected $isObligativeElReg = false;
    /**
     * @var null|null $carType
     */
    protected $carType;
    /**
     * @var null|string $carNumber
     */
    protected $carNumber;
    /**
     * @var null|string $carService
     */
    protected $carService;
    /**
     * @var null|string $departureStation
     */
    protected $departureStation;
    /**
     * @var null|string $arrivalStation
     */
    protected $arrivalStation;
    /**
     * @var null|DateTime $departureDatetime
     */
    protected $departureDatetime = null;
    /**
     * @var null|DateTime $arrivalDatetime
     */
    protected $arrivalDatetime = null;
    /**
     * @var null|bool $withoutBedding
     */
    protected $withoutBedding = false;
    protected $CreditCard = true;
    /**
     * @var null|array $seats
     */
    protected $seats = [];
    /**
     * @var null|string $upDownSlider
     */
    protected $upDownSlider;
    /**
     * @var null|int $seatsComp
     */
    protected $seatsComp;
    /**
     * @var null|string $timeInWay
     */
    protected $timeInWay;
    /**
     * @var null|string $addSigns
     */
    protected $addSigns;
    /**
     * @var null|string $parentDocumentExpressId
     */
    protected $parentDocumentExpressId;

    /**
     * @return string|null
     */
    public function getTrain(): ?string
    {
        return $this->train;
    }

    /**
     * @param string|null $train
     */
    public function setTrain(?string $train): void
    {
        $this->train = $train;
    }

    /**
     * @return bool|null
     */
    public function getIsObligativeElReg(): ?bool
    {
        return $this->isObligativeElReg;
    }

    /**
     * @param bool|null $isObligativeElReg
     */
    public function setIsObligativeElReg(?bool $isObligativeElReg): void
    {
        $this->isObligativeElReg = $isObligativeElReg;
    }

    /**
     * @return null
     */
    public function getCarType()
    {
        return $this->carType;
    }

    /**
     * @param null $carType
     */
    public function setCarType($carType): void
    {
        $this->carType = $carType;
    }

    /**
     * @return string|null
     */
    public function getCarNumber(): ?string
    {
        return $this->carNumber;
    }

    /**
     * @param string|null $carNumber
     */
    public function setCarNumber(?string $carNumber): void
    {
        $this->carNumber = $carNumber;
    }

    /**
     * @return string|null
     */
    public function getCarService(): ?string
    {
        return $this->carService;
    }

    /**
     * @param string|null $carService
     */
    public function setCarService(?string $carService): void
    {
        $this->carService = $carService;
    }

    /**
     * @return string|null
     */
    public function getDepartureStation(): ?string
    {
        return $this->departureStation;
    }

    /**
     * @param string|null $departureStation
     */
    public function setDepartureStation(?string $departureStation): void
    {
        $this->departureStation = $departureStation;
    }

    /**
     * @return string|null
     */
    public function getArrivalStation(): ?string
    {
        return $this->arrivalStation;
    }

    /**
     * @param string|null $arrivalStation
     */
    public function setArrivalStation(?string $arrivalStation): void
    {
        $this->arrivalStation = $arrivalStation;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureDatetime(): ?DateTime
    {
        return $this->departureDatetime;
    }

    /**
     * @param DateTime|null $departureDatetime
     */
    public function setDepartureDatetime(?DateTime $departureDatetime): void
    {
        $this->departureDatetime = $departureDatetime;
    }

    /**
     * @return DateTime|null
     */
    public function getArrivalDatetime(): ?DateTime
    {
        return $this->arrivalDatetime;
    }

    /**
     * @param DateTime|null $arrivalDatetime
     */
    public function setArrivalDatetime(?DateTime $arrivalDatetime): void
    {
        $this->arrivalDatetime = $arrivalDatetime;
    }

    /**
     * @return bool|null
     */
    public function getWithoutBedding(): ?bool
    {
        return $this->withoutBedding;
    }

    /**
     * @param bool|null $withoutBedding
     */
    public function setWithoutBedding(  ?bool $withoutBedding): void
    {
        $this->withoutBedding = $withoutBedding;
    }
	
    public function getCreditCard(): ?bool
    {
        return $this->CreditCard;
    }

    /**
     * @param bool|null $CreditCard
     */
    public function setCreditCard(  ?bool $CreditCard): void
    {
        $this->CreditCard = $CreditCard;
    }	

    /**
     * @return array|null
     */
    public function getSeats(): ?array
    {
        return $this->seats;
    }

    /**
     * @param array|null $seats
     */
    public function setSeats(?array $seats): void
    {
        $this->seats = $seats;
    }

    /**
     * @return string|null
     */
    public function getUpDownSlider(): ?string
    {
        return $this->upDownSlider;
    }

    /**
     * @param string|null $upDownSlider
     */
    public function setUpDownSlider(?string $upDownSlider): void
    {
        $this->upDownSlider = $upDownSlider;
    }

    /**
     * @return int|null
     */
    public function getSeatsComp(): ?int
    {
        return $this->seatsComp;
    }

    /**
     * @param int|null $seatsComp
     */
    public function setSeatsComp(?int $seatsComp): void
    {
        $this->seatsComp = $seatsComp;
    }

    /**
     * @return string|null
     */
    public function getTimeInWay(): ?string
    {
        return $this->timeInWay;
    }

    /**
     * @param string|null $timeInWay
     */
    public function setTimeInWay(?string $timeInWay): void
    {
        $this->timeInWay = $timeInWay;
    }

    /**
     * @return string|null
     */
    public function getAddSigns(): ?string
    {
        return $this->addSigns;
    }

    /**
     * @param string|null $addSigns
     */
    public function setAddSigns(?string $addSigns): void
    {
        $this->addSigns = $addSigns;
    }

    /**
     * @return string|null
     */
    public function getParentDocumentExpressId(): ?string
    {
        return $this->parentDocumentExpressId;
    }

    /**
     * @param string|null $parentDocumentExpressId
     */
    public function setParentDocumentExpressId(?string $parentDocumentExpressId): void
    {
        $this->parentDocumentExpressId = $parentDocumentExpressId;
    }
}
