<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 11:00
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\OrderAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IOrderController;

/**
 * Trait TReportOrderAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\OrderAware
 */
trait TOrderAware {
	/**
	 * @var null|IOrderController $reportOrderController
	 */
	protected $reportOrderController;

	/**
	 * @return IOrderController|null
	 */
	public function getReportOrderController(): ?IOrderController {
		return $this->reportOrderController;
	}

	/**
	 * @param IOrderController|null $reportOrderController
	 *
	 * @return $this
	 */
	public function setReportOrderController( ?IOrderController $reportOrderController ) {
		$this->reportOrderController = $reportOrderController;

		return $this;
	}
}
