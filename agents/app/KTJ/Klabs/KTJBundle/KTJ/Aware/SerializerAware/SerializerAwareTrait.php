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
 * Trait SerializerAwareTrait
 * @package Klabs\KTJBundle\KTJ\Aware\SerializerAware
 */
trait SerializerAwareTrait {
	/**
	 * @var null|SerializerInterface $serializer
	 */
	protected $serializer;

	/**
	 * @return null|SerializerInterface
	 */
	public function getSerializer(): ?SerializerInterface {
		return $this->serializer;
	}

	/**
	 * @param null|SerializerInterface $serializer
	 *
	 * @return $this
	 */
	public function setSerializer( ?SerializerInterface $serializer ) {
		$this->serializer = $serializer;

		return $this;
	}
}
