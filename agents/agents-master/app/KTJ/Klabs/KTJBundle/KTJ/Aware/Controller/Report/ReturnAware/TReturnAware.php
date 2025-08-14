<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.09.2018
 * Time: 12:24
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReturnAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IReturnController;

/**
 * Trait TReportReturnAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportReturnAware
 */
trait TReturnAware {
	/**
	 * @var null|IReturnController $reportReturnController
	 */
	protected $reportReturnController;

	/**
	 * @return IReturnController|null
	 */
	public function getReportReturnController(): ?IReturnController {
		return $this->reportReturnController;
	}

	/**
	 * @param IReturnController|null $reportReturnController
	 *
	 * @return $this
	 */
	public function setReportReturnController( ?IReturnController $reportReturnController ) {
		$this->reportReturnController = $reportReturnController;

		return $this;
	}
}
