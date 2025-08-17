<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;

use JMS\Serializer\Annotation as JMS;


class PassengerInfo
{
    /**
     * @JMS\SerializedName("TariffType")
     * @JMS\Type("int")
     * @var null|int $TariffType
     */
    protected $TariffType;
    /**
     * @JMS\SerializedName("TariffSubType")
     * @JMS\Type("int")
     * @var null|int $TariffSubType
     */
    protected $TariffSubType;
    /**
     * @JMS\SerializedName("PreferenceInfo")
     * @JMS\Type("string")
     * @var null|string $PreferenceInfo
     */
    protected $PreferenceInfo;
    /**
     * @JMS\SerializedName("LastName")
     * @JMS\Type("string")
     * @var null|string $LastName
     */
    protected $LastName;
    /**
     * @JMS\SerializedName("FirstName")
     * @JMS\Type("string")
     * @var null|string $FirstName
     */
    protected $FirstName;
    /**
     * @JMS\SerializedName("Patronymic")
     * @JMS\Type("string")
     * @var null|string $Patronymic
     */
    protected $Patronymic;
    /**
     * @JMS\SerializedName("DocumentType")
     * @JMS\Type("int")
     * @var null|int $DocumentType
     */
    protected $DocumentType;
    /**
     * @JMS\SerializedName("DocumentNumber")
     * @JMS\Type("string")
     * @var null|string $DocumentNumber
     */
    protected $DocumentNumber;
    /**
     * @JMS\SerializedName("BirthDate")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|\DateTime $BirthDate
     */
    protected $BirthDate;
    /**
     * @JMS\SerializedName("Citizenship")
     * @JMS\Type("int")
     * @var null|int $Citizenship
     */
    protected $Citizenship;
    /**
     * @JMS\SerializedName("Gender")
     * @JMS\Type("int")
     * @var null|int $Gender
     */
    protected $Gender;
    /**
     * @JMS\SerializedName("Iin")
     * @JMS\Type("string")
     * @var null|string $Iin
     */
    protected $Iin;
    /**
     * @JMS\SerializedName("Email")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\Email")
     * @var null|Email $Email
     */
    protected $Email;
    /**
     * @JMS\SerializedName("Phone")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\Phone")
     * @var null|Phone $Phone
     */
    protected $Phone;
    /**
     * @JMS\SerializedName("WithoutPlace")
     * @JMS\Type("bool")
     * @var null|bool $WithoutPlace
     */
    protected $WithoutPlace;
    /**
     * @JMS\SerializedName("OccupationCode")
     * @JMS\Type("string")
     * @var null|string $OccupationCode
     */
    protected $OccupationCode;
    /**
     * @JMS\SerializedName("GroupPassengerBooking")
     * @JMS\Type("bool")
     * @var null|bool $GroupPassengerBooking
     */
    protected $GroupPassengerBooking;

    /**
     * @return int|null
     */
    public function getTariffType(): ?int
    {
        return $this->TariffType;
    }

    /**
     * @param int|null $TariffType
     */
    public function setTariffType(?int $TariffType): void
    {
        $this->TariffType = $TariffType;
    }

    /**
     * @return int|null
     */
    public function getTariffSubType(): ?int
    {
        return $this->TariffSubType;
    }

    /**
     * @param int|null $TariffSubType
     */
    public function setTariffSubType(?int $TariffSubType): void
    {
        $this->TariffSubType = $TariffSubType;
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
     */
    public function setPreferenceInfo(?string $PreferenceInfo): void
    {
        $this->PreferenceInfo = $PreferenceInfo;
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
     */
    public function setLastName(?string $LastName): void
    {
        $this->LastName = $LastName;
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
     */
    public function setFirstName(?string $FirstName): void
    {
        $this->FirstName = $FirstName;
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
     */
    public function setPatronymic(?string $Patronymic): void
    {
        $this->Patronymic = $Patronymic;
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
     */
    public function setDocumentType(?int $DocumentType): void
    {
        $this->DocumentType = $DocumentType;
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
     */
    public function setDocumentNumber(?string $DocumentNumber): void
    {
        $this->DocumentNumber = $DocumentNumber;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirthDate(): ?\DateTime
    {
        return $this->BirthDate;
    }

    /**
     * @param \DateTime|null $BirthDate
     */
    public function setBirthDate(?\DateTime $BirthDate): void
    {
        $this->BirthDate = $BirthDate;
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
     */
    public function setCitizenship(?int $Citizenship): void
    {
        $this->Citizenship = $Citizenship;
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
     */
    public function setGender(?int $Gender): void
    {
        $this->Gender = $Gender;
    }

    /**
     * @return string|null
     */
    public function getIin(): ?string
    {
        return $this->Iin;
    }

    /**
     * @param string|null $Iin
     */
    public function setIin(?string $Iin): void
    {
        $this->Iin = $Iin;
    }

    /**
     * @return Email|null
     */
    public function getEmail(): ?Email
    {
        return $this->Email;
    }

    /**
     * @param Email|null $Email
     */
    public function setEmail(?Email $Email): void
    {
        $this->Email = $Email;
    }

    /**
     * @return Phone|null
     */
    public function getPhone(): ?Phone
    {
        return $this->Phone;
    }

    /**
     * @param Phone|null $Phone
     */
    public function setPhone(?Phone $Phone): void
    {
        $this->Phone = $Phone;
    }

    /**
     * @return bool|null
     */
    public function getWithoutPlace(): ?bool
    {
        return $this->WithoutPlace;
    }

    /**
     * @param bool|null $WithoutPlace
     */
    public function setWithoutPlace(?bool $WithoutPlace): void
    {
        $this->WithoutPlace = $WithoutPlace;
    }

    /**
     * @return string|null
     */
    public function getOccupationCode(): ?string
    {
        return $this->OccupationCode;
    }

    /**
     * @param string|null $OccupationCode
     */
    public function setOccupationCode(?string $OccupationCode): void
    {
        $this->OccupationCode = $OccupationCode;
    }

    /**
     * @return bool|null
     */
    public function getGroupPassengerBooking(): ?bool
    {
        return $this->GroupPassengerBooking;
    }

    /**
     * @param bool|null $GroupPassengerBooking
     */
    public function setGroupPassengerBooking(?bool $GroupPassengerBooking): void
    {
        $this->GroupPassengerBooking = $GroupPassengerBooking;
    }
}
