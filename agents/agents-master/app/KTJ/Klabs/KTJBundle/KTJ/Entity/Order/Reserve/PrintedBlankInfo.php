<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 1:43
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PrintedBlankInfo
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class PrintedBlankInfo {
	/**
	 * @JMS\SerializedName("ElRegPossible")
	 * @JMS\Type("bool")
	 * @var null|bool $ElRegPossible
	 */
	protected $ElRegPossible;
	/**
	 * @JMS\SerializedName("PrintBlank")
	 * @JMS\Type("bool")
	 * @var null|bool $PrintBlank
	 */
	protected $PrintBlank;

	/**
	 * @return bool|null
	 */
	public function getElRegPossible(): ?bool {
		return $this->ElRegPossible;
	}

	/**
	 * @param bool|null $ElRegPossible
	 */
	public function setElRegPossible( ?bool $ElRegPossible ): void {
		$this->ElRegPossible = $ElRegPossible;
	}

	/**
	 * @return bool|null
	 */
	public function getPrintBlank(): ?bool {
		return $this->PrintBlank;
	}

	/**
	 * @param bool|null $PrintBlank
	 */
	public function setPrintBlank( ?bool $PrintBlank ): void {
		$this->PrintBlank = $PrintBlank;
	}
}
