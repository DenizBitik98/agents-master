<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 16:30
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Direction
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class Direction {
	const DEFAULT_FORMAT = "Y-m-d\TH:i:s";
	/**
	 * @JMS\SerializedName("DateTimeFrom")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $DateTimeFrom
	 */
	protected $DateTimeFrom;
	/**
	 * @JMS\SerializedName("DateTimeTo")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $DateTimeTo
	 */
	protected $DateTimeTo;
	/**
	 * @JMS\SerializedName("IsArrivalDateTime")
	 * @JMS\Type("boolean")
	 * @var null|boolean $IsArrivalDateTime
	 */
	protected $IsArrivalDateTime;
	/**
	 * @JMS\SerializedName("NotAllTrains")
	 * @JMS\Type("boolean")
	 * @var null|bool $NotAllTrains
	 */
	protected $NotAllTrains;
	/**
	 * @JMS\SerializedName("PassRouteCodeFrom")
	 * @JMS\Type("string")
	 * @var null|string $PassRouteCodeFrom
	 */
	protected $PassRouteCodeFrom;
	/**
	 * @JMS\SerializedName("PassRouteCodeTo")
	 * @JMS\Type("string")
	 * @var null|string $PassRouteCodeTo
	 */
	protected $PassRouteCodeTo;
	/**
	 * @JMS\SerializedName("PassRouteFrom")
	 * @JMS\Type("string")
	 * @var null|string $PassRouteFrom
	 */
	protected $PassRouteFrom;
	/**
	 * @JMS\SerializedName("PassRouteTo")
	 * @JMS\Type("string")
	 * @var null|string $PassRouteTo
	 */
	protected $PassRouteTo;

	/**
	 * @return DateTime|null
	 */
	public function getDateTimeFrom(): ?DateTime {
		return $this->DateTimeFrom;
	}

	/**
	 * @param DateTime|null $DateTimeFrom
	 *
	 * @return Direction
	 */
	public function setDateTimeFrom( ?DateTime $DateTimeFrom ): Direction {
		$this->DateTimeFrom = $DateTimeFrom;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getDateTimeTo(): ?DateTime {
		return $this->DateTimeTo;
	}

	/**
	 * @param DateTime|null $DateTimeTo
	 *
	 * @return Direction
	 */
	public function setDateTimeTo( ?DateTime $DateTimeTo ): Direction {
		$this->DateTimeTo = $DateTimeTo;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getisArrivalDateTime(): ?bool {
		return $this->IsArrivalDateTime;
	}

	/**
	 * @param bool|null $IsArrivalDateTime
	 *
	 * @return Direction
	 */
	public function setIsArrivalDateTime( ?bool $IsArrivalDateTime ): Direction {
		$this->IsArrivalDateTime = $IsArrivalDateTime;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getNotAllTrains(): ?bool {
		return $this->NotAllTrains;
	}

	/**
	 * @param bool|null $NotAllTrains
	 *
	 * @return Direction
	 */
	public function setNotAllTrains( ?bool $NotAllTrains ): Direction {
		$this->NotAllTrains = $NotAllTrains;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getPassRouteCodeFrom(): ?string {
		return $this->PassRouteCodeFrom;
	}

	/**
	 * @param null|string $PassRouteCodeFrom
	 *
	 * @return Direction
	 */
	public function setPassRouteCodeFrom( ?string $PassRouteCodeFrom ): Direction {
		$this->PassRouteCodeFrom = $PassRouteCodeFrom;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getPassRouteCodeTo(): ?string {
		return $this->PassRouteCodeTo;
	}

	/**
	 * @param null|string $PassRouteCodeTo
	 *
	 * @return Direction
	 */
	public function setPassRouteCodeTo( ?string $PassRouteCodeTo ): Direction {
		$this->PassRouteCodeTo = $PassRouteCodeTo;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getPassRouteFrom(): ?string {
		return $this->PassRouteFrom;
	}

	/**
	 * @param null|string $PassRouteFrom
	 *
	 * @return Direction
	 */
	public function setPassRouteFrom( ?string $PassRouteFrom ): Direction {
		$this->PassRouteFrom = $PassRouteFrom;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getPassRouteTo(): ?string {
		return $this->PassRouteTo;
	}

	/**
	 * @param null|string $PassRouteTo
	 *
	 * @return Direction
	 */
	public function setPassRouteTo( ?string $PassRouteTo ): Direction {
		$this->PassRouteTo = $PassRouteTo;

		return $this;
	}
}
