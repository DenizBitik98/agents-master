<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 10:45
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\ReturnAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Ticket\IReturnController;

/**
 * Interface ITicketReturnAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\TicketReturnAware
 */
interface IReturnAware {
	/**
	 * @return IReturnController|null
	 */
	public function getReturnController(): ?IReturnController;

	/**
	 * @param IReturnController|null $ticketReturnController
	 *
	 * @return $this
	 */
	public function setReturnController( ?IReturnController $ticketReturnController );
}
