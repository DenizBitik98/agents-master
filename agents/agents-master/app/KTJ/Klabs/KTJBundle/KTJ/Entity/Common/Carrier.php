<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 26.05.2018
 * Time: 22:16
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Carrier
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class Carrier {
	/**
	 * @JMS\SerializedName("Name")
	 * @JMS\Type("string")
	 * @var null|string $Name
	 */
	protected $Name;

	/**
	 * @return null|string
	 */
	public function getName(): ?string {
		return $this->Name;
	}

	/**
	 * @param null|string $Name
	 *
	 * @return Carrier
	 */
	public function setName( ?string $Name ): Carrier {
		$this->Name = $Name;

		return $this;
	}
}
