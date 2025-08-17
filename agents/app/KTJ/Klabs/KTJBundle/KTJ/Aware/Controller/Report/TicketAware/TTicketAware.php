<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 13:10
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\TicketAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\ITicketController;

/**
 * Trait TReportTicketAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReportTicketAware\TicketAware
 */
trait TTicketAware {
	/**
	 * @var null|ITicketController $reportTicketController
	 */
	protected $reportTicketController;

	/**
	 * @return ITicketController|null
	 */
	public function getReportTicketController(): ?ITicketController {
		return $this->reportTicketController;
	}

	/**
	 * @param ITicketController|null $reportTicketController
	 *
	 * @return $this
	 */
	public function setReportTicketController( ?ITicketController $reportTicketController ) {
		$this->reportTicketController = $reportTicketController;

		return $this;
	}
}
