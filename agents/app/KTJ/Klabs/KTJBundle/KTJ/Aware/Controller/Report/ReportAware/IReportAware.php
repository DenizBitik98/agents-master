<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 15:26
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IReportController;

/**
 * Interface IReportAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportAware
 */
interface IReportAware {
	/**
	 * @return IReportController|null
	 */
	public function getReportController(): ?IReportController;

	/**
	 * @param IReportController|null $reportController
	 *
	 * @return $this
	 */
	public function setReportController( ?IReportController $reportController );
}
