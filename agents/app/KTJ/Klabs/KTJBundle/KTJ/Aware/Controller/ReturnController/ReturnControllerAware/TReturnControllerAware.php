<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 13:37
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ReturnControllerAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IReturnController;

/**
 * Trait TReturnControllerAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ReturnControllerAware
 */
trait TReturnControllerAware {
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
