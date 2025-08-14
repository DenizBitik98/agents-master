<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 1:03
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Carrier as BaseClass;

/**
 * Class Carrier
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class Carrier extends BaseClass {
	/**
	 * @JMS\SerializedName("Code")
	 * @JMS\Type("string")
	 * @var null|string $Code
	 */
	protected $Code;
	/**
	 * @JMS\SerializedName("Inn")
	 * @JMS\Type("string")
	 * @var null|string $Inn
	 */
	protected $Inn;

	/**
	 * @return null|string
	 */
	public function getCode(): ?string {
		return $this->Code;
	}

	/**
	 * @param null|string $Code
	 *
	 * @return Carrier
	 */
	public function setCode( ?string $Code ): Carrier {
		$this->Code = $Code;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getInn(): ?string {
		return $this->Inn;
	}

	/**
	 * @param null|string $Inn
	 *
	 * @return Carrier
	 */
	public function setInn( ?string $Inn ): Carrier {
		$this->Inn = $Inn;

		return $this;
	}
}
