<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 23:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Datetime
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class Datetime
{
    /**
     * @JMS\SerializedName("Date")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|\DateTime $Date
     */
    protected $Date;
    /**
     * @JMS\SerializedName("Time")
     * @JMS\Type("string")
     * @var null|string $Time
     */
    protected $Time;
    /**
     * @JMS\SerializedName("Stop")
     * @JMS\Type("string")
     * @var null|string $Stop
     */
    protected $Stop;

    /**
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->Date;
    }

    /**
     * @param \DateTime|null $Date
     *
     * @return DateTime
     */
    public function setDate(?\DateTime $Date): DateTime
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTime(): ?string
    {
        return $this->Time;
    }

    /**
     * @param null|string $Time
     *
     * @return DateTime
     */
    public function setTime(?string $Time): DateTime
    {
        $this->Time = $Time;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getStop(): ?string
    {
        return $this->Stop;
    }

    /**
     * @param null|string $Stop
     *
     * @return DateTime
     */
    public function setStop(?string $Stop): DateTime
    {
        $this->Stop = $Stop;

        return $this;
    }
}
