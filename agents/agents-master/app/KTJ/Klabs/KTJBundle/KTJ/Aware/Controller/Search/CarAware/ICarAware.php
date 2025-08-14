<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:32
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\CarAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search\ICarController;

/**
 * Interface ISearchCarAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchCarAware
 */
interface ICarAware {
	/**
	 * @return ICarController|null
	 */
	public function getSearchCarController(): ?ICarController;

	/**
	 * @param ICarController|null $searchCarController
	 *
	 * @return $this
	 */
	public function setSearchCarController( ?ICarController $searchCarController );
}
