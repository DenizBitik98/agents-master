<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;


use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class Request
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class Request implements IRequest
{
    /**
     * @var null|TripRequirement $TripRequirements
     */
    protected $TripRequirements;
    /**
     * @var null|Collection|BlankInfo[] $Blanks
     */
    protected $Blanks;
    /**
     * @var null|Collection|Notification[] $Notifications
     */
    protected $Notifications;

    /**
     * @return TripRequirement|null
     */
    public function getTripRequirements(): ?TripRequirement
    {
        return $this->TripRequirements;
    }

    /**
     * @param TripRequirement|null $TripRequirements
     * @return Request
     */
    public function setTripRequirements(?TripRequirement $TripRequirements): Request
    {
        $this->TripRequirements = $TripRequirements;

        return $this;
    }

    /**
     * @return Collection|BlankInfo[]|null
     */
    public function getBlanks()
    {
        return $this->Blanks;
    }

    /**
     * @param Collection|BlankInfo[]|null $Blanks
     * @return Request
     */
    public function setBlanks($Blanks)
    {
        $this->Blanks = $Blanks;

        return $this;
    }

    /**
     * @return Collection|Notification[]|null
     */
    public function getNotifications()
    {
        return $this->Notifications;
    }

    /**
     * @param Collection|Notification[]|null $Notifications
     * @return Request
     */
    public function setNotifications($Notifications)
    {
        $this->Notifications = $Notifications;
        return $this;
    }
}
