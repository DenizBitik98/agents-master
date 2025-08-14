<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\ReturnInfo;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BasicData\BasicData;

/**
 * Class ReturnReferenceRequest
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\ReturnInfo
 */
class ReturnReferenceRequest implements IRequest
{
    /**
     * @JMS\SerializedName("BasicData")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BasicData\BasicData")
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
     * @JMS\SerializedName("WholeOrder")
     * @JMS\Type("bool")
     * @var null|boolean $WholeOrder
     */
    protected $WholeOrder;

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
     * @return bool|null
     */
    public function getWholeOrder(): ?bool
    {
        return $this->WholeOrder;
    }

    /**
     * @param bool|null $WholeOrder
     */
    public function setWholeOrder(?bool $WholeOrder): void
    {
        $this->WholeOrder = $WholeOrder;
    }
}
