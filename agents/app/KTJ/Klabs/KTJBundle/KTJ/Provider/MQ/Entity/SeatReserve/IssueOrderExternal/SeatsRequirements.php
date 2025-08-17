<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;
use JMS\Serializer\Annotation as JMS;


class SeatsRequirements
{
    /**
     * @JMS\SerializedName("BottomSeatsCount")
     * @JMS\Type("int")
     * @var null|int $BottomSeatsCount
     */
    protected $BottomSeatsCount;
    /**
     * @JMS\SerializedName("TopSeatsCount")
     * @JMS\Type("int")
     * @var null|int $TopSeatsCount
     */
    protected $TopSeatsCount;
    /**
     * @JMS\SerializedName("SeatsCompartment")
     * @JMS\Type("bool")
     * @var null|bool $SeatsCompartment
     */
    protected $SeatsCompartment;
    /**
     * @JMS\SerializedName("Facilities")
     * @JMS\Type("bool")
     * @var null|bool $Facilities
     */
    protected $Facilities=false;
    /**
     * @JMS\SerializedName("InvalidPersonSeat")
     * @JMS\Type("bool")
     * @var null|bool $InvalidPersonSeat
     */
    protected $InvalidPersonSeat=false;
    /**
     * @JMS\SerializedName("IsRentCar")
     * @JMS\Type("bool")
     * @var null|bool $IsRentCar
     */
    protected $IsRentCar=false;
    /**
     * @JMS\SerializedName("CarCompartmentGender")
     * @JMS\Type("bool")
     * @var null|bool $CarCompartmentGender
     */
    protected $CarCompartmentGender;
    /**
     * @JMS\SerializedName("WithoutBedding")
     * @JMS\Type("bool")
     * @var null|bool $WithoutBedding
     */
    protected $WithoutBedding = false;

    /**
     * @return int|null
     */
    public function getBottomSeatsCount(): ?int
    {
        return $this->BottomSeatsCount;
    }

    /**
     * @param int|null $BottomSeatsCount
     */
    public function setBottomSeatsCount(?int $BottomSeatsCount): void
    {
        $this->BottomSeatsCount = $BottomSeatsCount;
    }

    /**
     * @return int|null
     */
    public function getTopSeatsCount(): ?int
    {
        return $this->TopSeatsCount;
    }

    /**
     * @param int|null $TopSeatsCount
     */
    public function setTopSeatsCount(?int $TopSeatsCount): void
    {
        $this->TopSeatsCount = $TopSeatsCount;
    }

    /**
     * @return bool|null
     */
    public function getSeatsCompartment(): ?bool
    {
        return $this->SeatsCompartment;
    }

    /**
     * @param bool|null $SeatsCompartment
     */
    public function setSeatsCompartment(?bool $SeatsCompartment): void
    {
        $this->SeatsCompartment = $SeatsCompartment;
    }

    /**
     * @return bool|null
     */
    public function getFacilities(): ?bool
    {
        return $this->Facilities;
    }

    /**
     * @param bool|null $Facilities
     */
    public function setFacilities(?bool $Facilities): void
    {
        $this->Facilities = $Facilities;
    }

    /**
     * @return bool|null
     */
    public function getInvalidPersonSeat(): ?bool
    {
        return $this->InvalidPersonSeat;
    }

    /**
     * @param bool|null $InvalidPersonSeat
     */
    public function setInvalidPersonSeat(?bool $InvalidPersonSeat): void
    {
        $this->InvalidPersonSeat = $InvalidPersonSeat;
    }

    /**
     * @return bool|null
     */
    public function getIsRentCar(): ?bool
    {
        return $this->IsRentCar;
    }

    /**
     * @param bool|null $IsRentCar
     */
    public function setIsRentCar(?bool $IsRentCar): void
    {
        $this->IsRentCar = $IsRentCar;
    }

    /**
     * @return bool|null
     */
    public function getCarCompartmentGender(): ?bool
    {
        return $this->CarCompartmentGender;
    }

    /**
     * @param bool|null $CarCompartmentGender
     */
    public function setCarCompartmentGender(?bool $CarCompartmentGender): void
    {
        $this->CarCompartmentGender = $CarCompartmentGender;
    }

    /**
     * @return bool|null
     */
    public function getWithoutBedding(): ?bool
    {
        return $this->WithoutBedding;
    }

    /**
     * @param bool|null $WithoutBedding
     */
    public function setWithoutBedding(?bool $WithoutBedding): void
    {
        $this->WithoutBedding = $WithoutBedding;
    }
}
