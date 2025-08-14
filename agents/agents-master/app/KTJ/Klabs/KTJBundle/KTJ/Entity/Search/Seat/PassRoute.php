<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 23:27
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PassRoute
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class PassRoute {
	/**
	 * @JMS\SerializedName("From")
	 * @JMS\Type("string")
	 * @var null|string $From
	 */
	protected $From;
	/**
	 * @JMS\SerializedName("To")
	 * @JMS\Type("string")
	 * @var null|string $To
	 */
	protected $To;

	/**
	 * @return null|string
	 */
	public function getFrom(): ?string {
		return $this->From;
	}

	/**
	 * @param null|string $From
	 *
	 * @return PassRoute
	 */
	public function setFrom( ?string $From ): PassRoute {
		$this->From = $From;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTo(): ?string {
		return $this->To;
	}

	/**
	 * @param null|string $To
	 *
	 * @return PassRoute
	 */
	public function setTo( ?string $To ): PassRoute {
		$this->To = $To;

		return $this;
	}
}
