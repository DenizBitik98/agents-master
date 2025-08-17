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
 * Interface ISessionAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Auth\SessionAware
 */
interface ISessionAware {
	/**
	 * @return ISessionController|null
	 */
	public function getSessionController(): ?ISessionController;

	/**
	 * @param ISessionController|null $sessionController
	 *
	 * @return $this
	 */
	public function setSessionController( ?ISessionController $sessionController );
}
