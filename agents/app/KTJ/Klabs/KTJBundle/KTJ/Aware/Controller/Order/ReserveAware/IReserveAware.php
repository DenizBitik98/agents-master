<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:19
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReserveAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IReserveController;

/**
 * Interface IReservationReserve
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationReserveAware
 */
interface IReserveAware {
	/**
	 * @return IReserveController|null
	 */
	public function getReserveController(): ?IReserveController;

	/**
	 * @param IReserveController|null $reservationReserveController
	 *
	 * @return $this
	 */
	public function setReserveController( ?IReserveController $reservationReserveController );
}
