<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 12.01.19
 * Time: 19:11
 */

namespace App\KTJ\Klabs\KTJBundle\Signature\Aware\SignatureAware;

use App\KTJ\Klabs\KTJBundle\Signature\SignatureClientInterface;

/**
 * Interface ISignatureAware
 * @package Klabs\KTJBundle\Signature\Aware\SignatureAware
 */
interface ISignatureAware
{
    /**
     * @return SignatureClientInterface|null
     */
    public function getSignatureClient(): ?SignatureClientInterface;

    /**
     * @param SignatureClientInterface|null $signatureClient
     * @return $this
     */
    public function setSignatureClient(?SignatureClientInterface $signatureClient);
}
