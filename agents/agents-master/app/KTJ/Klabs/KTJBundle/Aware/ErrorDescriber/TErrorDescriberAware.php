<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 31.05.2018
 * Time: 15:45
 */

namespace App\KTJ\Klabs\KTJBundle\Aware\ErrorDescriber;

use App\KTJ\Klabs\KTJBundle\ErrorDescriber\ErrorDescriber;

/**
 * Trait ErrorDescriberAwareTrait
 * @package Klabs\KTJBundle\Aware\ErrorDescriber
 */
trait TErrorDescriberAware {
	/**
	 * @var null|ErrorDescriber $errorDescriber
	 */
	protected $errorDescriber;

	/**
	 * @return ErrorDescriber|null
	 */
	public function getErrorDescriber(): ?ErrorDescriber {
		return $this->errorDescriber;
	}

	/**
	 * @param ErrorDescriber|null $errorDescriber
	 *
	 * @return $this
	 */
	public function setErrorDescriber( ?ErrorDescriber $errorDescriber ) {
		$this->errorDescriber = $errorDescriber;

		return $this;
	}
}
