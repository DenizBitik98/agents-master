<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 14:38
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware;

use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\CookieJarInterface;
use GuzzleHttp\Cookie\SetCookie;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait DCTSCookieAwareTrait
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware
 */
trait TDCTSCookieAware {
	/**
	 * @var null|string $dctsCookieStorageKey
	 */
	protected $dctsCookieStorageKey;
	/**
	 * @var null|CookieJarInterface $dctsCookies
	 */
	protected $dctsCookies = null;

	/**
	 * @return null|CacheItemPoolInterface
	 */
	abstract public function getCacheAdapter(): ?CacheItemPoolInterface;

	/**
	 * @return CookieJarInterface|null
	 */
	public function getDctsCookies(): ?CookieJarInterface {
		return $this->dctsCookies;
	}

	/**
	 * @param CookieJarInterface|null $dctsCookies
	 *
	 * @return $this
	 */
	public function setDctsCookies( ?CookieJarInterface $dctsCookies ) {
		$this->dctsCookies = $dctsCookies;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getDctsCookieStorageKey(): ?string {
		return $this->dctsCookieStorageKey;
	}

	/**
	 * @param null|string $dctsCookieStorageKey
	 *
	 * @return $this
	 */
	public function setDctsCookieStorageKey( ?string $dctsCookieStorageKey ) {
		$this->dctsCookieStorageKey = $dctsCookieStorageKey;

		return $this;
	}

	/**
	 * Try to save dcts cookies to cache storage
	 *
	 * @param ResponseInterface $response
	 *
	 * @return bool
	 * @throws \Psr\Cache\InvalidArgumentException
	 */
	function saveDCTSCookies( ResponseInterface $response ) {
		$responseCookies = $response->getHeader( 'Set-Cookie' );
		$newCookies      = [];
		if ( is_array( $responseCookies ) )
		{
			foreach ( $responseCookies as $cookie )
			{
				$newCookies[] = SetCookie::fromString( $cookie );
			}
		}
		else
		{
			$newCookies = [ SetCookie::fromString( $responseCookies ) ];
		}
		$responseCookies = $this->getCacheAdapter()->getItem( $this->dctsCookieStorageKey );

        $responseCookies->expiresAfter(\DateInterval::createFromDateString('24 hours'));
		$responseCookies->set( $newCookies );

		return $this->getCacheAdapter()->save( $responseCookies );
	}

	/**
	 * Load DCTS cookies from cookie storage
	 * @return CookieJarInterface|null
	 * @throws \Psr\Cache\InvalidArgumentException
	 */
	function loadDCTSPCookies(): ?CookieJarInterface {
		if ( ( $cookies = $this->getCacheAdapter()->getItem( $this->dctsCookieStorageKey )
		     ) && ( $cookies->isHit() ) )
		{
			$items = $cookies->get();
		}
		else
		{
			$items = [];
		}

		return new CookieJar( false, $items );
	}
}
