<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.09.2018
 * Time: 12:25
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReturnAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IReturnController;

/**
 * Interface IReportReturnAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportReturnAware
 */
interface IReturnAware {
	/**
	 * @return IReturnController|null
	 */
	public function getReportReturnController(): ?IReturnController;

	/**
	 * @param IReturnController|null $reportReturnController
	 *
	 * @return $this
	 */
	public function setReportReturnController( ?IReturnController $reportReturnController );
}
