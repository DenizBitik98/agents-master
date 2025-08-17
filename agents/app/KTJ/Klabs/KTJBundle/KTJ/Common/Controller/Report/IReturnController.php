<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.09.2018
 * Time: 12:06
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IReturnController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Report
 */
interface IReturnController extends IController {
	/**
	 * @param IRequest $statuses
	 *
	 * @return IResponse|null
	 */
	function orderInformationAuthorized( IRequest $statuses ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function orderInformation( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function ticketInformationAuthorized( IRequest $request ): ?IResponse;

	/**
	 * @param IRequest $request
	 *
	 * @return IResponse|null
	 */
	function ticketInformation( IRequest $request ): ?IResponse;

	/**
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
     * @param IRequest $request
     * @return IResponse|null
     */
    function referenceAuthorized(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function reference(IRequest $request): ?IResponse;
}
