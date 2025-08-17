<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 17:12
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\EventListener;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\ICacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware\IMQCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware\TMQCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;
use Psr\Cache\InvalidArgumentException;

/**
 * Class CookieEventListener
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\EventListener
 */
class CookieEventListener implements ICacheAdapterAware, IMQCookieAware
{
    use TCacheAdapterAware;
    use TMQCookieAware;
    /**
     * @var null|string $cacheAdapterStorageKey
     */
    protected $cacheAdapterStorageKey;

    /**
     * @param null|string $cacheAdapterStorageKey
     *
     * @return CookieEventListener
     */
    public function setCacheAdapterStorageKey(?string $cacheAdapterStorageKey): CookieEventListener
    {
        $this->cacheAdapterStorageKey = $cacheAdapterStorageKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCacheAdapterStorageKey(): ?string
    {
        return $this->cacheAdapterStorageKey;
    }

    /**
     * Event occurs before making api call
     *
     * @param BeforeRequestEvent $event
     *
     * @throws InvalidArgumentException
     */
    function setProviderCookies(BeforeRequestEvent $event)
    {
        /** @var IController $controller */
        $controller = $event->getController();
        /** @var Provider $provider */
        $provider = $controller->getProvider();
        $provider->setMqCookies($this->loadMQCookies($this->getCacheAdapterStorageKey()));
    }
}
