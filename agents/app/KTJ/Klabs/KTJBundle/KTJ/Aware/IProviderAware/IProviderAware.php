<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 12:05
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\IProvider;

/**
 * Interface IProviderAware
 * @package Klabs\KTJBundle\KTJ\Aware\IProviderAware
 */
interface IProviderAware {
	/**
	 * @param IProvider|null $provider
	 *
	 * @return $this
	 */
	public function setProvider( ?IProvider $provider );

	/**
	 * @return IProvider|null
	 */
	public function getProvider(): ?IProvider;
}
