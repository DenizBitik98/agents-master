<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 23.05.2018
 * Time: 16:45
 */

namespace App\KTJ\Klabs\KTJBundle\IdP\Aware\IdPAware;

use App\KTJ\Klabs\KTJBundle\IdP\IdPClientInterface;

/**
 * Trait TIdPAware
 * @package Klabs\KTJBundle\IdP\Aware\IdPAware
 */
trait TIdPAware {
	/**
	 * @var null|IdPClientInterface $idpClient
	 */
	protected $idpClient;

	/**
	 * @param IdPClientInterface|null $idpClient
	 *
	 * @return $this
	 */
	public function setIdpClient( ?IdPClientInterface $idpClient ) {
		$this->idpClient = $idpClient;

		return $this;
	}

	/**
	 * @return IdPClientInterface|null
	 */
	public function getIdpClient(): ?IdPClientInterface {
		return $this->idpClient;
	}
}
