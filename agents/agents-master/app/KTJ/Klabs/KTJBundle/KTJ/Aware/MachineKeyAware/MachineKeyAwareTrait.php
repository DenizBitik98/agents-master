<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 14:02
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware;
/**
 * Trait MachineKeyAwareTrait
 * @package Klabs\KTJBundle\KTJ\Aware\MachineKeyAware
 */
trait MachineKeyAwareTrait {
	/**
	 * @var null|string $machineKey
	 */
	protected $machineKey;

	/**
	 * @return null|string
	 */
	public function getMachineKey(): ?string {
		return $this->machineKey;
	}

	/**
	 * @param null|string $machineKey
	 *
	 * @return $this
	 */
	public function setMachineKey( ?string $machineKey ) {
		$this->machineKey = $machineKey;

		return $this;
	}
}
