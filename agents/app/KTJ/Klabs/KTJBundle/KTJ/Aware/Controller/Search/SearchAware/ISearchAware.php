<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:31
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search\ISearchController;

/**
 * Interface ISearchAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchAware
 */
interface ISearchAware {
	/**
	 * @return ISearchController|null
	 */
	public function getSearchController(): ?ISearchController;

	/**
	 * @param ISearchController|null $searchController
	 *
	 * @return $this
	 */
	public function setSearchController( ?ISearchController $searchController );
}
