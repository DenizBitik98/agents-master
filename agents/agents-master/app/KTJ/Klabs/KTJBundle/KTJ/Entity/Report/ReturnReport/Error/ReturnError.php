<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Error;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use DateTime;

/**
 * Class ReturnError
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Error
 */
class ReturnError
{
    /**
     * @JMS\SerializedName("Ex3Errors")
     * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Error\Ex3Error>")
     * @var null|Ex3Error[]|Collection $Ex3Errors
     */
    protected $Ex3Errors;

    /**
     * @JMS\SerializedName("ErrorTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $OperationTimeStamp
     */
    protected $ErrorTimeStamp;

    /**
     * @return Collection|Ex3Error[]|null
     */
    public function getEx3Errors()
    {
        return $this->Ex3Errors;
    }

    /**
     * @param $Ex3Errors
     * @return ReturnError
     */
    public function setEx3Errors($Ex3Errors): ReturnError
    {
        $this->Ex3Errors = $Ex3Errors;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getErrorTimeStamp(): ?DateTime
    {
        return $this->ErrorTimeStamp;
    }

    /**
     * @param DateTime|null $ErrorTimeStamp
     * @return ReturnError
     */
    public function setErrorTimeStamp(?DateTime $ErrorTimeStamp): ReturnError
    {
        $this->ErrorTimeStamp = $ErrorTimeStamp;

        return $this;
    }
}
