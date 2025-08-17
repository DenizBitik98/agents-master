<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 11.01.19
 * Time: 11:54
 */

namespace App\KTJ\Klabs\KTJBundle\Signature;

/**
 * Class Signature
 * @package App\KTJ\Klabs\KTJBundle\Signature
 */
class Signature implements SignatureClientInterface
{
    /**
     * @var null|SignatureClientInterface $signer
     */
    protected $signer;

    /**
     * @return SignatureClientInterface|null
     */
    public function getSigner(): ?SignatureClientInterface
    {
        return $this->signer;
    }

    /**
     * @param SignatureClientInterface|null $signer
     * @return Signature
     */
    public function setSigner(?SignatureClientInterface $signer): Signature
    {
        $this->signer = $signer;
        return $this;
    }

    /** @inheritdoc */
    function sign(string $data): ?string
    {
        return $this->getSigner()->sign($data);
    }
}
