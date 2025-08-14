<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 1:08
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Country
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class Country {
	/**
	 * @JMS\SerializedName("Code")
	 * @JMS\Type("string")
	 * @var null|string $Code
	 */
	protected $Code;
	/**
	 * @JMS\SerializedName("Name")
	 * @JMS\Type("string")
	 * @var null|string $Name
	 */
	protected $Name;

	/**
	 * @return null|string
	 */
	public function getCode(): ?string {
		return $this->Code;
	}

	/**
	 * @param null|string $Code
	 *
	 * @return Country
	 */
	public function setCode( ?string $Code ): Country {
		$this->Code = $Code;

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
	 * @return Country
	 */
	public function setName( ?string $Name ): Country {
		$this->Name = $Name;

		return $this;
	}
}
