<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm;

/**
 * Class PayerInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm
 */
class PayerInfo
{
    /**
     * @var null|string $Name
     */
    protected $Name;
    /**
     * @var null|string $Bin
     */
    protected $Bin;
    /**
     * @var null|string $NDSCertificate
     */
    protected $NDSCertificate;
    /**
     * @var null|bool $IsAgent
     */
    protected $IsAgent;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param string|null $Name
     * @return PayerInfo
     */
    public function setName(?string $Name): PayerInfo
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBin(): ?string
    {
        return $this->Bin;
    }

    /**
     * @param string|null $Bin
     * @return PayerInfo
     */
    public function setBin(?string $Bin): PayerInfo
    {
        $this->Bin = $Bin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNDSCertificate(): ?string
    {
        return $this->NDSCertificate;
    }

    /**
     * @param string|null $NDSCertificate
     * @return PayerInfo
     */
    public function setNDSCertificate(?string $NDSCertificate): PayerInfo
    {
        $this->NDSCertificate = $NDSCertificate;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsAgent(): ?bool
    {
        return $this->IsAgent;
    }

    /**
     * @param bool|null $IsAgent
     * @return PayerInfo
     */
    public function setIsAgent(?bool $IsAgent): PayerInfo
    {
        $this->IsAgent = $IsAgent;

        return $this;
    }
}
