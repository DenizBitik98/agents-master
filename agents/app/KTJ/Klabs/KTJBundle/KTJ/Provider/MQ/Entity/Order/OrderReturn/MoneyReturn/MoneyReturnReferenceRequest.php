<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\MoneyReturn;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BasicData\BasicData;


/**
 * Class MoneyReturnReferenceRequest
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\MoneyReturn
 */
class MoneyReturnReferenceRequest
{
    /**
     * @JMS\SerializedName("Identity")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BasicData\BasicData\BasicData")
     * @var null|BasicData $BasicData
     */
    protected $BasicData;
    /**
     * @JMS\SerializedName("ReturnOption")
     * @JMS\Type("bool")
     * @var null|boolean $ReturnOption
     */
    protected $ReturnOption;
    /**
     * @JMS\SerializedName("ReturnMoneyReason")
     * @JMS\Type("string")
     * @var null|string $ReturnMoneyReason
     */
    protected $ReturnMoneyReason;
    /**
     * @JMS\SerializedName("TimeBeforeTrainDeparture")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null| DateTime $TimeBeforeTrainDeparture
     */
    protected $TimeBeforeTrainDeparture;
    /**
     * @JMS\SerializedName("Sum")
     * @JMS\Type("float")
     * @var null|float $Sum
     */
    protected $Sum;

    /**
     * @return BasicData|null
     */
    public function getBasicData(): ?BasicData
    {
        return $this->BasicData;
    }

    /**
     * @param BasicData|null $BasicData
     */
    public function setBasicData(?BasicData $BasicData): void
    {
        $this->BasicData = $BasicData;
    }

    /**
     * @return bool|null
     */
    public function getReturnOption(): ?bool
    {
        return $this->ReturnOption;
    }

    /**
     * @param bool|null $ReturnOption
     */
    public function setReturnOption(?bool $ReturnOption): void
    {
        $this->ReturnOption = $ReturnOption;
    }

    /**
     * @return string|null
     */
    public function getReturnMoneyReason(): ?string
    {
        return $this->ReturnMoneyReason;
    }

    /**
     * @param string|null $ReturnMoneyReason
     */
    public function setReturnMoneyReason(?string $ReturnMoneyReason): void
    {
        $this->ReturnMoneyReason = $ReturnMoneyReason;
    }

    /**
     * @return DateTime|null
     */
    public function getTimeBeforeTrainDeparture(): ?DateTime
    {
        return $this->TimeBeforeTrainDeparture;
    }

    /**
     * @param DateTime|null $TimeBeforeTrainDeparture
     */
    public function setTimeBeforeTrainDeparture(?DateTime $TimeBeforeTrainDeparture): void
    {
        $this->TimeBeforeTrainDeparture = $TimeBeforeTrainDeparture;
    }

    /**
     * @return float|null
     */
    public function getSum(): ?float
    {
        return $this->Sum;
    }

    /**
     * @param float|null $Sum
     */
    public function setSum(?float $Sum): void
    {
        $this->Sum = $Sum;
    }
}
