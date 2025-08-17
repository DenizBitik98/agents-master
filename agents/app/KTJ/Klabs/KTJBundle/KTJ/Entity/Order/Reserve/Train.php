<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 12:06
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Train
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class Train {
	/**
	 * @JMS\SerializedName("Number")
	 * @JMS\Type("string")
	 * @var null|string $Number
	 */
	protected $Number;

	/**
	 * Train constructor.
	 *
	 * @param null|string $Number
	 */
	public function __construct( ?string $Number = null ) {
		$this->setNumber( $Number );
	}

	/**
	 * @return null|string
	 */
	public function getNumber(): ?string {
		return $this->Number;
	}

	/**
	 * @param null|string $Number
	 *
	 * @return Train
	 */
	public function setNumber( ?string $Number ): Train {
		$this->Number = $Number;

		return $this;
	}
}
