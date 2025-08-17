<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 14:39
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware;

use GuzzleHttp\Cookie\CookieJarInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\ICacheAdapterAware;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface DCTSCookieAwareInterface
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware
 */
interface IDCTSCookieAware extends ICacheAdapterAware {
	/**
	 * @return CookieJarInterface|null
	 */
	public function getDctsCookies(): ?CookieJarInterface;

	/**
	 * @param CookieJarInterface|null $dctsCookies
	 *
	 * @return $this
	 */
	public function setDctsCookies( ?CookieJarInterface $dctsCookies );

	/**
	 * @param ResponseInterface $response
	 */
	function saveDCTSCookies( ResponseInterface $response );

	/**
	 * @return CookieJarInterface|null
	 */
	function loadDCTSPCookies(): ?CookieJarInterface;
}
