<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 15:13
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\StationAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IStationController;

/**
 * Trait TReportStationAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportStationAware
 */
trait TStationAware {
	/**
	 * @var null|IStationController $reportStationController
	 */
	protected $reportStationController;

	/**
	 * @return IStationController|null
	 */
	public function getReportStationController(): ?IStationController {
		return $this->reportStationController;
	}

	/**
	 * @param IStationController|null $reportStationController
	 *
	 * @return $this
	 */
	public function setReportStationController( ?IStationController $reportStationController ) {
		$this->reportStationController = $reportStationController;

		return $this;
	}
}
