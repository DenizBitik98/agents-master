<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 10/29/18
 * Time: 11:59 AM
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Next
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Station\Data
 */
class Next {
    /**
     * @JMS\SerializedName("TimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u'>")
     * @var null|DateTime $TimeStamp
     */
    protected $TimeStamp;
    /**
     * @JMS\SerializedName("Id")
     * @JMS\Type("int")
     * @var null|int $Id
     */
    protected $Id;

    /**
     * Next constructor.
     * @param DateTime|null $TimeStamp
     * @param int|null $Id
     */
    public function __construct(?DateTime $TimeStamp, ?int $Id) {
        $this->setTimeStamp($TimeStamp);
        $this->setId($Id);
    }

    /**
     * @return DateTime|null
     */
    public function getTimeStamp(): ?DateTime {
        return $this->TimeStamp;
    }

    /**
     * @param DateTime|null $TimeStamp
     * @return Next
     */
    public function setTimeStamp(?DateTime $TimeStamp): Next {
        $this->TimeStamp = $TimeStamp;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->Id;
    }

    /**
     * @param int|null $Id
     * @return Next
     */
    public function setId(?int $Id): Next {
        $this->Id = $Id;
        return $this;
    }
}
