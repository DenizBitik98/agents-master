<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:26
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\CarAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search\ICarController;

/**
 * Trait TSearchCarAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchCarAware
 */
trait TCarAware {
	/**
	 * @var null|ICarController $searchCarController
	 */
	protected $searchCarController;

	/**
	 * @return ICarController|null
	 */
	public function getSearchCarController(): ?ICarController {
		return $this->searchCarController;
	}

	/**
	 * @param ICarController|null $searchCarController
	 *
	 * @return $this
	 */
	public function setSearchCarController( ?ICarController $searchCarController ) {
		$this->searchCarController = $searchCarController;

		return $this;
	}
}
