<?php


namespace App\ViewModels\Sale\Railway\Train;

use App\Models\SaleRailwayStation;
use \DateTime;

class SearchModel
{
    /**
     * @var string | null
     */
    protected $departureStationCode = '';
    /**
     * @var string | null
     */
    protected $arrivalStationCode = '';
    /**
     * @var DateTime | null
     */
    protected $departureDate = null;
    /**
     * @var DateTime | null
     */
    protected $backwardDate = null;
    /**
     * @var array | null
     */
    protected $carType = [];
    /**
     * @var array | null
     */
    protected $dayShift = [];

    /**
     * @var SaleRailwayStation  | null
     */
    protected $departureStation = null;

    /**
     * @var SaleRailwayStation  | null
     */
    protected $arrivalStation = null;

    public function getDepartureStationName(){
        return $this->departureStation != null ? $this->departureStation->station_name_full : "";
    }

    public function getArrivalStationName(){
        return $this->arrivalStation != null ? $this->arrivalStation->station_name_full : "";
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
     * @return DateTime|null
     */
    public function getDepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * @param DateTime|null $departureDate
     */
    public function setDepartureDate($departureDate): void
    {
        $this->departureDate = $departureDate;
    }

    /**
     * @return DateTime|null
     */
    public function getBackwardDate()
    {
        return $this->backwardDate;
    }

    /**
     * @param DateTime|null $backwardDate
     */
    public function setBackwardDate($backwardDate): void
    {
        $this->backwardDate = $backwardDate;
    }

    /**
     * @return array|null
     */
    public function getCarType(): ?array
    {
        return $this->carType;
    }

    /**
     * @param array|null $carType
     */
    public function setCarType(?array $carType): void
    {
        $this->carType = $carType;
    }

    /**
     * @return array|null
     */
    public function getDayShift(): ?array
    {
        return $this->dayShift;
    }

    /**
     * @param array|null $dayShift
     */
    public function setDayShift(?array $dayShift): void
    {
        $this->dayShift = $dayShift;
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
}
