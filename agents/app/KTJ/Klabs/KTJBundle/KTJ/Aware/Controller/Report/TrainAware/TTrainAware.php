<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 0:02
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\TrainAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\ITrainController;

/**
 * Trait TReportTrainAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportTrainAware
 */
trait TTrainAware {
	/**
	 * @var null|ITrainController $reportTrainController
	 */
	protected $reportTrainController;

	/**
	 * @return ITrainController|null
	 */
	public function getReportTrainController(): ?ITrainController {
		return $this->reportTrainController;
	}

	/**
	 * @param ITrainController|null $reportTrainController
	 *
	 * @return $this
	 */
	public function setReportTrainController( ?ITrainController $reportTrainController ) {
		$this->reportTrainController = $reportTrainController;

		return $this;
	}
}
