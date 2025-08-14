<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 14:02
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware;
/**
 * Interface MachineKeyAwareInterface
 * @package Klabs\KTJBundle\KTJ\Aware\MachineKeyAware
 */
interface MachineKeyAwareInterface {
	/**
	 * @return null|string
	 */
	public function getMachineKey(): ?string;
}
