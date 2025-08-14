<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.05.2018
 * Time: 13:15
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware;

use Psr\Cache\CacheItemPoolInterface;

/**
 * Interface ICacheAdapterAware
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware
 */
interface ICacheAdapterAware {
	/**
	 * @param null|CacheItemPoolInterface $cacheAdapter
	 *
	 * @return $this
	 */
	public function setCacheAdapter( ?CacheItemPoolInterface $cacheAdapter );
}
