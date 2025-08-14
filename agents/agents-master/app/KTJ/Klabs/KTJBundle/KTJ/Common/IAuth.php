<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 14:41
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common;

use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\IdpCookieAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\IProviderAwareInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class IAuth
 * @package Klabs\KTJBundle\KTJ\Common
 */
interface IAuth extends IdpCookieAwareInterface, IProviderAwareInterface {
	/**
	 * @param string|null $idpToken
	 *
	 * @return ResponseInterface
	 */
	function authSafe( string $idpToken = null ): ?ResponseInterface;

	/**
	 * @param string|null $idpToken
	 *
	 * @return ResponseInterface
	 */
	function auth( string $idpToken = null ): ?ResponseInterface;
}
