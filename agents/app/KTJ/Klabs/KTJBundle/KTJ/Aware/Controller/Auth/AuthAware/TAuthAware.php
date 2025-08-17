<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 13:01
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Auth\AuthAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Auth\IAuthController;

/**
 * Trait TAuthAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Auth\AuthAware
 */
trait TAuthAware {
	/**
	 * @var null|IAuthController $authController
	 */
	protected $authController;

	/**
	 * @return IAuthController|null
	 */
	public function getAuthController(): ?IAuthController {
		return $this->authController;
	}

	/**
	 * @param IAuthController|null $authController
	 *
	 * @return $this
	 */
	public function setAuthController( ?IAuthController $authController ) {
		$this->authController = $authController;

		return $this;
	}
}
