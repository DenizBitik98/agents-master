<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 15:01
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class StationScheduleRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule
 */
class StationScheduleRequest implements IRequest {
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
	 * @return null|string
	 */
	public function getStation(): ?string {
		return $this->Station;
	}

	/**
	 * @param null|string $Station
	 *
	 * @return StationScheduleRequest
	 */
	public function setStation( ?string $Station ): StationScheduleRequest {
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
	 * @return StationScheduleRequest
	 */
	public function setDate( ?DateTime $Date ): StationScheduleRequest {
		$this->Date = $Date;

		return $this;
	}
}
