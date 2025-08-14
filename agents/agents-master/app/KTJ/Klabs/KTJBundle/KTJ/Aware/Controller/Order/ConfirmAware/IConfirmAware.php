<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:21
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ConfirmAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IConfirmController;

/**
 * Interface IReservationConfirmAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationConfirmAware
 */
interface IConfirmAware {
	/**
	 * @return IConfirmController|null
	 */
	public function getConfirmController(): ?IConfirmController;

	/**
	 * @param IConfirmController|null $reservationConfirmController
	 *
	 * @return $this
	 */
	public function setConfirmController( ?IConfirmController $reservationConfirmController );
}
