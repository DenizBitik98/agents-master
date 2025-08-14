<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 26.05.2018
 * Time: 22:19
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ElRegPossible
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class ElRegPossible {
	/**
	 * @JMS\SerializedName("UK")
	 * @JMS\Type("bool")
	 * @var null|bool $UK
	 */
	protected $UK;
	/**
	 * @JMS\SerializedName("AKP")
	 * @JMS\Type("bool")
	 * @var null|bool $AKP
	 */
	protected $AKP;

	/**
	 * @return bool|null
	 */
	public function getUK(): ?bool {
		return $this->UK;
	}

	/**
	 * @param bool|null $UK
	 *
	 * @return ElRegPossible
	 */
	public function setUK( ?bool $UK ): ElRegPossible {
		$this->UK = $UK;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getAKP(): ?bool {
		return $this->AKP;
	}

	/**
	 * @param bool|null $AKP
	 *
	 * @return ElRegPossible
	 */
	public function setAKP( ?bool $AKP ): ElRegPossible {
		$this->AKP = $AKP;

		return $this;
	}
}
