<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 21:17
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Seat
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class Seat {
	/**
	 * @JMS\SerializedName("SeatsUndef")
	 * @JMS\Type("int")
	 * @var null|int $SeatsUndef
	 */
	protected $SeatsUndef;
	/**
	 * @JMS\SerializedName("SeatsDn")
	 * @JMS\Type("int")
	 * @var null|int $SeatsDn
	 */
	protected $SeatsDn;
	/**
	 * @JMS\SerializedName("SeatsUp")
	 * @JMS\Type("int")
	 * @var null|int $SeatsUp
	 */
	protected $SeatsUp;
	/**
	 * @JMS\SerializedName("SeatsLateralDn")
	 * @JMS\Type("int")
	 * @var null|int $SeatsLateralDn
	 */
	protected $SeatsLateralDn;
	/**
	 * @JMS\SerializedName("SeatsLateralUp")
	 * @JMS\Type("int")
	 * @var null|int $SeatsLateralUp
	 */
	protected $SeatsLateralUp;
	/**
	 * @JMS\SerializedName("FreeComp")
	 * @JMS\Type("int")
	 * @var null|int $FreeComp
	 */
	protected $FreeComp;

	/**
	 * @return int|null
	 */
	public function getSeatsUndef(): ?int {
		return $this->SeatsUndef;
	}

	/**
	 * @param int|null $SeatsUndef
	 *
	 * @return Seat
	 */
	public function setSeatsUndef( ?int $SeatsUndef ): Seat {
		$this->SeatsUndef = $SeatsUndef;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSeatsDn(): ?int {
		return $this->SeatsDn;
	}

	/**
	 * @param int|null $SeatsDn
	 *
	 * @return Seat
	 */
	public function setSeatsDn( ?int $SeatsDn ): Seat {
		$this->SeatsDn = $SeatsDn;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSeatsUp(): ?int {
		return $this->SeatsUp;
	}

	/**
	 * @param int|null $SeatsUp
	 *
	 * @return Seat
	 */
	public function setSeatsUp( ?int $SeatsUp ): Seat {
		$this->SeatsUp = $SeatsUp;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSeatsLateralDn(): ?int {
		return $this->SeatsLateralDn;
	}

	/**
	 * @param int|null $SeatsLateralDn
	 *
	 * @return Seat
	 */
	public function setSeatsLateralDn( ?int $SeatsLateralDn ): Seat {
		$this->SeatsLateralDn = $SeatsLateralDn;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSeatsLateralUp(): ?int {
		return $this->SeatsLateralUp;
	}

	/**
	 * @param int|null $SeatsLateralUp
	 *
	 * @return Seat
	 */
	public function setSeatsLateralUp( ?int $SeatsLateralUp ): Seat {
		$this->SeatsLateralUp = $SeatsLateralUp;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getFreeComp(): ?int {
		return $this->FreeComp;
	}

	/**
	 * @param int|null $FreeComp
	 *
	 * @return Seat
	 */
	public function setFreeComp( ?int $FreeComp ): Seat {
		$this->FreeComp = $FreeComp;

		return $this;
	}
}
