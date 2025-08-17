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
 * Interface ICar
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Search
 */
interface ICarController extends IController {
	/**
	 * Event occurs before making car search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
	 */
	const BEFORE_CAR_SEARCH = 'ktj.dcts.search.car.before';
	/**
	 * Event occurs after making car search call
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_CAR_SEARCH = 'ktj.dcts.search.car.after';
	/**
	 * Event occurs after making car search result serialize
	 * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
	 */
	const AFTER_SERIALIZE = 'ktj.dcts.search.car.serialize';

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
