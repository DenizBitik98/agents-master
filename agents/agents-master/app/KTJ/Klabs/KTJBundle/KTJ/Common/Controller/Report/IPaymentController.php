<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 17:42
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IPaymentController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Report
 */
interface IPaymentController extends IController {
	/**
	 * Get ticket signature
	 *
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function getSignatureAuthorized( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function getSignature( IRequest $request ): ?IResponse;
}
