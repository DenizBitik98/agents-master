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
 * Interface IReturnControllerAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ReturnControllerAware
 */
interface IReturnControllerAware {
	/**
	 * @return IReturnController|null
	 */
	public function getReturnController(): ?IReturnController;

	/**
	 * @param IReturnController|null $returnController
	 *
	 * @return $this
	 */
	public function setReturnController( ?IReturnController $returnController );
}
