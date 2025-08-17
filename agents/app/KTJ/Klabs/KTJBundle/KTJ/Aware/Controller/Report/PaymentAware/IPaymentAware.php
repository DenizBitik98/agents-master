<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 17:45
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\PaymentAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IPaymentController;

/**
 * Interface IReportPaymentAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportPaymentAware
 */
interface IPaymentAware {
	/**
	 * @return IPaymentController|null
	 */
	public function getReportPaymentController(): ?IPaymentController;

	/**
	 * @param IPaymentController|null $reportPaymentController
	 *
	 * @return $this
	 */
	public function setReportPaymentController( ?IPaymentController $reportPaymentController );
}
