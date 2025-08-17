<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem;

use DateTime;

/**
 * Class Period
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem
 */
class Period
{
    /**
     * @var null|DateTime $From
     */
    protected $From;
    /**
     * @var null|DateTime $To
     */
    protected $To;

    /**
     * Period constructor.
     * @param DateTime|null $From
     * @param DateTime|null $To
     */
    public function __construct(?DateTime $From, ?DateTime $To)
    {
        $this->setFrom($From);
        $this->setTo($To);
    }

    /**
     * @return DateTime|null
     */
    public function getFrom(): ?DateTime
    {
        return $this->From;
    }

    /**
     * @param DateTime|null $From
     * @return Period
     */
    public function setFrom(?DateTime $From): Period
    {
        $this->From = $From;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getTo(): ?DateTime
    {
        return $this->To;
    }

    /**
     * @param DateTime|null $To
     * @return Period
     */
    public function setTo(?DateTime $To): Period
    {
        $this->To = $To;

        return $this;
    }
}
