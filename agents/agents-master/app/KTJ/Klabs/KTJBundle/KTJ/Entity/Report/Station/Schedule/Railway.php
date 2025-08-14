<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 15:24
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule;

use JMS\Serializer\Annotation as JMs;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Railway as BaseClass;

/**
 * Class Railway
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule
 */
class Railway extends BaseClass {
	/**
	 * @JMS\SerializedName("Value")
	 * @JMS\Type("string")
	 * @var null|string $Value
	 */
	protected $Value;

	/**
	 * @return null|string
	 */
	public function getValue(): ?string {
		return $this->Value;
	}

	/**
	 * @param null|string $Value
	 *
	 * @return Railway
	 */
	public function setValue( ?string $Value ): Railway {
		$this->Value = $Value;

		return $this;
	}
}
