<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:20
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ConfirmAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IConfirmController;

/**
 * Trait TReservationConfirmAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationConfirmAware
 */
trait TConfirmAware {
	/**
	 * @var null|IConfirmController $reservationConfirmController
	 */
	protected $reservationConfirmController;

	/**
	 * @return IConfirmController|null
	 */
	public function getConfirmController(): ?IConfirmController {
		return $this->reservationConfirmController;
	}

	/**
	 * @param IConfirmController|null $reservationConfirmController
	 *
	 * @return $this
	 */
	public function setConfirmController( ?IConfirmController $reservationConfirmController ) {
		$this->reservationConfirmController = $reservationConfirmController;

		return $this;
	}
}
