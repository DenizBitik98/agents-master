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
 * Trait TReportAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportAware
 */
trait TReportAware {
	/**
	 * @var null|IReportController $reportController
	 */
	protected $reportController;

	/**
	 * @return IReportController|null
	 */
	public function getReportController(): ?IReportController {
		return $this->reportController;
	}

	/**
	 * @param IReportController|null $reportController
	 *
	 * @return $this
	 */
	public function setReportController( ?IReportController $reportController ) {
		$this->reportController = $reportController;

		return $this;
	}
}
