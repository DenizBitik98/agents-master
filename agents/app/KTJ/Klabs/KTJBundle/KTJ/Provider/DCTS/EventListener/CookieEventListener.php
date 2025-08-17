<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 23:31
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\EventListener;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\ICacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware\IDCTSCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware\TDCTSCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;
use Psr\Cache\InvalidArgumentException;

/**
 * Class CookieEventListener
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\EventListener
 */
class CookieEventListener implements ICacheAdapterAware, IDCTSCookieAware {
	use TCacheAdapterAware;
	use TDCTSCookieAware;
	/**
	 * @var null|string $cacheAdapterStorageKey
	 */
	protected $cacheAdapterStorageKey;

	/**
	 * @param null|string $cacheAdapterStorageKey
	 *
	 * @return CookieEventListener
	 */
	public function setCacheAdapterStorageKey( ?string $cacheAdapterStorageKey ): CookieEventListener {
		$this->cacheAdapterStorageKey = $cacheAdapterStorageKey;

		return $this;
	}

	/**
	 * Event occurs before making api call
	 *
	 * @param BeforeRequestEvent $event
	 *
	 * @throws InvalidArgumentException
	 */
	function setProviderCookies( BeforeRequestEvent $event ) {
		/** @var IController $controller */
		$controller = $event->getController();
		/** @var Provider $provider */
		$provider = $controller->getProvider();
		$provider->setDctsCookies( $this->loadDCTSPCookies() );
	}
}
