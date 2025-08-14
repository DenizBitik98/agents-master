<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 11:16
 */

namespace App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware;

use GuzzleHttp\Cookie\CookieJarInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\ICacheAdapterAware;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface IdpCookieAwareInterface
 * @package Klabs\KTJBundle\IdP\Aware\IdpCookieAware
 */
interface IIdpCookieAware extends ICacheAdapterAware {
	/**
	 * @return CookieJarInterface|null
	 */
	public function getIdpCookies(): ?CookieJarInterface;

	/**
	 * @param CookieJarInterface|null $idpCookies
	 *
	 * @return $this
	 */
	public function setIdpCookies( ?CookieJarInterface $idpCookies );

	/**
	 * @param ResponseInterface $response
	 */
	function saveIdpCookies( ResponseInterface $response );

	/**
	 * @return CookieJarInterface|null
	 */
	function loadIdPCookies(): ?CookieJarInterface;
}
