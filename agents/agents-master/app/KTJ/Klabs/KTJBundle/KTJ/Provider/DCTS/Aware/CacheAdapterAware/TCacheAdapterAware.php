<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.05.2018
 * Time: 13:14
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware;

use Psr\Cache\CacheItemPoolInterface;

/**
 * Trait TCacheAdapterAware
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware
 */
trait TCacheAdapterAware {
	/**
	 * @var null|CacheItemPoolInterface $cacheAdapter
	 */
	protected $cacheAdapter;

	/**
	 * @param null|CacheItemPoolInterface $cacheAdapter
	 *
	 * @return $this
	 */
	public function setCacheAdapter( ?CacheItemPoolInterface $cacheAdapter ) {
		$this->cacheAdapter = $cacheAdapter;

		return $this;
	}

	/**
	 * @return null|CacheItemPoolInterface
	 */
	public function getCacheAdapter(): ?CacheItemPoolInterface {
		return $this->cacheAdapter;
	}
}
