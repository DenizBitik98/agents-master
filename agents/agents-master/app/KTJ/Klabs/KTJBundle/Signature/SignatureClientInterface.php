<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 11.01.19
 * Time: 10:43
 */

namespace App\KTJ\Klabs\KTJBundle\Signature;

/**
 * Interface SignatureClientInterface
 * @package Klabs\KTJBundle\Signature
 */
interface SignatureClientInterface
{
    /**
     * Sign string data
     * @param string $data
     * @return string|null
     */
    function sign(string $data): ?string;
}
