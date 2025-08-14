<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BasicData;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Identity\Identity;

/**
 * Class BasicData
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BasicData
 */
class BasicData
{
    /**
     * @JMS\SerializedName("OperationMode")
     * @JMS\Type("string")
     * @var null|string $OperationMode
     */
    protected $OperationMode;
    /**
     * @JMS\SerializedName("Identity")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Identity\Identity")
     * @var null|Identity $Identity
     */
    protected $Identity;
    /**
     * @JMS\SerializedName("TrainNumber")
     * @JMS\Type("string")
     * @var null|string $TrainNumber
     */
    protected $TrainNumber;
    /**
     * @JMS\SerializedName("TrainDepartureDate")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $TrainDepartureDate
     */
    protected $TrainDepartureDate;

    /**
     * @return string|null
     */
    public function getOperationMode(): ?string
    {
        return $this->OperationMode;
    }

    /**
     * @param string|null $OperationMode
     */
    public function setOperationMode(?string $OperationMode): void
    {
        $this->OperationMode = $OperationMode;
    }

    /**
     * @return Identity|null
     */
    public function getIdentity(): ?Identity
    {
        return $this->Identity;
    }

    /**
     * @param Identity|null $Identity
     */
    public function setIdentity(?Identity $Identity): void
    {
        $this->Identity = $Identity;
    }

    /**
     * @return string|null
     */
    public function getTrainNumber(): ?string
    {
        return $this->TrainNumber;
    }

    /**
     * @param string|null $TrainNumber
     */
    public function setTrainNumber(?string $TrainNumber): void
    {
        $this->TrainNumber = $TrainNumber;
    }

    /**
     * @return DateTime|null
     */
    public function getTrainDepartureDate(): ?DateTime
    {
        return $this->TrainDepartureDate;
    }

    /**
     * @param DateTime|null $TrainDepartureDate
     */
    public function setTrainDepartureDate(?DateTime $TrainDepartureDate): void
    {
        $this->TrainDepartureDate = $TrainDepartureDate;
    }
}
