<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 20:23
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TrainCollection
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class TrainCollection {
	/**
	 * @JMS\SerializedName("Date")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $Date
	 */
	protected $Date;

	/**
	 * @return DateTime|null
	 */
	public function getDate(): ?DateTime {
		return $this->Date;
	}

	/**
	 * @param DateTime|null $Date
	 *
	 * @return TrainCollection
	 */
	public function setDate( ?DateTime $Date ): TrainCollection {
		$this->Date = $Date;

		return $this;
	}
}
