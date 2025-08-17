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
 * Interface IReturnAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReturnAware
 */
interface IReturnAware {
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
