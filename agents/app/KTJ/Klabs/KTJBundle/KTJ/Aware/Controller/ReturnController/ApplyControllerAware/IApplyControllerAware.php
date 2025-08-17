<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 14:25
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ApplyControllerAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IApplyControllerController;

/**
 * Interface IApplyControllerAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ApplyControllerAware
 */
interface IApplyControllerAware {
	/**
	 * @return IApplyControllerController|null
	 */
	public function getApplyController(): ?IApplyControllerController;

	/**
	 * @param IApplyControllerController|null $applyController
	 *
	 * @return $this
	 */
	public function setApplyController( ?IApplyControllerController $applyController );
}
