<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 14:24
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ApplyControllerAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IApplyControllerController;

/**
 * Trait TApplyController
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ApplyControllerAware
 */
trait TApplyControllerAware {
	/**
	 * @var null|IApplyControllerController $applyController
	 */
	protected $applyController;

	/**
	 * @return IApplyControllerController|null
	 */
	public function getApplyController(): ?IApplyControllerController {
		return $this->applyController;
	}

	/**
	 * @param IApplyControllerController|null $applyController
	 *
	 * @return $this
	 */
	public function setApplyController( ?IApplyControllerController $applyController ) {
		$this->applyController = $applyController;

		return $this;
	}
}
