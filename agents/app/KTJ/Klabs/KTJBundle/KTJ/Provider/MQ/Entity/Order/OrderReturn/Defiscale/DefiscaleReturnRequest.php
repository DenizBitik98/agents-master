<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\Defiscale;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class DefiscaleReturnRequest
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\Defiscale
 */
class DefiscaleReturnRequest implements IRequest
{
    /**
     * @JMS\SerializedName("ReturnId")
     * @JMS\Type("int")
     * @var null|integer $ReturnId
     */
    protected $ReturnId;
    /**
     * @JMS\SerializedName("Refunds")
     * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\Defiscale\Refund>")
     * @var null|Collection|Refund[] $Refunds
     */
    protected $Refunds;

    /**
     * @return int|null
     */
    public function getReturnId(): ?int
    {
        return $this->ReturnId;
    }

    /**
     * @param int|null $ReturnId
     */
    public function setReturnId(?int $ReturnId): void
    {
        $this->ReturnId = $ReturnId;
    }

    /**
     * @return Collection|Refund[]|null
     */
    public function getRefunds()
    {
        return $this->Refunds;
    }

    /**
     * @param Collection|Refund[]|null $Refunds
     */
    public function setRefunds($Refunds): void
    {
        $this->Refunds = $Refunds;
    }
}
