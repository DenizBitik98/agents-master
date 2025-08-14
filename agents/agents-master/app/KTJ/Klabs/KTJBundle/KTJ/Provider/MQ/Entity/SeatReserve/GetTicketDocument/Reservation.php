<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument;

use \DateTime;
use JMS\Serializer\Annotation as JMS;

class Reservation
{
    /**
     * @JMS\SerializedName("Id")
     * @JMS\Type("int")
     * @var null|int $Id
     */
    protected $Id;
    /**
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     * @var null|string $Name
     */
    protected $Name;
    /**
     * @JMS\SerializedName("BeginDate")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $BeginDate
     */
    protected $BeginDate;
    /**
     * @JMS\SerializedName("EndDate")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $EndDate
     */
    protected $EndDate;
    /**
     * @JMS\SerializedName("SeatsUndef")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime SeatsUndef
     */
    protected $Validity;
    /**
     * @JMS\SerializedName("MaxReservationSeats")
     * @JMS\Type("int")
     * @var null|int $MaxReservationSeats
     */
    protected $MaxReservationSeats;
    /**
     * @JMS\SerializedName("NameTransformed")
     * @JMS\Type("string")
     * @var null|string $NameTransformed
     */
    protected $NameTransformed;
    /**
     * @JMS\SerializedName("Stamp")
     * @JMS\Type("string")
     * @var null|string $Stamp
     */
    protected $Stamp;
    /**
     * @JMS\SerializedName("CreateDate")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $CreateDate
     */
    protected $CreateDate;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->Id;
    }

    /**
     * @param int|null $Id
     */
    public function setId(?int $Id): void
    {
        $this->Id = $Id;
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
     */
    public function setName(?string $Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return DateTime|null
     */
    public function getBeginDate(): ?DateTime
    {
        return $this->BeginDate;
    }

    /**
     * @param DateTime|null $BeginDate
     */
    public function setBeginDate(?DateTime $BeginDate): void
    {
        $this->BeginDate = $BeginDate;
    }

    /**
     * @return DateTime|null
     */
    public function getEndDate(): ?DateTime
    {
        return $this->EndDate;
    }

    /**
     * @param DateTime|null $EndDate
     */
    public function setEndDate(?DateTime $EndDate): void
    {
        $this->EndDate = $EndDate;
    }

    /**
     * @return DateTime|null
     */
    public function getValidity(): ?DateTime
    {
        return $this->Validity;
    }

    /**
     * @param DateTime|null $Validity
     */
    public function setValidity(?DateTime $Validity): void
    {
        $this->Validity = $Validity;
    }

    /**
     * @return int|null
     */
    public function getMaxReservationSeats(): ?int
    {
        return $this->MaxReservationSeats;
    }

    /**
     * @param int|null $MaxReservationSeats
     */
    public function setMaxReservationSeats(?int $MaxReservationSeats): void
    {
        $this->MaxReservationSeats = $MaxReservationSeats;
    }

    /**
     * @return string|null
     */
    public function getNameTransformed(): ?string
    {
        return $this->NameTransformed;
    }

    /**
     * @param string|null $NameTransformed
     */
    public function setNameTransformed(?string $NameTransformed): void
    {
        $this->NameTransformed = $NameTransformed;
    }

    /**
     * @return string|null
     */
    public function getStamp(): ?string
    {
        return $this->Stamp;
    }

    /**
     * @param string|null $Stamp
     */
    public function setStamp(?string $Stamp): void
    {
        $this->Stamp = $Stamp;
    }

    /**
     * @return DateTime|null
     */
    public function getCreateDate(): ?DateTime
    {
        return $this->CreateDate;
    }

    /**
     * @param DateTime|null $CreateDate
     */
    public function setCreateDate(?DateTime $CreateDate): void
    {
        $this->CreateDate = $CreateDate;
    }
}
