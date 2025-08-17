<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 18:56
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware;

use JMS\Serializer\SerializerInterface;

/**
 * Interface SerializerAwareInterface
 * @package Klabs\KTJBundle\KTJ\Aware\SerializerAware
 */
interface SerializerAwareInterface {
	/**
	 * @return null|SerializerInterface
	 */
	public function getSerializer(): ?SerializerInterface;
}
