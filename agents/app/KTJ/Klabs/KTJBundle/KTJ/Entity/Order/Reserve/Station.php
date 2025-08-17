<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 0:59
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Station
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class Station {
	/**
	 * @JMS\SerializedName("Train")
	 * @JMS\Type("string")
	 * @var null|string $Train
	 */
	protected $Train;
	/**
	 * @JMS\SerializedName("Date")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $Date
	 */
	protected $Date;
	/**
	 * @JMS\SerializedName("Station")
	 * @JMS\Type("string")
	 * @var null|string $Station
	 */
	protected $Station;
	/**
	 * @JMS\SerializedName("StationCode")
	 * @JMS\Type("string")
	 * @var null|string $StationCode
	 */
	protected $StationCode;
	/**
	 * @JMS\SerializedName("IsTalgoTrain")
	 * @JMS\Type("bool")
	 * @var null|bool $IsTalgoTrain
	 */
	protected $IsTalgoTrain;
	/**
	 * @JMS\SerializedName("Timezone")
	 * @JMS\Type("int")
	 * @var null|int $Timezone
	 */
	protected $Timezone;

	/**
	 * @return null|string
	 */
	public function getTrain(): ?string {
		return $this->Train;
	}

	/**
	 * @param null|string $Train
	 *
	 * @return Station
	 */
	public function setTrain( ?string $Train ): Station {
		$this->Train = $Train;

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
	 * @return Station
	 */
	public function setDate( ?DateTime $Date ): Station {
		$this->Date = $Date;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getStation(): ?string {
		return $this->Station;
	}

	/**
	 * @param null|string $Station
	 *
	 * @return Station
	 */
	public function setStation( ?string $Station ): Station {
		$this->Station = $Station;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getStationCode(): ?string {
		return $this->StationCode;
	}

	/**
	 * @param null|string $StationCode
	 *
	 * @return Station
	 */
	public function setStationCode( ?string $StationCode ): Station {
		$this->StationCode = $StationCode;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getisTalgoTrain(): ?bool {
		return $this->IsTalgoTrain;
	}

	/**
	 * @param bool|null $IsTalgoTrain
	 *
	 * @return Station
	 */
	public function setIsTalgoTrain( ?bool $IsTalgoTrain ): Station {
		$this->IsTalgoTrain = $IsTalgoTrain;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getTimezone(): ?int {
		return $this->Timezone;
	}

	/**
	 * @param int|null $Timezone
	 *
	 * @return Station
	 */
	public function setTimezone( ?int $Timezone ): Station {
		$this->Timezone = $Timezone;

		return $this;
	}
}
