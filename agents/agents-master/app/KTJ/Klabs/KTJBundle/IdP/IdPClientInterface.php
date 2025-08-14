<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 23.05.2018
 * Time: 16:39
 */

namespace App\KTJ\Klabs\KTJBundle\IdP;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface IdPInterface
 * @package Klabs\KTJBundle\IdP
 */
interface IdPClientInterface
{
    /**
     * @param string $login
     * @param string $password
     * @return ResponseInterface
     */
    function getToken(string $login, string $password): ResponseInterface;
}
