<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 17:44
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\PaymentAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IPaymentController;

/**
 * Trait TReportPaymentAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportPaymentAware
 */
trait TPaymentAware {
	/**
	 * @var null|IPaymentController $reportPaymentController
	 */
	protected $reportPaymentController;

	/**
	 * @return IPaymentController|null
	 */
	public function getReportPaymentController(): ?IPaymentController {
		return $this->reportPaymentController;
	}

	/**
	 * @param IPaymentController|null $reportPaymentController
	 *
	 * @return $this
	 */
	public function setReportPaymentController( ?IPaymentController $reportPaymentController ) {
		$this->reportPaymentController = $reportPaymentController;

		return $this;
	}
}
