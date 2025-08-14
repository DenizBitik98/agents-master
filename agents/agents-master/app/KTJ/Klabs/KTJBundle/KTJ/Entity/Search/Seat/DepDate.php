<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 22:01
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class DepDate
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class DepDate {
	/**
	 * @JMS\SerializedName("Value")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $Value
	 */
	protected $Value;

	/**
	 * DepDate constructor.
	 *
	 * @param DateTime|null $Value
	 */
	public function __construct( ?DateTime $Value = null ) {
		$this->setValue( $Value );
	}

	/**
	 * @return DateTime|null
	 */
	public function getValue(): ?DateTime {
		return $this->Value;
	}

	/**
	 * @param DateTime|null $Value
	 *
	 * @return DepDate
	 */
	public function setValue( ?DateTime $Value ): DepDate {
		$this->Value = $Value;

		return $this;
	}
}
