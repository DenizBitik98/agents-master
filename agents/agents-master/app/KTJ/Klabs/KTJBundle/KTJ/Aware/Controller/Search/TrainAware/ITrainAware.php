<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\TrainAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search\ITrainController;

/**
 * Interface ISearchTrainAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchTrainAware
 */
interface ITrainAware {
	/**
	 * @return ITrainController|null
	 */
	public function getSearchTrainController(): ?ITrainController;

	/**
	 * @param ITrainController|null $searchTrainController
	 *
	 * @return $this
	 */
	public function setSearchTrainController( ?ITrainController $searchTrainController );
}
