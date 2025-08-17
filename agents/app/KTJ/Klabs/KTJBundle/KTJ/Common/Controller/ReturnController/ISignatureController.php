<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 15:27
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface ISignatureController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\ReturnController
 */
interface ISignatureController extends IController {
	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function signatureAuthorized( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function signature( IRequest $request ): ?IResponse;
}
