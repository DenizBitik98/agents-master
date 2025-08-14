<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem;

/**
 * Class CarInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem
 */
class CarInfo
{
    /**
     * @var null|string $CarNumber
     */
    protected $CarNumber;
    /**
     * @var null|int $CarType
     */
    protected $CarType;
    /**
     * @var null|string $CarOwner
     */
    protected $CarOwner;
    /**
     * @var null|string $SignR0
     */
    protected $SignR0;
    /**
     * @var null|int $SeatsCount
     */
    protected $SeatsCount;
    /**
     * @var null|string $Seats
     */
    protected $Seats;

    /**
     * @return string|null
     */
    public function getCarNumber(): ?string
    {
        return $this->CarNumber;
    }

    /**
     * @param string|null $CarNumber
     * @return CarInfo
     */
    public function setCarNumber(?string $CarNumber): CarInfo
    {
        $this->CarNumber = $CarNumber;

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
     * @return CarInfo
     */
    public function setCarType(?int $CarType): CarInfo
    {
        $this->CarType = $CarType;

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
     * @return CarInfo
     */
    public function setCarOwner(?string $CarOwner): CarInfo
    {
        $this->CarOwner = $CarOwner;

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
     * @return CarInfo
     */
    public function setSignR0(?string $SignR0): CarInfo
    {
        $this->SignR0 = $SignR0;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSeatsCount(): ?int
    {
        return $this->SeatsCount;
    }

    /**
     * @param int|null $SeatsCount
     * @return CarInfo
     */
    public function setSeatsCount(?int $SeatsCount): CarInfo
    {
        $this->SeatsCount = $SeatsCount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSeats(): ?string
    {
        return $this->Seats;
    }

    /**
     * @param string|null $Seats
     * @return CarInfo
     */
    public function setSeats(?string $Seats): CarInfo
    {
        $this->Seats = $Seats;

        return $this;
    }
}
