<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 12:44
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PassengerEmail
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class PassengerEmail {
	/**
	 * @JMS\SerializedName("EmailAddress")
	 * @JMS\Type("string")
	 * @var null|string $EmailAddress
	 */
	protected $EmailAddress;

	/**
	 * PassengerEmail constructor.
	 *
	 * @param null|string $EmailAddress
	 */
	public function __construct( ?string $EmailAddress = null ) {
		$this->setEmailAddress( $EmailAddress );
	}

	/**
	 * @return null|string
	 */
	public function getEmailAddress(): ?string {
		return $this->EmailAddress;
	}

	/**
	 * @param null|string $EmailAddress
	 *
	 * @return PassengerEmail
	 */
	public function setEmailAddress( ?string $EmailAddress ): PassengerEmail {
		$this->EmailAddress = $EmailAddress;

		return $this;
	}
}
