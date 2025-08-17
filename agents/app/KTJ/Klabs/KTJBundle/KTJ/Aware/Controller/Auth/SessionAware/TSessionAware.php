<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 13:02
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Auth\SessionAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Auth\ISessionController;

/**
 * Trait TSessionAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Auth\SessionAware
 */
trait TSessionAware {
	/**
	 * @var null|ISessionController $sessionController
	 */
	protected $sessionController;

	/**
	 * @return ISessionController|null
	 */
	public function getSessionController(): ?ISessionController {
		return $this->sessionController;
	}

	/**
	 * @param ISessionController|null $sessionController
	 *
	 * @return $this
	 */
	public function setSessionController( ?ISessionController $sessionController ) {
		$this->sessionController = $sessionController;

		return $this;
	}
}
