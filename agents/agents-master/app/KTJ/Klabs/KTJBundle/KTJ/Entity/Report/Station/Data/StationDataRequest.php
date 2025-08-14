<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 10/26/18
 * Time: 4:59 PM
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class StationDataRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Station\Data
 */
class StationDataRequest implements IRequest {
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
     * StationDataRequest constructor.
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
     * @return StationDataRequest
     */
    public function setTimeStamp(?DateTime $TimeStamp): StationDataRequest {
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
     * @return StationDataRequest
     */
    public function setId(?int $Id): StationDataRequest {
        $this->Id = $Id;
        return $this;
    }
}
