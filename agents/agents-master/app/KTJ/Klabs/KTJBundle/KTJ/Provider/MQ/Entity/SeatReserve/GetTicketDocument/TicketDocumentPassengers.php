<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument;

use \DateTime;
use JMS\Serializer\Annotation as JMS;

class TicketDocumentPassengers
{
    /**
     * @JMS\SerializedName("TariffType")
     * @JMS\Type("int")
     * @var null|int $TariffType
     */
    protected $TariffType;
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
     * @var null|DateTime $BirthDate
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
     * @JMS\SerializedName("EmailAddress")
     * @JMS\Type("string")
     * @var null|string $EmailAddress
     */
    protected $EmailAddress;
    /**
     * @JMS\SerializedName("PhoneNumber")
     * @JMS\Type("string")
     * @var null|string $PhoneNumber
     */
    protected $PhoneNumber;

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
     * @return DateTime|null
     */
    public function getBirthDate(): ?DateTime
    {
        return $this->BirthDate;
    }

    /**
     * @param DateTime|null $BirthDate
     */
    public function setBirthDate(?DateTime $BirthDate): void
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
     * @return string|null
     */
    public function getEmailAddress(): ?string
    {
        return $this->EmailAddress;
    }

    /**
     * @param string|null $EmailAddress
     */
    public function setEmailAddress(?string $EmailAddress): void
    {
        $this->EmailAddress = $EmailAddress;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    /**
     * @param string|null $PhoneNumber
     */
    public function setPhoneNumber(?string $PhoneNumber): void
    {
        $this->PhoneNumber = $PhoneNumber;
    }
}
