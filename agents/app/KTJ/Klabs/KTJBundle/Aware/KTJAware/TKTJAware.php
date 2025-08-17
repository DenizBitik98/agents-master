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
 * Trait KTJAwareTrait
 * @package Klabs\KTJBundle\Aware\KTJAware
 */
trait TKTJAware {
	/**
	 * @var null|KTJ $ktj
	 */
	protected $ktj;

	/**
	 * @return KTJ|null
	 */
	public function getKtj(): ?KTJ {
		return $this->ktj;
	}

	/**
	 * @param KTJ|null $ktj
	 *
	 * @return $this
	 */
	public function setKtj( ?KTJ $ktj ) {
		$this->ktj = $ktj;

		return $this;
	}
}
