<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 12.01.19
 * Time: 19:10
 */

namespace App\KTJ\Klabs\KTJBundle\Signature\Aware\SignatureAware;

use App\KTJ\Klabs\KTJBundle\Signature\SignatureClientInterface;

/**
 * Trait TSignatureAware
 * @package Klabs\KTJBundle\Signature\Aware\SignatureAware
 */
trait TSignatureAware
{
    /**
     * @var null|SignatureClientInterface $signatureClient
     */
    protected $signatureClient;

    /**
     * @return SignatureClientInterface|null
     */
    public function getSignatureClient(): ?SignatureClientInterface
    {
        return $this->signatureClient;
    }

    /**
     * @param SignatureClientInterface|null $signatureClient
     * @return $this
     */
    public function setSignatureClient(?SignatureClientInterface $signatureClient)
    {
        $this->signatureClient = $signatureClient;
        return $this;
    }
}
