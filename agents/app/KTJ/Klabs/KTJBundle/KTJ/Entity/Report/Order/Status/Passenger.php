<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 12:19
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Order\Status;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Passenger
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Order\Status
 */
class Passenger {
	/**
	 * @JMS\SerializedName("Doc")
	 * @JMS\Type("string")
	 * @var null|string $Doc
	 */
	protected $Doc;
	/**
	 * @JMS\SerializedName("Name")
	 * @JMS\Type("string")
	 * @var null|string $Name
	 */
	protected $Name;
	/**
	 * @JMS\SerializedName("BirthDay")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $BirthDay
	 */
	protected $BirthDay;

	/**
	 * @return null|string
	 */
	public function getDoc(): ?string {
		return $this->Doc;
	}

	/**
	 * @param null|string $Doc
	 *
	 * @return Passenger
	 */
	public function setDoc( ?string $Doc ): Passenger {
		$this->Doc = $Doc;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getName(): ?string {
		return $this->Name;
	}

	/**
	 * @param null|string $Name
	 *
	 * @return Passenger
	 */
	public function setName( ?string $Name ): Passenger {
		$this->Name = $Name;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getBirthDay(): ?DateTime {
		return $this->BirthDay;
	}

	/**
	 * @param DateTime|null $BirthDay
	 *
	 * @return Passenger
	 */
	public function setBirthDay( ?DateTime $BirthDay ): Passenger {
		$this->BirthDay = $BirthDay;

		return $this;
	}
}
