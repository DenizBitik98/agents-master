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
 * Interface IReportOrderAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\OrderAware
 */
interface IOrderAware {
	/**
	 * @return IOrderController|null
	 */
	public function getReportOrderController(): ?IOrderController;

	/**
	 * @param IOrderController|null $reportOrderController
	 *
	 * @return $this
	 */
	public function setReportOrderController( ?IOrderController $reportOrderController );
}
