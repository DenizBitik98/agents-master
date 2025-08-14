<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Identity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Identity
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common
 */
class Identity
{
    /**
     * @JMS\SerializedName("ByExpressId")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Identity\ByExpressId")
     * @var null|ByExpressId $ByExpressId
     */
    protected $ByExpressId;
    /**
     * @JMS\SerializedName("ByBlankIdentity")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Identity\ByBlankIdentity")
     * @var null|ByBlankIdentity $ByBlankIdentity
     */
    protected $ByBlankIdentity;
    /**
     * @JMS\SerializedName("ByBlankIdentityWithSeries")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Identity\ByBlankIdentityWithSeries")
     * @var null|ByBlankIdentityWithSeries $ByBlankIdentityWithSeries
     */
    protected $ByBlankIdentityWithSeries;

    /**
     * @return ByExpressId|null
     */
    public function getByExpressId(): ?ByExpressId
    {
        return $this->ByExpressId;
    }

    /**
     * @param ByExpressId|null $ByExpressId
     */
    public function setByExpressId(?ByExpressId $ByExpressId): void
    {
        $this->ByExpressId = $ByExpressId;
    }

    /**
     * @return ByBlankIdentity|null
     */
    public function getByBlankIdentity(): ?ByBlankIdentity
    {
        return $this->ByBlankIdentity;
    }

    /**
     * @param ByBlankIdentity|null $ByBlankIdentity
     */
    public function setByBlankIdentity(?ByBlankIdentity $ByBlankIdentity): void
    {
        $this->ByBlankIdentity = $ByBlankIdentity;
    }

    /**
     * @return ByBlankIdentityWithSeries|null
     */
    public function getByBlankIdentityWithSeries(): ?ByBlankIdentityWithSeries
    {
        return $this->ByBlankIdentityWithSeries;
    }

    /**
     * @param ByBlankIdentityWithSeries|null $ByBlankIdentityWithSeries
     */
    public function setByBlankIdentityWithSeries(?ByBlankIdentityWithSeries $ByBlankIdentityWithSeries): void
    {
        $this->ByBlankIdentityWithSeries = $ByBlankIdentityWithSeries;
    }
}
