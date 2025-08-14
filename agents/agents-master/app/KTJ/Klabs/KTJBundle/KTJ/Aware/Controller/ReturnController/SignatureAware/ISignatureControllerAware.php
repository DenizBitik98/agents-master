<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 15:30
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\SignatureAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\ISignatureController;

/**
 * Interface ISignatureControllerAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\SignatureAware
 */
interface ISignatureControllerAware {
	/**
	 * @return ISignatureController|null
	 */
	public function getSignatureController(): ?ISignatureController;

	/**
	 * @param ISignatureController|null $signatureController
	 *
	 * @return $this
	 */
	public function setSignatureController( ?ISignatureController $signatureController );
}
