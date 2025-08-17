<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class Terminal
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class Terminal
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
     * @return Terminal
     */
    public function setId(?int $Id): Terminal
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
     * @return Terminal
     */
    public function setName(?string $Name): Terminal
    {
        $this->Name = $Name;

        return $this;
    }
}
