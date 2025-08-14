<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class Request
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem
 */
class Request implements IRequest
{
    /**
     * @var null|int $Identity
     */
    protected $Identity;
    /**
     * @var null|string $ProtectionCode
     */
    protected $ProtectionCode;

    /**
     * Request constructor.
     * @param int|null $Identity
     * @param string|null $ProtectionCode
     */
    public function __construct(?int $Identity = null, ?string $ProtectionCode = null)
    {
        $this->setIdentity($Identity);
        $this->setProtectionCode($ProtectionCode);
    }

    /**
     * @return int|null
     */
    public function getIdentity(): ?int
    {
        return $this->Identity;
    }

    /**
     * @param int|null $Identity
     * @return Request
     */
    public function setIdentity(?int $Identity): Request
    {
        $this->Identity = $Identity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProtectionCode(): ?string
    {
        return $this->ProtectionCode;
    }

    /**
     * @param string|null $ProtectionCode
     * @return Request
     */
    public function setProtectionCode(?string $ProtectionCode): Request
    {
        $this->ProtectionCode = $ProtectionCode;

        return $this;
    }
}
