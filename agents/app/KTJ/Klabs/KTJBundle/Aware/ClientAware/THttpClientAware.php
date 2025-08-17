<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 23.08.2018
 * Time: 14:00
 */

namespace App\KTJ\Klabs\KTJBundle\Aware\ClientAware;

use GuzzleHttp\ClientInterface;

/**
 * Trait TClientAware
 * @package Klabs\KTJBundle\Aware\ClientAware
 */
trait THttpClientAware {
	/**
	 * @var null|ClientInterface $httpClient
	 */
	protected $httpClient;

	/**
	 * @return ClientInterface|null
	 */
	public function getHttpClient(): ?ClientInterface {
		return $this->httpClient;
	}

	/**
	 * @param ClientInterface|null $httpClient
	 *
	 * @return $this
	 */
	public function setHttpClient( ?ClientInterface $httpClient ) {
		$this->httpClient = $httpClient;

		return $this;
	}
}
