<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem;

use DateTime;
use Doctrine\Common\Collections\Collection;

/**
 * Class BookingInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem
 */
class BookingInfo
{
    /**
     * @var null|int $TransactionId
     */
    protected $TransactionId;
    /**
     * @var null|DateTime $RequestTimeStamp
     */
    protected $RequestTimeStamp;
    /**
     * @var null|string $BookingIdentity
     */
    protected $BookingIdentity;
    /**
     * @var null|string $BookingTypeSign
     */
    protected $BookingTypeSign;
    /**
     * @var null|int $BookedSeatsCount
     */
    protected $BookedSeatsCount;
    /**
     * @var null|DateTime $PaymentDeadline
     */
    protected $PaymentDeadline;
    /**
     * @var null|string $BookingTypeCode
     */
    protected $BookingTypeCode;
    /**
     * @var null|string $TrainNumber
     */
    protected $TrainNumber;
    /**
     * @var null|DateTime $DepartureDateTime
     */
    protected $DepartureDateTime;
    /**
     * @var null|string $DepartureStationName
     */
    protected $DepartureStationName;
    /**
     * @var null|string $DepartureStationCode
     */
    protected $DepartureStationCode;
    /**
     * @var null|string $ArrivalStationName
     */
    protected $ArrivalStationName;
    /**
     * @var null|string $ArrivalStationCode
     */
    protected $ArrivalStationCode;
    /**
     * @var null|Collection|CarInfo[] $CarsInfo
     */
    protected $CarsInfo;
    /**
     * @var null|string $ProtectionCode
     */
    protected $ProtectionCode;
    /**
     * @var null|string $InfoMessage
     */
    protected $InfoMessage;
    /**
     * @var null|string $FKSNumber
     */
    protected $FKSNumber;
    /**
     * @var null|string $CashierFullName
     */
    protected $CashierFullName;

    /**
     * @return int|null
     */
    public function getTransactionId(): ?int
    {
        return $this->TransactionId;
    }

    /**
     * @param int|null $TransactionId
     * @return BookingInfo
     */
    public function setTransactionId(?int $TransactionId): BookingInfo
    {
        $this->TransactionId = $TransactionId;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getRequestTimeStamp(): ?DateTime
    {
        return $this->RequestTimeStamp;
    }

    /**
     * @param DateTime|null $RequestTimeStamp
     * @return BookingInfo
     */
    public function setRequestTimeStamp(?DateTime $RequestTimeStamp): BookingInfo
    {
        $this->RequestTimeStamp = $RequestTimeStamp;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBookingIdentity(): ?string
    {
        return $this->BookingIdentity;
    }

    /**
     * @param string|null $BookingIdentity
     * @return BookingInfo
     */
    public function setBookingIdentity(?string $BookingIdentity): BookingInfo
    {
        $this->BookingIdentity = $BookingIdentity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBookingTypeSign(): ?string
    {
        return $this->BookingTypeSign;
    }

    /**
     * @param string|null $BookingTypeSign
     * @return BookingInfo
     */
    public function setBookingTypeSign(?string $BookingTypeSign): BookingInfo
    {
        $this->BookingTypeSign = $BookingTypeSign;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBookedSeatsCount(): ?int
    {
        return $this->BookedSeatsCount;
    }

    /**
     * @param int|null $BookedSeatsCount
     * @return BookingInfo
     */
    public function setBookedSeatsCount(?int $BookedSeatsCount): BookingInfo
    {
        $this->BookedSeatsCount = $BookedSeatsCount;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getPaymentDeadline(): ?DateTime
    {
        return $this->PaymentDeadline;
    }

    /**
     * @param DateTime|null $PaymentDeadline
     * @return BookingInfo
     */
    public function setPaymentDeadline(?DateTime $PaymentDeadline): BookingInfo
    {
        $this->PaymentDeadline = $PaymentDeadline;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBookingTypeCode(): ?string
    {
        return $this->BookingTypeCode;
    }

    /**
     * @param string|null $BookingTypeCode
     * @return BookingInfo
     */
    public function setBookingTypeCode(?string $BookingTypeCode): BookingInfo
    {
        $this->BookingTypeCode = $BookingTypeCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrainNumber(): ?string
    {
        return $this->TrainNumber;
    }

    /**
     * @param string|null $TrainNumber
     * @return BookingInfo
     */
    public function setTrainNumber(?string $TrainNumber): BookingInfo
    {
        $this->TrainNumber = $TrainNumber;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureDateTime(): ?DateTime
    {
        return $this->DepartureDateTime;
    }

    /**
     * @param DateTime|null $DepartureDateTime
     * @return BookingInfo
     */
    public function setDepartureDateTime(?DateTime $DepartureDateTime): BookingInfo
    {
        $this->DepartureDateTime = $DepartureDateTime;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDepartureStationName(): ?string
    {
        return $this->DepartureStationName;
    }

    /**
     * @param string|null $DepartureStationName
     * @return BookingInfo
     */
    public function setDepartureStationName(?string $DepartureStationName): BookingInfo
    {
        $this->DepartureStationName = $DepartureStationName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDepartureStationCode(): ?string
    {
        return $this->DepartureStationCode;
    }

    /**
     * @param string|null $DepartureStationCode
     * @return BookingInfo
     */
    public function setDepartureStationCode(?string $DepartureStationCode): BookingInfo
    {
        $this->DepartureStationCode = $DepartureStationCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getArrivalStationName(): ?string
    {
        return $this->ArrivalStationName;
    }

    /**
     * @param string|null $ArrivalStationName
     * @return BookingInfo
     */
    public function setArrivalStationName(?string $ArrivalStationName): BookingInfo
    {
        $this->ArrivalStationName = $ArrivalStationName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getArrivalStationCode(): ?string
    {
        return $this->ArrivalStationCode;
    }

    /**
     * @param string|null $ArrivalStationCode
     * @return BookingInfo
     */
    public function setArrivalStationCode(?string $ArrivalStationCode): BookingInfo
    {
        $this->ArrivalStationCode = $ArrivalStationCode;

        return $this;
    }

    /**
     * @return Collection|CarInfo[]|null
     */
    public function getCarsInfo()
    {
        return $this->CarsInfo;
    }

    /**
     * @param Collection|CarInfo[]|null $CarsInfo
     * @return BookingInfo
     */
    public function setCarsInfo($CarsInfo)
    {
        $this->CarsInfo = $CarsInfo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProtectionCode(): ?string
    {
        return $this->ProtectionCode;
    }

    /**
     * @param string|null $ProtectionCode
     * @return BookingInfo
     */
    public function setProtectionCode(?string $ProtectionCode): BookingInfo
    {
        $this->ProtectionCode = $ProtectionCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInfoMessage(): ?string
    {
        return $this->InfoMessage;
    }

    /**
     * @param string|null $InfoMessage
     * @return BookingInfo
     */
    public function setInfoMessage(?string $InfoMessage): BookingInfo
    {
        $this->InfoMessage = $InfoMessage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFKSNumber(): ?string
    {
        return $this->FKSNumber;
    }

    /**
     * @param string|null $FKSNumber
     * @return BookingInfo
     */
    public function setFKSNumber(?string $FKSNumber): BookingInfo
    {
        $this->FKSNumber = $FKSNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCashierFullName(): ?string
    {
        return $this->CashierFullName;
    }

    /**
     * @param string|null $CashierFullName
     * @return BookingInfo
     */
    public function setCashierFullName(?string $CashierFullName): BookingInfo
    {
        $this->CashierFullName = $CashierFullName;

        return $this;
    }
}
