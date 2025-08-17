<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:18
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReserveAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IReserveController;

/**
 * Trait TReservationReserveAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationReserveAware
 */
trait TReserveAware {
	/**
	 * @var null|IReserveController $reservationReserveController
	 */
	protected $reservationReserveController;

	/**
	 * @return IReserveController|null
	 */
	public function getReserveController(): ?IReserveController {
		return $this->reservationReserveController;
	}

	/**
	 * @param IReserveController|null $reservationReserveController
	 *
	 * @return $this
	 */
	public function setReserveController( ?IReserveController $reservationReserveController ) {
		$this->reservationReserveController = $reservationReserveController;

		return $this;
	}
}
