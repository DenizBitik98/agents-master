<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 20:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Class TrainDetail
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class TrainDetail {
	/**
	 * @JMS\SerializedName("IsTransit")
	 * @JMS\Type("bool")
	 * @var null|bool $IsTransit
	 */
	protected $IsTransit;
	/**
	 * @JMS\SerializedName("IsWithoutElReg")
	 * @JMS\Type("bool")
	 * @var null|bool $IsWithoutElReg
	 */
	protected $IsWithoutElReg;
	/**
	 * @JMS\SerializedName("IsObligativeElReg")
	 * @JMS\Type("bool")
	 * @var null|bool $IsObligativeElReg
	 */
	protected $IsObligativeElReg;
	/**
	 * @JMS\SerializedName("IsInternetTransit")
	 * @JMS\Type("bool")
	 * @var null|bool $IsInternetTransit
	 */
	protected $IsInternetTransit;
	/**
	 * @JMS\SerializedName("IsInterstate")
	 * @JMS\Type("bool")
	 * @var null|bool $IsInterstate
	 */
	protected $IsInterstate;

	/**
	 * @return bool|null
	 */
	public function getisTransit(): ?bool {
		return $this->IsTransit;
	}

	/**
	 * @param bool|null $IsTransit
	 *
	 * @return TrainDetail
	 */
	public function setIsTransit( ?bool $IsTransit ): TrainDetail {
		$this->IsTransit = $IsTransit;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getisWithoutElReg(): ?bool {
		return $this->IsWithoutElReg;
	}

	/**
	 * @param bool|null $IsWithoutElReg
	 *
	 * @return TrainDetail
	 */
	public function setIsWithoutElReg( ?bool $IsWithoutElReg ): TrainDetail {
		$this->IsWithoutElReg = $IsWithoutElReg;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getisObligativeElReg(): ?bool {
		return $this->IsObligativeElReg;
	}

	/**
	 * @param bool|null $IsObligativeElReg
	 *
	 * @return TrainDetail
	 */
	public function setIsObligativeElReg( ?bool $IsObligativeElReg ): TrainDetail {
		$this->IsObligativeElReg = $IsObligativeElReg;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getisInternetTransit(): ?bool {
		return $this->IsInternetTransit;
	}

	/**
	 * @param bool|null $IsInternetTransit
	 *
	 * @return TrainDetail
	 */
	public function setIsInternetTransit( ?bool $IsInternetTransit ): TrainDetail {
		$this->IsInternetTransit = $IsInternetTransit;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getisInterstate(): ?bool {
		return $this->IsInterstate;
	}

	/**
	 * @param bool|null $IsInterstate
	 *
	 * @return TrainDetail
	 */
	public function setIsInterstate( ?bool $IsInterstate ): TrainDetail {
		$this->IsInterstate = $IsInterstate;

		return $this;
	}
}
