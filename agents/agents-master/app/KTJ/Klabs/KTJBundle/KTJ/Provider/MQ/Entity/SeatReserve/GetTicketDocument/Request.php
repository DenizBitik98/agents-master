<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Request
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument
 */
class Request implements IRequest
{
    /**
     * @JMS\SerializedName("DocNumber")
     * @JMS\Type("int")
     * @var null|int $docNumber
     */
    protected $docNumber = "";

    /**
     * @JMS\SerializedName("Secret")
     * @JMS\Type("string")
     * @var null|string $secret
     */
    protected $secret = "";

    /**
     * @return string|null
     */
    public function getDocNumber(): ?string
    {
        return $this->docNumber;
    }

    /**
     * @param string|null $docNumber
     */
    public function setDocNumber(?string $docNumber): void
    {
        $this->docNumber = $docNumber;
    }

    /**
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @param string|null $secret
     */
    public function setSecret(?string $secret): void
    {
        $this->secret = $secret;
    }
}
