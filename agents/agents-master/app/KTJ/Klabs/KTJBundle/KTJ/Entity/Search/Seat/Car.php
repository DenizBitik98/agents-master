<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.05.2018
 * Time: 1:06
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\ElRegPossible;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Seat;

/**
 * Class Car
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class Car
{
    const SPECIAL_CAR_DETAIL_TALGO = 1;
    const SPECIAL_CAR_DETAIL_THREE_FLOOR_ECONOMIC = 2;
    const SPECIAL_CAR_DETAIL_TALGO_SEDENTARY_36_SEATS = 10;
    const SPECIAL_CAR_TALGO_SEDENTARY_25_SEATS = 11;
    const SPECIAL_CAR_TALGO_TOURIST_18_SEATS = 12;
    const SPECIAL_CAR_TALGO_TOURIST_20_SEATS = 13;
    const SPECIAL_CAR_TALGO_BUSINESS = 14;
    const SPECIAL_CAR_TALGO_GRANT_LUX = 15;
    const SPECIAL_CAR_TALGO_GRANT_LUX_PMR = 16;

    const TYPE_COMMON = 'Общий';
    const TYPE_SEDENTARY = 'Сидячий';
    const TYPE_BERTH = 'Плацкартный';
    const TYPE_COUPE = 'Купе';
    const TYPE_SOFT = 'Мягкий';
    const TYPE_LUX = 'Люкс';

    const TYPE_COMMON_ID = 1;
    const TYPE_SEDENTARY_ID = 2;
    const TYPE_BERTH_ID = 3;
    const TYPE_COUPE_ID = 4;
    const TYPE_SOFT_ID = 5;
    const TYPE_LUX_ID = 6;

    const CLASS_SERVICE_TYPE_1E = '1Э';
    const CLASS_SERVICE_TYPE_1B = '1Б';
    const CLASS_SERVICE_TYPE_2B = '2Б';
    const CLASS_SERVICE_TYPE_2D = '2Д';
    const CLASS_SERVICE_TYPE_2C = '2С';
    const CLASS_SERVICE_TYPE_2K = '2К';
    const CLASS_SERVICE_TYPE_2U = '2У';
    const CLASS_SERVICE_TYPE_2L = '2Л';
    const CLASS_SERVICE_TYPE_2N = '2Н';
    const CLASS_SERVICE_TYPE_3P = '3П';
    const CLASS_SERVICE_TYPE_3D = '3Д';
    const CLASS_SERVICE_TYPE_3L = '3Л';
    const CLASS_SERVICE_TYPE_3M = '3М';
    const CLASS_SERVICE_TYPE_3Y = '3Я';
    const CLASS_SERVICE_TYPE_3O = '3О';

    const CAR_DETAIL_TALGO_SEDENTARY_36_SEATS_BY_CAR_TYPE = '97С';
    const CAR_TALGO_SEDENTARY_25_SEATS_BY_CAR_TYPE = '106С';
    const CAR_TALGO_TOURIST_18_SEATS_BY_CAR_TYPE = '71К';
    const CAR_TALGO_TOURIST_20_SEATS_BY_CAR_TYPE = '85К';
    const CAR_TALGO_BUSINESS_L31_BY_CAR_TYPE = '31Л';
    const CAR_TALGO_BUSINESS_L41_BY_CAR_TYPE = '41Л';
    const CAR_TALGO_BUSINESS_L27_BY_CAR_TYPE = '27Л';
    const CAR_TALGO_BUSINESS_L37_BY_CAR_TYPE = '37Л';
    const CAR_TALGO_GRANT_LUX_PMR_BY_CAR_TYPE  = '72К';

    /**
     * @JMS\SerializedName("Number")
     * @JMS\Type("string")
     * @var null|string $Number
     */
    protected $Number;
    /**
     * @JMS\SerializedName("ElRegPossible")
     * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\ElRegPossible")
     * @var null|ElRegPossible $ElRegPossible
     */
    protected $ElRegPossible;
    /**
     * @JMS\SerializedName("Station")
     * @JMS\Type("string")
     * @var null|string $Station
     */
    protected $Station;
    /**
     * @JMS\SerializedName("NonSmoking")
     * @JMS\Type("bool")
     * @var null|bool $NonSmoking
     */
    protected $NonSmoking;
    /**
     * @JMS\SerializedName("DesignCar")
     * @JMS\Type("ArrayCollection")
     * @var null|ArrayCollection $DesignCar
     */
    protected $DesignCar;
    /**
     * @JMS\SerializedName("Seats")
     * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Seat")
     * @var null|Seat $Seats
     */
    protected $Seats;
    /**
     * @JMS\SerializedName("SeatsSexDto")
     * @JMS\Type("string")
     * @var null|string $SeatsSexDto
     */
    protected $SeatsSexDto;
    /**
     * @JMS\SerializedName("TypePlaces")
     * @JMS\Type("string")
     * @var null|string $TypePlaces
     */
    protected $TypePlaces;
    /**
     * @JMS\SerializedName("Places")
     * @JMS\Type("ArrayCollection")
     * @var null|Collection $Places
     */
    protected $Places;
    /**
     * @JMS\SerializedName("SpecialCarDetails")
     * @JMS\Type("ArrayCollection")
     * @var null|Collection $SpecialCarDetails
     */
    protected $SpecialCarDetails;
    /**
     * @JMS\SerializedName("BoardingForm")
     * @JMS\Type("integer")
     * @var null|int $BoardingForm
     */
    protected $BoardingForm;
    /**
     * @JMS\SerializedName("SubType")
     * @JMS\Type("string")
     * @var null|string $SubType
     */
    protected $SubType;
    /**
     * @JMS\SerializedName("AirConditionedCar")
     * @JMS\Type("bool")
     * @var null|bool $AirConditionedCar
     */
    protected $AirConditionedCar;
    /**
     * @JMS\SerializedName("EcoFriendlyToilets")
     * @JMS\Type("bool")
     * @var null|bool $EcoFriendlyToilets
     */
    protected $EcoFriendlyToilets;

    /**
     * @return null|string
     */
    public function getNumber(): ?string
    {
        return $this->Number;
    }

    /**
     * @param null|string $Number
     *
     * @return Car
     */
    public function setNumber(?string $Number): Car
    {
        $this->Number = $Number;

        return $this;
    }

    /**
     * @return ElRegPossible|null
     */
    public function getElRegPossible(): ?ElRegPossible
    {
        return $this->ElRegPossible;
    }

    /**
     * @param ElRegPossible|null $ElRegPossible
     *
     * @return Car
     */
    public function setElRegPossible(?ElRegPossible $ElRegPossible): Car
    {
        $this->ElRegPossible = $ElRegPossible;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getStation(): ?string
    {
        return $this->Station;
    }

    /**
     * @param null|string $Station
     *
     * @return Car
     */
    public function setStation(?string $Station): Car
    {
        $this->Station = $Station;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNonSmoking(): ?bool
    {
        return $this->NonSmoking;
    }

    /**
     * @param bool|null $NonSmoking
     *
     * @return Car
     */
    public function setNonSmoking(?bool $NonSmoking): Car
    {
        $this->NonSmoking = $NonSmoking;

        return $this;
    }

    /**
     * @return ArrayCollection|null
     */
    public function getDesignCar(): ?ArrayCollection
    {
        return $this->DesignCar;
    }

    /**
     * @param ArrayCollection|null $DesignCar
     *
     * @return Car
     */
    public function setDesignCar(?ArrayCollection $DesignCar): Car
    {
        $this->DesignCar = $DesignCar;

        return $this;
    }

    /**
     * @return Seat|null
     */
    public function getSeats(): ?Seat
    {
        return $this->Seats;
    }

    /**
     * @param Seat|null $Seats
     *
     * @return Car
     */
    public function setSeats(?Seat $Seats): Car
    {
        $this->Seats = $Seats;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSeatsSexDto(): ?string
    {
        return $this->SeatsSexDto;
    }

    /**
     * @param null|string $SeatsSexDto
     *
     * @return Car
     */
    public function setSeatsSexDto(?string $SeatsSexDto): Car
    {
        $this->SeatsSexDto = $SeatsSexDto;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTypePlaces(): ?string
    {
        return $this->TypePlaces;
    }

    /**
     * @param null|string $TypePlaces
     *
     * @return Car
     */
    public function setTypePlaces(?string $TypePlaces): Car
    {
        $this->TypePlaces = $TypePlaces;

        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getPlaces(): ?Collection
    {
        return $this->Places;
    }

    /**
     * @param Collection|null $Places
     *
     * @return Car
     */
    public function setPlaces(?Collection $Places): Car
    {
        $this->Places = $Places;

        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getSpecialCarDetails(): ?Collection
    {
        return $this->SpecialCarDetails;
    }

    /**
     * @param Collection|null $SpecialCarDetails
     *
     * @return Car
     */
    public function setSpecialCarDetails(?Collection $SpecialCarDetails): Car
    {
        $this->SpecialCarDetails = $SpecialCarDetails;

        return $this;
    }

    /**
     * Whether the car is talgo
     * @return bool
     */
    public function isTalgo(): bool
    {
        return $this->SpecialCarDetails->exists(function ($key, $element) {
            return static::SPECIAL_CAR_DETAIL_TALGO === $element;
        });
    }

    /**
     * Whether the car is three floor economic
     * @return bool
     */
    public function isThreeFloorEconomic(): bool
    {
        return $this->SpecialCarDetails->exists(function ($key, $element) {
            return static::SPECIAL_CAR_DETAIL_THREE_FLOOR_ECONOMIC === $element;
        });
    }

    /**
     * @return int|null
     */
    public function getBoardingForm(): ?int
    {
        return $this->BoardingForm;
    }

    /**
     * @param int|null $BoardingForm
     *
     * @return Car
     */
    public function setBoardingForm(?int $BoardingForm): Car
    {
        $this->BoardingForm = $BoardingForm;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubType(): ?string
    {
        return $this->SubType;
    }

    /**
     * @param string|null $SubType
     * @return $this
     */
    public function setSubType(?string $SubType): Car
    {
        $this->SubType = $SubType;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAirConditionedCar(): ?bool
    {
        return $this->AirConditionedCar;
    }

    /**
     * @param bool|null $AirConditionedCar
     * @return Car
     */
    public function setAirConditionedCar(?bool $AirConditionedCar): Car
    {
        $this->AirConditionedCar = $AirConditionedCar;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEcoFriendlyToilets(): ?bool
    {
        return $this->EcoFriendlyToilets;
    }

    /**
     * @param bool|null $EcoFriendlyToilets
     * @return Car
     */
    public function setEcoFriendlyToilets(?bool $EcoFriendlyToilets): Car
    {
        $this->EcoFriendlyToilets = $EcoFriendlyToilets;

        return $this;
    }

}
