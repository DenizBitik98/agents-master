<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 0:03
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\TrainAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\ITrainController;

/**
 * Interface IReportTrainAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportTrainAware
 */
interface ITrainAware {
	/**
	 * @return ITrainController|null
	 */
	public function getReportTrainController(): ?ITrainController;

	/**
	 * @param ITrainController|null $reportTrainController
	 *
	 * @return $this
	 */
	public function setReportTrainController( ?ITrainController $reportTrainController );
}
