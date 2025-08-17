<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 13:08
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface ITicketController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Report
 */
interface ITicketController extends IController {
	/**
	 * Get tickets statuses
	 *
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function statusAuthorized( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function status( IRequest $request ): ?IResponse;

	/**
	 * Get terminal info
	 *
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function terminalInfoAuthorized( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function terminalInfo( IRequest $request ): ?IResponse;
}
