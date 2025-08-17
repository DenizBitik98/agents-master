<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 13:02
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Auth\AuthAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Auth\IAuthController;

/**
 * Interface IAuthAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Auth\AuthAware
 */
interface IAuthAware {
	/**
	 * @return IAuthController|null
	 */
	public function getAuthController(): ?IAuthController;

	/**
	 * @param IAuthController|null $authController
	 *
	 * @return $this
	 */
	public function setAuthController( ?IAuthController $authController );
}
