<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class TicketTransportRequirement
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class TicketTransportRequirement
{
    /**
     * @var null|string $DependentFullName
     */
    protected $DependentFullName;

    /**
     * @return string|null
     */
    public function getDependentFullName(): ?string
    {
        return $this->DependentFullName;
    }

    /**
     * @param string|null $DependentFullName
     * @return TicketTransportRequirement
     */
    public function setDependentFullName(?string $DependentFullName): TicketTransportRequirement
    {
        $this->DependentFullName = $DependentFullName;

        return $this;
    }
}
