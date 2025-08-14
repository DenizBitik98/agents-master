<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:38
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class ReserveRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class ReserveRequest implements IRequest {
	/**
	 * @JMS\SerializedName("StationFrom")
	 * @JMS\Type("string")
	 * @var null|string $StationFrom
	 */
	protected $StationFrom;
	/**
	 * @JMS\SerializedName("StationTo")
	 * @JMS\Type("string")
	 * @var null|string $StationTo
	 */
	protected $StationTo;
	/**
	 * @JMS\SerializedName("DepDate")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $DepDate
	 */
	protected $DepDate;
	/**
	 * @JMS\SerializedName("DepTime")
	 * @JMS\Type("DateTime<'H:i:s'>")
	 * @var null|DateTime $DepTime
	 */
	protected $DepTime;
	/**
	 * @JMS\SerializedName("Train")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Train")
	 * @var null|Train $Train
	 */
	protected $Train;
	/**
	 * @JMS\SerializedName("Car")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Car")
	 * @var null|Car $Car
	 */
	protected $Car;
	/**
	 * @JMS\SerializedName("Requirements")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Requirements")
	 * @var null|Requirements $Requirements
	 */
	protected $Requirements;
	/**
	 * @JMS\SerializedName("CreditCard")
	 * @JMS\Type("boolean")
	 * @var null|bool $CreditCard
	 */
	protected $CreditCard;
	/**
	 * @JMS\SerializedName("Blanks")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Blank>")
	 * @var null|Blank[]|Collection $Blanks
	 */
	protected $Blanks;
	/**
	 * @JMS\SerializedName("MachineKey")
	 * @JMS\Type("string")
	 * @var null|string $MachineKey
	 */
	protected $MachineKey;

	/**
	 * @return null|string
	 */
	public function getStationFrom(): ?string {
		return $this->StationFrom;
	}

	/**
	 * @param null|string $StationFrom
	 *
	 * @return ReserveRequest
	 */
	public function setStationFrom( ?string $StationFrom ): ReserveRequest {
		$this->StationFrom = $StationFrom;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getStationTo(): ?string {
		return $this->StationTo;
	}

	/**
	 * @param null|string $StationTo
	 *
	 * @return ReserveRequest
	 */
	public function setStationTo( ?string $StationTo ): ReserveRequest {
		$this->StationTo = $StationTo;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getDepDate(): ?DateTime {
		return $this->DepDate;
	}

	/**
	 * @param DateTime|null $DepDate
	 *
	 * @return ReserveRequest
	 */
	public function setDepDate( ?DateTime $DepDate ): ReserveRequest {
		$this->DepDate = $DepDate;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getDepTime(): ?DateTime {
		return $this->DepTime;
	}

	/**
	 * @param DateTime|null $DepTime
	 *
	 * @return ReserveRequest
	 */
	public function setDepTime( ?DateTime $DepTime ): ReserveRequest {
		$this->DepTime = $DepTime;

		return $this;
	}

	/**
	 * @return Train|null
	 */
	public function getTrain(): ?Train {
		return $this->Train;
	}

	/**
	 * @param Train|null $Train
	 *
	 * @return ReserveRequest
	 */
	public function setTrain( ?Train $Train ): ReserveRequest {
		$this->Train = $Train;

		return $this;
	}

	/**
	 * @return Car|null
	 */
	public function getCar(): ?Car {
		return $this->Car;
	}

	/**
	 * @param Car|null $Car
	 *
	 * @return ReserveRequest
	 */
	public function setCar( ?Car $Car ): ReserveRequest {
		$this->Car = $Car;

		return $this;
	}

	/**
	 * @return Requirements|null
	 */
	public function getRequirements(): ?Requirements {
		return $this->Requirements;
	}

	/**
	 * @param Requirements|null $Requirements
	 *
	 * @return ReserveRequest
	 */
	public function setRequirements( ?Requirements $Requirements ): ReserveRequest {
		$this->Requirements = $Requirements;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getCreditCard(): ?bool {
		return $this->CreditCard;
	}

	/**
	 * @param bool|null $CreditCard
	 *
	 * @return ReserveRequest
	 */
	public function setCreditCard( ?bool $CreditCard ): ReserveRequest {
		$this->CreditCard = $CreditCard;

		return $this;
	}

	/**
	 * @return Collection|Blank[]|null
	 */
	public function getBlanks() {
		return $this->Blanks;
	}

	/**
	 * @param Collection|Blank[]|null $Blanks
	 *
	 * @return ReserveRequest
	 */
	public function setBlanks( $Blanks ) {
		$this->Blanks = $Blanks;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getMachineKey(): ?string {
		return $this->MachineKey;
	}

	/**
	 * @param null|string $MachineKey
	 *
	 * @return ReserveRequest
	 */
	public function setMachineKey( ?string $MachineKey ): ReserveRequest {
		$this->MachineKey = $MachineKey;

		return $this;
	}
}
