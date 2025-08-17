<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:21
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface ITrain
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Search
 */
interface ITrainController extends IController {
	/**
	 * @param IRequest $searchRequest
	 *
	 * @return IResponse|null
	 */
	function searchAuthorized( IRequest $searchRequest ): ?IResponse;

	/**
	 * @param IRequest $searchRequest
	 *
	 * @return IResponse|null
	 */
	function search( IRequest $searchRequest ): ?IResponse;
}
