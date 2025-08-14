<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 12:04
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\IProvider;

/**
 * Trait TProviderAware
 * @package Klabs\KTJBundle\KTJ\Aware\IProviderAware
 */
trait TProviderAware {
	/**
	 * @var null|IProvider $provider
	 */
	protected $provider;

	/**
	 * @return IProvider|null
	 */
	public function getProvider(): ?IProvider {
		return $this->provider;
	}

	/**
	 * @param IProvider|null $provider
	 *
	 * @return $this
	 */
	public function setProvider( ?IProvider $provider ) {
		$this->provider = $provider;

		return $this;
	}
}
