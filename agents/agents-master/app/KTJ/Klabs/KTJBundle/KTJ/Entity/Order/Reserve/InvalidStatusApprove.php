<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class InvalidStatusApprove
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class InvalidStatusApprove
{
    /**
     * @JMS\SerializedName("ConsentCPPD")
     * @JMS\Type("boolean")
     * @var null|bool $consentCPPD
     */
    protected $consentCPPD;
    /**
     * @JMS\SerializedName("Iin")
     * @JMS\Type("string")
     * @var null|string $iin
     */
    protected $iin;
    /**
     * @JMS\SerializedName("Code")
     * @JMS\Type("string")
     * @var null|string $code
     */
    protected $code;

    /**
     * @return bool|null
     */
    public function getConsentCPPD(): ?bool
    {
        return $this->consentCPPD;
    }

    /**
     * @param bool|null $consentCPPD
     * @return InvalidStatusApprove
     */
    public function setConsentCPPD(?bool $consentCPPD): InvalidStatusApprove
    {
        $this->consentCPPD = $consentCPPD;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIin(): ?string
    {
        return $this->iin;
    }

    /**
     * @param string|null $iin
     * @return InvalidStatusApprove
     */
    public function setIin(?string $iin): InvalidStatusApprove
    {
        $this->iin = $iin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     * @return InvalidStatusApprove
     */
    public function setCode(?string $code): InvalidStatusApprove
    {
        $this->code = $code;

        return $this;
    }
}
