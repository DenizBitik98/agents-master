<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\ReturnInfo;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BoardingInfo\BoardingInfo;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\OrderInfo\OrderInfo;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\ReturnInfo\ReturnInfo;

/**
 * Class ReturnReferenceResponse
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\ReturnInfo
 */
class ReturnReferenceResponse implements IResponse
{
    /**
     * @JMS\SerializedName("ReturnInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\ReturnInfo\ReturnInfo")
     * @var null|Collection|ReturnInfo[] $ReturnInfo
     */
    protected $ReturnInfo;
    /**
     * @JMS\SerializedName("OrderInfo")
     * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\OrderInfo\OrderInfo>")
     * @var null|Collection|OrderInfo[] $OrderInfo
     */
    protected $OrderInfo;
    /**
     * @JMS\SerializedName("BoardingInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BoardingInfo\BoardingInfo")
     * @var null|BoardingInfo $BoardingInfo
     */
    protected $BoardingInfo;

    /**
     * @param int|null $ReturnId
     */
    public function setReturnId(?int $ReturnId): void
    {
        $this->ReturnId = $ReturnId;
    }

    /**
     * @return Collection|ReturnInfo[]|null
     */
    public function getReturnInfo()
    {
        return $this->ReturnInfo;
    }

    /**
     * @param Collection|ReturnInfo[]|null $ReturnInfo
     */
    public function setReturnInfo($ReturnInfo): void
    {
        $this->ReturnInfo = $ReturnInfo;
    }

    /**
     * @return Collection|OrderInfo[]|null
     */
    public function getOrderInfo()
    {
        return $this->OrderInfo;
    }

    /**
     * @param Collection|OrderInfo[]|null $OrderInfo
     */
    public function setOrderInfo($OrderInfo): void
    {
        $this->OrderInfo = $OrderInfo;
    }

    /**
     * @return BoardingInfo|null
     */
    public function getBoardingInfo(): ?BoardingInfo
    {
        return $this->BoardingInfo;
    }

    /**
     * @param BoardingInfo|null $BoardingInfo
     */
    public function setBoardingInfo(?BoardingInfo $BoardingInfo): void
    {
        $this->BoardingInfo = $BoardingInfo;
    }
}
