<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 10:44
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\ReturnAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Ticket\IReturnController;

/**
 * Trait TTicketReturnAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\TicketReturnAware
 */
trait TReturnAware {
	/**
	 * @var null|IReturnController $returnController
	 */
	protected $returnController;

	/**
	 * @return IReturnController|null
	 */
	public function getReturnController(): ?IReturnController {
		return $this->returnController;
	}

	/**
	 * @param IReturnController|null $returnController
	 *
	 * @return $this
	 */
	public function setReturnController( ?IReturnController $returnController ) {
		$this->returnController = $returnController;

		return $this;
	}
}
