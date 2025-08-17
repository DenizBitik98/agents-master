<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 03.10.2018
 * Time: 11:15
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReturnAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IReturnController;

/**
 * Trait TReturnAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReturnAware
 */
trait TReturnAware {
	/**
	 * @var null|IReturnController $returnController
	 */
	protected $returnController;

	/**
	 * @return IReturnController|null
	 */
	public function getReturnController(): ?IReturnController {
		return $this->returnController;
	}

	/**
	 * @param IReturnController|null $returnController
	 *
	 * @return $this
	 */
	public function setReturnController( ?IReturnController $returnController ) {
		$this->returnController = $returnController;

		return $this;
	}
}
