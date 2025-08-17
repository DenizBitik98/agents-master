<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 0:09
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class TrainRouteRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Train\Route
 */
class TrainRouteRequest implements IRequest {
	/**
	 * @JMS\SerializedName("TrainRouteVersion")
	 * @JMS\Type("integer")
	 * @var null|int $TrainRouteVersion
	 */
	protected $TrainRouteVersion = 0;
	/**
	 * @JMS\SerializedName("TrainNumber")
	 * @JMS\Type("string")
	 * @var null|string $TrainNumber
	 */
	protected $TrainNumber = null;
	/**
	 * @JMS\SerializedName("Date")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $Date
	 */
	protected $Date = null;
	/**
	 * @JMS\SerializedName("Station")
	 * @JMS\Type("string")
	 * @var null|string $Station
	 */
	protected $Station = null;
	/**
	 * @JMS\SerializedName("Standard")
	 * @JMS\Type("bool")
	 * @var null|bool $Standard
	 */
	protected $Standard = true;

	/**
	 * @return int|null
	 */
	public function getTrainRouteVersion(): ?int {
		return $this->TrainRouteVersion;
	}

	/**
	 * @param int|null $TrainRouteVersion
	 *
	 * @return TrainRouteRequest
	 */
	public function setTrainRouteVersion( ?int $TrainRouteVersion ): TrainRouteRequest {
		$this->TrainRouteVersion = $TrainRouteVersion;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTrainNumber(): ?string {
		return $this->TrainNumber;
	}

	/**
	 * @param null|string $TrainNumber
	 *
	 * @return TrainRouteRequest
	 */
	public function setTrainNumber( ?string $TrainNumber ): TrainRouteRequest {
		$this->TrainNumber = $TrainNumber;

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
	 * @return TrainRouteRequest
	 */
	public function setDate( ?DateTime $Date ): TrainRouteRequest {
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
	 * @return TrainRouteRequest
	 */
	public function setStation( ?string $Station ): TrainRouteRequest {
		$this->Station = $Station;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getStandard(): ?bool {
		return $this->Standard;
	}

	/**
	 * @param bool|null $Standard
	 *
	 * @return TrainRouteRequest
	 */
	public function setStandard( ?bool $Standard ): TrainRouteRequest {
		$this->Standard = $Standard;

		return $this;
	}
}
