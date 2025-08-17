<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 1:09
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Railway
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class Railway {
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
	 * @return Railway
	 */
	public function setCode( ?string $Code ): Railway {
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
	 * @return Railway
	 */
	public function setName( ?string $Name ): Railway {
		$this->Name = $Name;

		return $this;
	}
}
