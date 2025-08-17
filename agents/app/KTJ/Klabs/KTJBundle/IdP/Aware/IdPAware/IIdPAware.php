<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 23.05.2018
 * Time: 16:47
 */

namespace App\KTJ\Klabs\KTJBundle\IdP\Aware\IdPAware;

use App\KTJ\Klabs\KTJBundle\IdP\IdPClientInterface;

/**
 * Interface IIdPAware
 * @package Klabs\KTJBundle\IdP\Aware\IdPAware
 */
interface IIdPAware {
	/**
	 * @param IdPClientInterface|null $idpClient
	 *
	 * @return $this
	 */
	public function setIdpClient( ?IdPClientInterface $idpClient );
}
