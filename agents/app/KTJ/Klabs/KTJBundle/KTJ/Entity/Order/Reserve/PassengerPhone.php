<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 12:43
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PassengerPhone
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class PassengerPhone {
	/**
	 * @JMS\SerializedName("PhoneNumber")
	 * @JMS\Type("string")
	 * @var null|string $PhoneNumber
	 */
	protected $PhoneNumber;

	/**
	 * PassengerPhone constructor.
	 *
	 * @param null|string $PhoneNumber
	 */
	public function __construct( ?string $PhoneNumber = null ) {
		$this->setPhoneNumber( $PhoneNumber );
	}

	/**
	 * @return null|string
	 */
	public function getPhoneNumber(): ?string {
		return $this->PhoneNumber;
	}

	/**
	 * @param null|string $PhoneNumber
	 *
	 * @return PassengerPhone
	 */
	public function setPhoneNumber( ?string $PhoneNumber ): PassengerPhone {
		$this->PhoneNumber = $PhoneNumber;

		return $this;
	}
}
