<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\Finalize;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class ReturnFinalizeRequest
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\Finalize
 */
class ReturnFinalizeRequest implements IRequest
{
    /**
     * ReturnFinalizeRequest constructor.
     * @param integer|null $Id
     */
    public function __construct(?int $Id)
    {
        $this->setId($Id);
    }

    /**
     * @JMS\SerializedName("Id")
     * @JMS\Type("int")
     * @var null|integer $Id
     */
    protected $Id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->Id;
    }

    /**
     * @param int|null $Id
     */
    public function setId(?int $Id): void
    {
        $this->Id = $Id;
    }
}
