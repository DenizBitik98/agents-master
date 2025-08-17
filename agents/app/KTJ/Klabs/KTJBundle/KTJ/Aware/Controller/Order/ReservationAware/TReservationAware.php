<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:16
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IOrderController;

/**
 * Trait TReservationAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationAware
 */
trait TReservationAware {
	/**
	 * @var null|IOrderController $orderController
	 */
	protected $orderController;

	/**
	 * @return IOrderController|null
	 */
	public function getOrderController(): ?IOrderController {
		return $this->orderController;
	}

	/**
	 * @param IOrderController|null $orderController
	 *
	 * @return $this
	 */
	public function setOrderController( ?IOrderController $orderController ) {
		$this->orderController = $orderController;

		return $this;
	}
}
