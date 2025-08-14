<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 10:40
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Ticket;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface ITicketReturnController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Ticket
 */
interface IReturnController extends IController {
	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function returnTicketAuthorized( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function returnTicket( IRequest $request ): ?IResponse;

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function retryReturnTicket(): ?IResponse;
}
