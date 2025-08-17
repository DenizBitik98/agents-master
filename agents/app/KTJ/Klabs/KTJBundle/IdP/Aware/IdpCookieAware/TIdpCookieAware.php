<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 11:15
 */

namespace App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware;

use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\CookieJarInterface;
use GuzzleHttp\Cookie\SetCookie;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait IdpCookieAware
 * @package Klabs\KTJBundle\IdP\Aware\IdpCookieAware
 */
trait TIdpCookieAware {
	/**
	 * @var null|CookieJarInterface $idpCookies
	 */
	protected $idpCookies;
	/**
	 * @var null|string $idpCookieStorageKey
	 */
	protected $idpCookieStorageKey;

	/**
	 * @return null|CacheItemPoolInterface
	 */
	abstract public function getCacheAdapter(): ?CacheItemPoolInterface;

	/**
	 * @return CookieJarInterface|null
	 */
	public function getIdpCookies(): ?CookieJarInterface {
		return $this->idpCookies;
	}

	/**
	 * @param CookieJarInterface|null $idpCookies
	 *
	 * @return $this
	 */
	public function setIdpCookies( ?CookieJarInterface $idpCookies ) {
		$this->idpCookies = $idpCookies;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getIdpCookieStorageKey(): ?string {
		return $this->idpCookieStorageKey;
	}

	/**
	 * @param null|string $idpCookieStorageKey
	 *
	 * @return $this
	 */
	public function setIdpCookieStorageKey( ?string $idpCookieStorageKey ) {
		$this->idpCookieStorageKey = $idpCookieStorageKey;

		return $this;
	}

	/**
	 * Try to save idp cookies to cache storage
	 *
	 * @param ResponseInterface $response
	 *
	 * @return bool
	 * @throws \Psr\Cache\InvalidArgumentException
	 */
	function saveIdpCookies( ResponseInterface $response ) {
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
		$responseCookies = $this->getCacheAdapter()->getItem( $this->idpCookieStorageKey );
		$responseCookies->set( $newCookies );

		return $this->getCacheAdapter()->save( $responseCookies );
	}

	/**
	 * Load IdP cookies from cookie storage
	 * @return CookieJarInterface|null
	 * @throws \Psr\Cache\InvalidArgumentException
	 */
	function loadIdPCookies(): ?CookieJarInterface {
		if ( ( $cookies = $this->getCacheAdapter()->getItem( $this->idpCookieStorageKey )
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
