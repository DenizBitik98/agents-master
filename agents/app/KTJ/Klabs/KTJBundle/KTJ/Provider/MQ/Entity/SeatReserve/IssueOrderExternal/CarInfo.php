<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;

use JMS\Serializer\Annotation as JMS;

class CarInfo
{
    /**
     * @JMS\SerializedName("CarType")
     * @JMS\Type("string")
     * @var null|string $CarType
     */
    protected $CarType;
    /**
     * @JMS\SerializedName("ServiceClass")
     * @JMS\Type("string")
     * @var null|string $ServiceClass
     */
    protected $ServiceClass;
    /**
     * @JMS\SerializedName("GlobalServiceClass")
     * @JMS\Type("string")
     * @var null|string $GlobalServiceClass
     */
    protected $GlobalServiceClass;
    /**
     * @JMS\SerializedName("CarNumber")
     * @JMS\Type("string")
     * @var null|string $CarNumber
     */
    protected $CarNumber;
    /**
     * @JMS\SerializedName("Road")
     * @JMS\Type("string")
     * @var null|string $Road
     */
    protected $Road;
    /**
     * @JMS\SerializedName("CarrierMnemocode")
     * @JMS\Type("string")
     * @var null|string $CarrierMnemocode
     */
    protected $CarrierMnemocode;

    /**
     * @return string|null
     */
    public function getCarType(): ?string
    {
        return $this->CarType;
    }

    /**
     * @param string|null $CarType
     */
    public function setCarType(?string $CarType): void
    {
        $this->CarType = $CarType;
    }

    /**
     * @return string|null
     */
    public function getServiceClass(): ?string
    {
        return $this->ServiceClass;
    }

    /**
     * @param string|null $ServiceClass
     */
    public function setServiceClass(?string $ServiceClass): void
    {
        $this->ServiceClass = $ServiceClass;
    }

    /**
     * @return string|null
     */
    public function getGlobalServiceClass(): ?string
    {
        return $this->GlobalServiceClass;
    }

    /**
     * @param string|null $GlobalServiceClass
     */
    public function setGlobalServiceClass(?string $GlobalServiceClass): void
    {
        $this->GlobalServiceClass = $GlobalServiceClass;
    }

    /**
     * @return string|null
     */
    public function getCarNumber(): ?string
    {
        return $this->CarNumber;
    }

    /**
     * @param string|null $CarNumber
     */
    public function setCarNumber(?string $CarNumber): void
    {
        $this->CarNumber = $CarNumber;
    }

    /**
     * @return string|null
     */
    public function getRoad(): ?string
    {
        return $this->Road;
    }

    /**
     * @param string|null $Road
     */
    public function setRoad(?string $Road): void
    {
        $this->Road = $Road;
    }

    /**
     * @return string|null
     */
    public function getCarrierMnemocode(): ?string
    {
        return $this->CarrierMnemocode;
    }

    /**
     * @param string|null $CarrierMnemocode
     */
    public function setCarrierMnemocode(?string $CarrierMnemocode): void
    {
        $this->CarrierMnemocode = $CarrierMnemocode;
    }
}
