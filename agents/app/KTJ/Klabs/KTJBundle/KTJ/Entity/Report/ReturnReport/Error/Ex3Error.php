<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Error;

use JMS\Serializer\Annotation as JMS;
use \DateTime;

/**
 * Class Ex3Error
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Error
 */
class Ex3Error
{
    /**
     * @JMS\SerializedName("ErrorCode")
     * @JMS\Type("string")
     * @var null|string $ErrorCode
     */
    protected $ErrorCode;

    /**
     * @JMS\SerializedName("ErrorInfo")
     * @JMS\Type("string")
     * @var null|string $ErrorInfo
     */
    protected $ErrorInfo;

    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->ErrorCode;
    }

    /**
     * @param string|null $ErrorCode
     * @return Ex3Error
     */
    public function setErrorCode(?string $ErrorCode): Ex3Error
    {
        $this->ErrorCode = $ErrorCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrorInfo(): ?string
    {
        return $this->ErrorInfo;
    }

    /**
     * @param string|null $ErrorInfo
     * @return Ex3Error
     */
    public function setErrorInfo(?string $ErrorInfo): Ex3Error
    {
        $this->ErrorInfo = $ErrorInfo;

        return $this;
    }
}
