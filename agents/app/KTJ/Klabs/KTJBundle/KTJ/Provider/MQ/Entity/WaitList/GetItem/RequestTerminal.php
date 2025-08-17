<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem;

/**
 * Class RequestTerminal
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem
 */
class RequestTerminal
{
    /**
     * @var null|int $Id
     */
    protected $Id;
    /**
     * @var null|string $Name
     */
    protected $Name;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->Id;
    }

    /**
     * @param int|null $Id
     * @return RequestTerminal
     */
    public function setId(?int $Id): RequestTerminal
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param string|null $Name
     * @return RequestTerminal
     */
    public function setName(?string $Name): RequestTerminal
    {
        $this->Name = $Name;

        return $this;
    }
}
