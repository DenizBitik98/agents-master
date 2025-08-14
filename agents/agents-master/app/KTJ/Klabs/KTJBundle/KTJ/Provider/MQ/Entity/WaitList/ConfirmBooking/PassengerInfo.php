<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking;

use DateTime;

/**
 * Class PassengerInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking
 */
class PassengerInfo
{
    /**
     * @var null|int $TariffType
     */
    protected $TariffType;
    /**
     * @var null|string $PreferenceInfo
     */
    protected $PreferenceInfo;
    /**
     * @var null|string $LastName
     */
    protected $LastName;
    /**
     * @var null|string $FirstName
     */
    protected $FirstName;
    /**
     * @var null|string $Patronymic
     */
    protected $Patronymic;
    /**
     * @var null|int $DocumentType
     */
    protected $DocumentType;
    /**
     * @var null|string $DocumentNumber
     */
    protected $DocumentNumber;
    /**
     * @var null|DateTime $BirthDate
     */
    protected $BirthDate;
    /**
     * @var null|int $Citizenship
     */
    protected $Citizenship;
    /**
     * @var null|int $Gender
     */
    protected $Gender;
    /**
     * @var null|int $BirthPlace
     */
    protected $BirthPlace;

    /**
     * @return int|null
     */
    public function getTariffType(): ?int
    {
        return $this->TariffType;
    }

    /**
     * @param int|null $TariffType
     * @return PassengerInfo
     */
    public function setTariffType(?int $TariffType): PassengerInfo
    {
        $this->TariffType = $TariffType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPreferenceInfo(): ?string
    {
        return $this->PreferenceInfo;
    }

    /**
     * @param string|null $PreferenceInfo
     * @return PassengerInfo
     */
    public function setPreferenceInfo(?string $PreferenceInfo): PassengerInfo
    {
        $this->PreferenceInfo = $PreferenceInfo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    /**
     * @param string|null $LastName
     * @return PassengerInfo
     */
    public function setLastName(?string $LastName): PassengerInfo
    {
        $this->LastName = $LastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    /**
     * @param string|null $FirstName
     * @return PassengerInfo
     */
    public function setFirstName(?string $FirstName): PassengerInfo
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPatronymic(): ?string
    {
        return $this->Patronymic;
    }

    /**
     * @param string|null $Patronymic
     * @return PassengerInfo
     */
    public function setPatronymic(?string $Patronymic): PassengerInfo
    {
        $this->Patronymic = $Patronymic;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDocumentType(): ?int
    {
        return $this->DocumentType;
    }

    /**
     * @param int|null $DocumentType
     * @return PassengerInfo
     */
    public function setDocumentType(?int $DocumentType): PassengerInfo
    {
        $this->DocumentType = $DocumentType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDocumentNumber(): ?string
    {
        return $this->DocumentNumber;
    }

    /**
     * @param string|null $DocumentNumber
     * @return PassengerInfo
     */
    public function setDocumentNumber(?string $DocumentNumber): PassengerInfo
    {
        $this->DocumentNumber = $DocumentNumber;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getBirthDate(): ?DateTime
    {
        return $this->BirthDate;
    }

    /**
     * @param DateTime|null $BirthDate
     * @return PassengerInfo
     */
    public function setBirthDate(?DateTime $BirthDate): PassengerInfo
    {
        $this->BirthDate = $BirthDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCitizenship(): ?int
    {
        return $this->Citizenship;
    }

    /**
     * @param int|null $Citizenship
     * @return PassengerInfo
     */
    public function setCitizenship(?int $Citizenship): PassengerInfo
    {
        $this->Citizenship = $Citizenship;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGender(): ?int
    {
        return $this->Gender;
    }

    /**
     * @param int|null $Gender
     * @return PassengerInfo
     */
    public function setGender(?int $Gender): PassengerInfo
    {
        $this->Gender = $Gender;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBirthPlace(): ?int
    {
        return $this->BirthPlace;
    }

    /**
     * @param int|null $BirthPlace
     * @return PassengerInfo
     */
    public function setBirthPlace(?int $BirthPlace): PassengerInfo
    {
        $this->BirthPlace = $BirthPlace;

        return $this;
    }
}
