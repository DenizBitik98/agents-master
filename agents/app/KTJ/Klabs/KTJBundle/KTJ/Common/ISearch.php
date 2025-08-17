<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.05.2018
 * Time: 12:24
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\IProviderAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface ISearch
 * @package Klabs\KTJBundle\KTJ\Common
 */
interface ISearch extends IProviderAwareInterface {
	/**
	 * @param IRequest $searchRequest
	 *
	 * @return IResponse|null
	 */
	function searchTrainsSafe( IRequest $searchRequest ): ?IResponse;

	/**
	 * @param IRequest $searchRequest
	 *
	 * @return IResponse|null
	 */
	function searchTrains( IRequest $searchRequest ): ?IResponse;

	/**
	 * @param IRequest $searchRequest
	 *
	 * @return IResponse|null
	 */
	function searchSeatsSafe( IRequest $searchRequest ): ?IResponse;

	/**
	 * @param IRequest $searchRequest
	 *
	 * @return IResponse|null
	 */
	function searchSeats( IRequest $searchRequest ): ?IResponse;
}
