<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 20:34
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Seat;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Tariff;

/**
 * Class Car
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Train
 */
class Car
{
    /**
     * @JMS\SerializedName("Type")
     * @JMS\Type("int")
     * @var null|int $Type
     */
    protected $Type;
    /**
     * @JMS\SerializedName("FreeSeats")
     * @JMS\Type("int")
     * @var null|int $FreeSeats
     */
    protected $FreeSeats;
    /**
     * @JMS\SerializedName("Seats")
     * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Seat")
     * @var null|Seat $Seats
     */
    protected $Seats;
    /**
     * @JMS\SerializedName("Tariffs")
     * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Tariff>")
     * @var null|Collection|Tariff[] $Tariffs
     */
    protected $Tariffs;

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->Type;
    }

    /**
     * @param int|null $Type
     * @return Car
     */
    public function setType(?int $Type): Car
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFreeSeats(): ?int
    {
        return $this->FreeSeats;
    }

    /**
     * @param int|null $FreeSeats
     *
     * @return Car
     */
    public function setFreeSeats(?int $FreeSeats): Car
    {
        $this->FreeSeats = $FreeSeats;

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
     * @return Collection|null
     */
    public function getTariffs(): ?Collection
    {
        return $this->Tariffs;
    }

    /**
     * @return Tariff
     */
    function getMinTariff()
    {
        /** @var Tariff $result */
        $result = $this->Tariffs[0];
        foreach ($this->Tariffs as $tariff) {
            if ($tariff->getTariffValue() < $result->getTariffValue()) {
                $result = $tariff;
            }
        }

        return $result;
    }

    /**
     * @param Collection|null $Tariffs
     *
     * @return Car
     */
    public function setTariffs(?Collection $Tariffs): Car
    {
        $this->Tariffs = $Tariffs;

        return $this;
    }
}
