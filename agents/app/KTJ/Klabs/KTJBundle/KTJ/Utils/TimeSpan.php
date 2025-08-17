<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 12/9/18
 * Time: 10:35 PM
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Utils;

use DateInterval;

/**
 * Class TimeSpan
 * @package Klabs\KTJBundle\KTJ\Utils
 */
class TimeSpan
{
    /**
     * @var null|DateInterval $interval
     */
    protected $interval = null;

    /**
     * @param string $timeSpan
     *
     * @return static
     * @throws \Exception
     */
    static function fromTimeSpan(string $timeSpan)
    {
        $tempo = explode(".", $timeSpan);
        if (count($tempo) > 1) {
            list($day, $hour, $minute, $second) = sscanf($timeSpan, '%x.%x:%x:%x');
        } else {
            $day = 0;
            list($hour, $minute, $second) = sscanf($timeSpan, '%x:%x:%x');
        }

        return new static (new DateInterval("P{$day}DT{$hour}H{$minute}M{$second}S"));
    }

    /**
     * TimeSpan constructor.
     *
     * @param DateInterval $dateInterval
     */
    public function __construct(DateInterval $dateInterval)
    {
        $this->interval = $dateInterval;
    }

    /**
     * @return DateInterval|null
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @return integer|null
     */
    public function getIntervalInSeconds()
    {
        return (((($this->interval->y * 365 + $this->interval->m * 30 + $this->interval->d) * 24) + $this->interval->h) * 60 + $this->interval->i) * 60 + $this->interval->s;
    }


    /**
     * @param DateInterval|null $interval
     *
     * @return TimeSpan
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;

        return $this;
    }
}
