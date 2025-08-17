<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 15:07
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class StationScheduleResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule
 */
class StationScheduleResponse implements IResponse {
	/**
	 * @JMS\SerializedName("Station")
	 * @JMS\Type("string")
	 * @var null|string $Station
	 */
	protected $Station;
	/**
	 * @JMS\SerializedName("Date")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $Date
	 */
	protected $Date;
	/**
	 * @JMS\SerializedName("DepartureTrains")
	 * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule\Train>")
	 * @var null|Collection $DepartureTrains
	 */
	protected $DepartureTrains;
	/**
	 * @JMS\SerializedName("TransitTrains")
	 * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule\Train>")
	 * @var null|Collection $TransitTrains
	 */
	protected $TransitTrains;
	/**
	 * @JMS\SerializedName("ArrivalTrains")
	 * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule\Train>")
	 * @var null|Collection $ArrivalTrains
	 */
	protected $ArrivalTrains;
	/**
	 * @JMS\SerializedName("Addons")
	 * @JMS\Type("string")
	 * @var null|string $Addons
	 */
	protected $Addons;
	/**
	 * @JMS\SerializedName("ArrivalTrains")
	 * @JMS\Type("ArrayCollection")
	 * @var null|Collection $SpecifyStations
	 */
	protected $SpecifyStations;

	/**
	 * @return null|string
	 */
	public function getStation(): ?string {
		return $this->Station;
	}

	/**
	 * @param null|string $Station
	 *
	 * @return StationScheduleResponse
	 */
	public function setStation( ?string $Station ): StationScheduleResponse {
		$this->Station = $Station;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getDate(): ?DateTime {
		return $this->Date;
	}

	/**
	 * @param DateTime|null $Date
	 *
	 * @return StationScheduleResponse
	 */
	public function setDate( ?DateTime $Date ): StationScheduleResponse {
		$this->Date = $Date;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getDepartureTrains(): ?Collection {
		return $this->DepartureTrains;
	}

	/**
	 * @param Collection|null $DepartureTrains
	 *
	 * @return StationScheduleResponse
	 */
	public function setDepartureTrains( ?Collection $DepartureTrains ): StationScheduleResponse {
		$this->DepartureTrains = $DepartureTrains;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getTransitTrains(): ?Collection {
		return $this->TransitTrains;
	}

	/**
	 * @param Collection|null $TransitTrains
	 *
	 * @return StationScheduleResponse
	 */
	public function setTransitTrains( ?Collection $TransitTrains ): StationScheduleResponse {
		$this->TransitTrains = $TransitTrains;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getArrivalTrains(): ?Collection {
		return $this->ArrivalTrains;
	}

	/**
	 * @param Collection|null $ArrivalTrains
	 *
	 * @return StationScheduleResponse
	 */
	public function setArrivalTrains( ?Collection $ArrivalTrains ): StationScheduleResponse {
		$this->ArrivalTrains = $ArrivalTrains;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getAddons(): ?string {
		return $this->Addons;
	}

	/**
	 * @param null|string $Addons
	 *
	 * @return StationScheduleResponse
	 */
	public function setAddons( ?string $Addons ): StationScheduleResponse {
		$this->Addons = $Addons;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getSpecifyStations(): ?Collection {
		return $this->SpecifyStations;
	}

	/**
	 * @param Collection|null $SpecifyStations
	 *
	 * @return StationScheduleResponse
	 */
	public function setSpecifyStations( ?Collection $SpecifyStations ): StationScheduleResponse {
		$this->SpecifyStations = $SpecifyStations;

		return $this;
	}
}
