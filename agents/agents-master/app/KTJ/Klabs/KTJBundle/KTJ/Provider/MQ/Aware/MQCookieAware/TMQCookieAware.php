<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 16:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware;

use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\CookieJarInterface;
use GuzzleHttp\Cookie\SetCookie;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait TMQCookieAware
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware
 */
trait TMQCookieAware
{
    /**
     * @var null|CookieJarInterface $mqCookies
     */
    protected $mqCookies = null;

    /**
     * @return null|CacheItemPoolInterface
     */
    abstract public function getCacheAdapter(): ?CacheItemPoolInterface;

    /**
     * @return CookieJarInterface|null
     */
    public function getMqCookies(): ?CookieJarInterface
    {
        return $this->mqCookies;
    }

    /**
     * @param CookieJarInterface|null $mqCookies
     *
     * @return $this
     */
    public function setMqCookies(?CookieJarInterface $mqCookies)
    {
        $this->mqCookies = $mqCookies;

        return $this;
    }

    /**
     * Try to save mq cookies to cache storage
     * @param ResponseInterface $response
     * @param string $cookieStorageName
     * @return bool
     * @throws InvalidArgumentException
     */
    function saveMQCookies(ResponseInterface $response, string $cookieStorageName)
    {
        $responseCookies = $response->getHeader('Set-Cookie');
        $newCookies = [];
        if (is_array($responseCookies)) {
            foreach ($responseCookies as $cookie) {
                $newCookies[] = SetCookie::fromString($cookie);
            }
        } else {
            $newCookies = [SetCookie::fromString($responseCookies)];
        }
        $responseCookies = $this->getCacheAdapter()->getItem($cookieStorageName);
        $responseCookies->expiresAfter(\DateInterval::createFromDateString('24 hours'));
        $responseCookies->set($newCookies);

        return $this->getCacheAdapter()->save($responseCookies);
    }

    /**
     * Load MQ cookies from cookie storage
     * @param string $storageName
     * @return CookieJarInterface|null
     * @throws InvalidArgumentException
     */
    function loadMQCookies(string $storageName): ?CookieJarInterface
    {
        if (($cookies = $this->getCacheAdapter()->getItem($storageName)
            ) && ($cookies->isHit())) {
            $items = $cookies->get();
        } else {
            $items = [];
        }

        return new CookieJar(false, $items);
    }
}
