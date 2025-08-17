<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 15:19
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Train
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule
 */
class Train {
	/**
	 * @JMS\SerializedName("TrainNumber")
	 * @JMS\Type("string")
	 * @var null|string $TrainNumber
	 */
	protected $TrainNumber;
	/**
	 * @JMS\SerializedName("Route")
	 * @JMS\Type("ArrayCollection<string>")
	 * @var null|Collection $Route
	 */
	protected $Route;
	/**
	 * @JMS\SerializedName("StopTime")
	 * @JMS\Type("string")
	 * @var null|string $StopTime
	 */
	protected $StopTime;
	/**
	 * @JMS\SerializedName("DepartureTime")
	 * @JMS\Type("string")
	 * @var null|string $DepartureTime
	 */
	protected $DepartureTime;
	/**
	 * @JMS\SerializedName("ArrivalTime")
	 * @JMS\Type("string")
	 * @var null|string $ArrivalTime
	 */
	protected $ArrivalTime;
	/**
	 * @JMS\SerializedName("TimeInWay")
	 * @JMS\Type("string")
	 * @var null|string $TimeInWay
	 */
	protected $TimeInWay;
	/**
	 * @JMS\SerializedName("Railway")
	 * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule\Railway")
	 * @var null|Railway $Railway
	 */
	protected $Railway;
	/**
	 * @JMS\SerializedName("CarType")
	 * @JMS\Type("string")
	 * @var null|string $CarType
	 */
	protected $CarType;
	/**
	 * @JMS\SerializedName("DaysOfGo")
	 * @JMS\Type("string")
	 * @var null|string $DaysOfGo
	 */
	protected $DaysOfGo;
	/**
	 * @JMS\SerializedName("$Cars")
	 * @JMS\Type("ArrayCollection")
	 * @var null|Collection $Cars
	 */
	protected $Cars;

	/**
	 * @return null|string
	 */
	public function getTrainNumber(): ?string {
		return $this->TrainNumber;
	}

	/**
	 * @param null|string $TrainNumber
	 *
	 * @return Train
	 */
	public function setTrainNumber( ?string $TrainNumber ): Train {
		$this->TrainNumber = $TrainNumber;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getRoute(): ?Collection {
		return $this->Route;
	}

	/**
	 * @param Collection|null $Route
	 *
	 * @return Train
	 */
	public function setRoute( ?Collection $Route ): Train {
		$this->Route = $Route;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getStopTime(): ?string {
		return $this->StopTime;
	}

	/**
	 * @param null|string $StopTime
	 *
	 * @return Train
	 */
	public function setStopTime( ?string $StopTime ): Train {
		$this->StopTime = $StopTime;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getDepartureTime(): ?string {
		return $this->DepartureTime;
	}

	/**
	 * @param null|string $DepartureTime
	 *
	 * @return Train
	 */
	public function setDepartureTime( ?string $DepartureTime ): Train {
		$this->DepartureTime = $DepartureTime;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getArrivalTime(): ?string {
		return $this->ArrivalTime;
	}

	/**
	 * @param null|string $ArrivalTime
	 *
	 * @return Train
	 */
	public function setArrivalTime( ?string $ArrivalTime ): Train {
		$this->ArrivalTime = $ArrivalTime;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTimeInWay(): ?string {
		return $this->TimeInWay;
	}

	/**
	 * @param null|string $TimeInWay
	 *
	 * @return Train
	 */
	public function setTimeInWay( ?string $TimeInWay ): Train {
		$this->TimeInWay = $TimeInWay;

		return $this;
	}

	/**
	 * @return Railway|null
	 */
	public function getRailway(): ?Railway {
		return $this->Railway;
	}

	/**
	 * @param Railway|null $Railway
	 *
	 * @return Train
	 */
	public function setRailway( ?Railway $Railway ): Train {
		$this->Railway = $Railway;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCarType(): ?string {
		return $this->CarType;
	}

	/**
	 * @param null|string $CarType
	 *
	 * @return Train
	 */
	public function setCarType( ?string $CarType ): Train {
		$this->CarType = $CarType;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getDaysOfGo(): ?string {
		return $this->DaysOfGo;
	}

	/**
	 * @param null|string $DaysOfGo
	 *
	 * @return Train
	 */
	public function setDaysOfGo( ?string $DaysOfGo ): Train {
		$this->DaysOfGo = $DaysOfGo;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getCars(): ?Collection {
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
