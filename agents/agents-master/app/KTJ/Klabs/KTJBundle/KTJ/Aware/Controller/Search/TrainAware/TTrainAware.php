<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:26
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\TrainAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search\ITrainController;

/**
 * Trait TSearchTrainAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchTrainAware
 */
trait TTrainAware {
	/**
	 * @var null|ITrainController $searchTrainController
	 */
	protected $searchTrainController;

	/**
	 * @return ITrainController|null
	 */
	public function getSearchTrainController(): ?ITrainController {
		return $this->searchTrainController;
	}

	/**
	 * @param ITrainController|null $searchTrainController
	 *
	 * @return $this
	 */
	public function setSearchTrainController( ?ITrainController $searchTrainController ) {
		$this->searchTrainController = $searchTrainController;

		return $this;
	}
}
