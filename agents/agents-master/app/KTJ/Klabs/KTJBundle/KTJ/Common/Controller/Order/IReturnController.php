<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 12:47
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IReturnController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Order
 */
interface IReturnController extends IController {
	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function orderAuthorized( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function order( IRequest $request ): ?IResponse;
}
