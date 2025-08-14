<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 15:29
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\SignatureAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\ISignatureController;

/**
 * Trait TSignatureAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\SignatureAware
 */
trait TSignatureControllerAware {
	/**
	 * @var null|ISignatureController $signatureController
	 */
	protected $signatureController;

	/**
	 * @return ISignatureController|null
	 */
	public function getSignatureController(): ?ISignatureController {
		return $this->signatureController;
	}

	/**
	 * @param ISignatureController|null $signatureController
	 *
	 * @return $this
	 */
	public function setSignatureController( ?ISignatureController $signatureController ) {
		$this->signatureController = $signatureController;

		return $this;
	}
}
