<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:17
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IOrderController;

/**
 * Interface IReservationAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationAware
 */
interface IReservationAware {
	/**
	 * @return IOrderController|null
	 */
	public function getOrderController(): ?IOrderController;

	/**
	 * @param IOrderController|null $reservationController
	 *
	 * @return $this
	 */
	public function setOrderController( ?IOrderController $reservationController );
}
