<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:26
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search\ISearchController;

/**
 * Trait TSearchAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchAware
 */
trait TSearchAware {
	/**
	 * @var null|ISearchController $searchController
	 */
	protected $searchController;

	/**
	 * @return ISearchController|null
	 */
	public function getSearchController(): ?ISearchController {
		return $this->searchController;
	}

	/**
	 * @param ISearchController|null $searchController
	 *
	 * @return $this
	 */
	public function setSearchController( ?ISearchController $searchController ) {
		$this->searchController = $searchController;

		return $this;
	}
}
