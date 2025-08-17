<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 23:52
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Train as BaseClass;

/**
 * Class Train
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class Train extends BaseClass {
	/**
	 * @JMS\SerializedName("DepTrain")
	 * @JMS\Type("string")
	 * @var null|string $DepTrain
	 */
	protected $DepTrain;
	/**
	 * @JMS\SerializedName("Distance")
	 * @JMS\Type("int")
	 * @var null|int $Distance
	 */
	protected $Distance;
	/**
	 * @JMS\SerializedName("Departure")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Datetime")
	 * @var null|Datetime $Departure
	 */
	protected $Departure;
	/**
	 * @JMS\SerializedName("Arrival")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Datetime")
	 * @var null|Datetime $Arrival
	 */
	protected $Arrival;
	/**
	 * @JMS\SerializedName("Cars")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Tariff>")
	 * @var null|Collection|Tariff[] $Cars
	 */
	protected $Cars;

	/**
	 * @return null|string
	 */
	public function getDepTrain(): ?string {
		return $this->DepTrain;
	}

	/**
	 * @param null|string $DepTrain
	 *
	 * @return Train
	 */
	public function setDepTrain( ?string $DepTrain ): Train {
		$this->DepTrain = $DepTrain;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getDistance(): ?int {
		return $this->Distance;
	}

	/**
	 * @param int|null $Distance
	 *
	 * @return Train
	 */
	public function setDistance( ?int $Distance ): Train {
		$this->Distance = $Distance;

		return $this;
	}

	/**
	 * @return Datetime|null
	 */
	public function getArrival(): ?Datetime {
		return $this->Arrival;
	}

	/**
	 * @param Datetime|null $Arrival
	 *
	 * @return Train
	 */
	public function setArrival( ?Datetime $Arrival ): Train {
		$this->Arrival = $Arrival;

		return $this;
	}

	/**
	 * @return Datetime|null
	 */
	public function getDeparture(): ?Datetime {
		return $this->Departure;
	}

	/**
	 * @param Datetime|null $Departure
	 *
	 * @return Train
	 */
	public function setDeparture( ?Datetime $Departure ): Train {
		$this->Departure = $Departure;

		return $this;
	}

	/**
	 * @return Collection|null|Tariff[]
	 */
	public function getCars() {
		return $this->Cars;
	}

	/**
	 * @param Collection|null $Cars
	 *
	 * @return Train
	 */
	public function setCars( ?Collection $Cars ): Train {
		$this->Cars = $Cars;

		return $this;
	}
}
