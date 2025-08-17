<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 10:54
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\TicketAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Ticket\ITicketController;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Ticket\TicketController;

/**
 * Interface ITicketAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\TicketAware
 */
interface ITicketAware {
	/**
	 * @return ITicketController|null
	 */
	public function getTicketController(): ?ITicketController;

	/**
	 * @param ITicketController|null $ticketController
	 *
	 * @return $this
	 */
	public function setTicketController( ?ITicketController $ticketController );
}
