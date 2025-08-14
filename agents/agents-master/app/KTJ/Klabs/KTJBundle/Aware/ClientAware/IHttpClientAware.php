<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 23.08.2018
 * Time: 14:03
 */

namespace App\KTJ\Klabs\KTJBundle\Aware\ClientAware;

use GuzzleHttp\ClientInterface;

/**
 * Interface IClientAware
 * @package Klabs\KTJBundle\Aware\ClientAware
 */
interface IHttpClientAware {
	/**
	 * @return ClientInterface|null
	 */
	public function getHttpClient(): ?ClientInterface;

	/**
	 * @param ClientInterface|null $httpClient
	 *
	 * @return $this
	 */
	public function setHttpClient( ?ClientInterface $httpClient );
}
