<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.05.2018
 * Time: 15:15
 */

namespace App\KTJ\Klabs\KTJBundle\Aware\KTJAware;

use App\KTJ\Klabs\KTJBundle\KTJ\KTJ;

/**
 * Interface KTJAwareInterface
 * @package Klabs\KTJBundle\Aware\KTJAware
 */
interface IKTJAware {
	/**
	 * @return KTJ|null
	 */
	public function getKtj(): ?KTJ;

	/**
	 * @param KTJ|null $ktj
	 *
	 * @return $this
	 */
	public function setKtj( ?KTJ $ktj );
}
