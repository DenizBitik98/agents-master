<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.05.2018
 * Time: 1:01
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Tariff as BaseClass;
use Tightenco\Collect\Support\Collection as TightencoCollection;

/**
 * Class Tariff
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class Tariff extends BaseClass
{
    /**
     * @JMS\SerializedName("Type")
     * @JMS\Type("string")
     * @var null|string $Type
     */
    protected $Type;
    /**
     * @JMS\SerializedName("TrainLetter")
     * @JMS\Type("string")
     * @var null|string $TrainLetter
     */
    protected $TrainLetter;
    /**
     * @JMS\SerializedName("CarServiceType")
     * @JMS\Type("string")
     * @var null|string $CarServiceType
     */
    protected $CarServiceType;
    /**
     * @JMS\SerializedName("Tariff")
     * @JMS\Type("float")
     * @var null|float $Tariff
     */
    protected $Tariff;
    /**
     * @JMS\SerializedName("Tariff2")
     * @JMS\Type("float")
     * @var null|float $Tariff2
     */
    protected $Tariff2;
    /**
     * @JMS\SerializedName("Cars")
     * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Car>")
     * @var null|Collection|Car[] $Cars
     */
    protected $Cars;
    /**
     * @var null|Collection|TightencoCollection $CarsMerged
     */
    protected $CarsMerged;

    /**
     * @return null|string
     */
    public function getCarServiceType(): ?string
    {
        return $this->CarServiceType;
    }

    /**
     * @param null|string $CarServiceType
     *
     * @return Tariff
     */
    public function setCarServiceType(?string $CarServiceType): Tariff
    {
        $this->CarServiceType = $CarServiceType;

        return $this;
    }

    /**
     * @return Collection|null|Car[]
     */
    public function getCars(): ?Collection
    {
        return $this->Cars;
    }

    /**
     * @param Collection|null $Cars
     *
     * @return Tariff
     */
    public function setCars(?Collection $Cars): Tariff
    {
        $this->Cars = $Cars;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->Type;
    }

    /**
     * @param null|string $Type
     *
     * @return Tariff
     */
    public function setType(?string $Type): Tariff
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTrainLetter(): ?string
    {
        return $this->TrainLetter;
    }

    /**
     * @param null|string $TrainLetter
     *
     * @return Tariff
     */
    public function setTrainLetter(?string $TrainLetter): Tariff
    {
        $this->TrainLetter = $TrainLetter;

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
     *
     * @return Tariff
     */
    public function setTariff(?float $Tariff): Tariff
    {
        $this->Tariff = $Tariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariff2(): ?float
    {
        return $this->Tariff2;
    }

    /**
     * @param float|null $Tariff2
     *
     * @return Tariff
     */
    public function setTariff2(?float $Tariff2): Tariff
    {
        $this->Tariff2 = $Tariff2;

        return $this;
    }

    /**
     * @return Collection|null|TightencoCollection
     */
    public function getCarsMerged()
    {
        return $this->CarsMerged;
    }

    /**
     * @param Collection|null|TightencoCollection $CarsMerged
     * @return Tariff
     */
    public function setCarsMerged($CarsMerged)
    {
        $this->CarsMerged = $CarsMerged;
        return $this;
    }
}
