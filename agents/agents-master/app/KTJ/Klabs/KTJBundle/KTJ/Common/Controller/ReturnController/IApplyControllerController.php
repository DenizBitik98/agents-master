<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 13:35
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IReturnController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\ReturnController
 */
interface IApplyControllerController extends IController {
	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function applySuccessAuthorized( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function applySuccess( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function applyFailAuthorized( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function applyFail( IRequest $request ): ?IResponse;
}
