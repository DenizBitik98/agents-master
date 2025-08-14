<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 16:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware;

use GuzzleHttp\Cookie\CookieJarInterface;
use Psr\Cache\InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface IMQCookieAware
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware
 */
interface IMQCookieAware
{
    /**
     * @return CookieJarInterface|null
     */
    public function getMqCookies(): ?CookieJarInterface;

    /**
     * @param CookieJarInterface|null $dctsCookies
     *
     * @return $this
     */
    public function setMqCookies(?CookieJarInterface $dctsCookies);

    /**
     * Try to save mq cookies to cache storage
     * @param ResponseInterface $response
     * @param string $cookieStorageName
     * @return bool
     * @throws InvalidArgumentException
     */
    function saveMQCookies(ResponseInterface $response, string $cookieStorageName);

    /**
     * Load MQ cookies from cookie storage
     * @param string $storageName
     * @return CookieJarInterface|null
     * @throws InvalidArgumentException
     */
    function loadMQCookies(string $storageName): ?CookieJarInterface;
}
