<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 26.05.2018
 * Time: 22:12
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ClassService
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class ClassService {
	/**
	 * @JMS\SerializedName("Type")
	 * @JMS\Type("string")
	 * @var null|string $Type
	 */
	protected $Type;
	/**
	 * @JMS\SerializedName("Value")
	 * @JMS\Type("string")
	 * @var null|string $Value
	 */
	protected $Value;

	/**
	 * @return null|string
	 */
	public function getType(): ?string {
		return $this->Type;
	}

	/**
	 * @param null|string $Type
	 *
	 * @return ClassService
	 */
	public function setType( ?string $Type ): ClassService {
		$this->Type = $Type;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getValue(): ?string {
		return $this->Value;
	}

	/**
	 * @param null|string $Value
	 *
	 * @return ClassService
	 */
	public function setValue( ?string $Value ): ClassService {
		$this->Value = $Value;

		return $this;
	}
}
