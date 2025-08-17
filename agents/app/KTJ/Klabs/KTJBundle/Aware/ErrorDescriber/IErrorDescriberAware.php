<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 31.05.2018
 * Time: 15:46
 */

namespace App\KTJ\Klabs\KTJBundle\Aware\ErrorDescriber;

use App\KTJ\Klabs\KTJBundle\ErrorDescriber\ErrorDescriber;

/**
 * Interface ErrorDescriberAwareInterface
 * @package Klabs\KTJBundle\Aware\ErrorDescriber
 */
interface IErrorDescriberAware {
	/**
	 * @return ErrorDescriber|null
	 */
	public function getErrorDescriber(): ?ErrorDescriber;

	/**
	 * @param ErrorDescriber|null $errorDescriber
	 *
	 * @return $this
	 */
	public function setErrorDescriber( ?ErrorDescriber $errorDescriber );
}
