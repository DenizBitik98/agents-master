<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Passenger;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class PassengersInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Passenger
 */
class PassengersInfo
{
    /**
     * @JMS\SerializedName("Document")
     * @JMS\Type("string")
     * @var null|string $Document
     */
    protected $Document;
    /**
     * @JMS\SerializedName("PassengerDocumentType")
     * @JMS\Type("int")
     * @var null|integer $PassengerDocumentType
     */
    protected $PassengerDocumentType;
    /**
     * @JMS\SerializedName("PassengerDocumentNumber")
     * @JMS\Type("string")
     * @var null|string $PassengerDocumentNumber
     */
    protected $PassengerDocumentNumber;
    /**
     * @JMS\SerializedName("FullName")
     * @JMS\Type("string")
     * @var null|string $FullName
     */
    protected $FullName;
    /**
     * @JMS\SerializedName("FirstName")
     * @JMS\Type("string")
     * @var null|string $FirstName
     */
    protected $FirstName;
    /**
     * @JMS\SerializedName("LastName")
     * @JMS\Type("string")
     * @var null|string $LastName
     */
    protected $LastName;
    /**
     * @JMS\SerializedName("Patronymic")
     * @JMS\Type("string")
     * @var null|string $Patronymic
     */
    protected $Patronymic;
    /**
     * @JMS\SerializedName("DateOfBirth")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $DateOfBirth
     */
    protected $DateOfBirth;
    /**
     * @JMS\SerializedName("Citizenship")
     * @JMS\Type("int")
     * @var null|integer $Citizenship
     */
    protected $Citizenship;
    /**
     * @JMS\SerializedName("Gender")
     * @JMS\Type("int")
     * @var null|integer $Gender
     */
    protected $Gender;

    /**
     * @return string|null
     */
    public function getDocument(): ?string
    {
        return $this->Document;
    }

    /**
     * @param string|null $Document
     */
    public function setDocument(?string $Document): void
    {
        $this->Document = $Document;
    }

    /**
     * @return int|null
     */
    public function getPassengerDocumentType(): ?int
    {
        return $this->PassengerDocumentType;
    }

    /**
     * @param int|null $PassengerDocumentType
     */
    public function setPassengerDocumentType(?int $PassengerDocumentType): void
    {
        $this->PassengerDocumentType = $PassengerDocumentType;
    }

    /**
     * @return string|null
     */
    public function getPassengerDocumentNumber(): ?string
    {
        return $this->PassengerDocumentNumber;
    }

    /**
     * @param string|null $PassengerDocumentNumber
     */
    public function setPassengerDocumentNumber(?string $PassengerDocumentNumber): void
    {
        $this->PassengerDocumentNumber = $PassengerDocumentNumber;
    }

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    /**
     * @param string|null $FullName
     */
    public function setFullName(?string $FullName): void
    {
        $this->FullName = $FullName;
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
     * @return DateTime|null
     */
    public function getDateOfBirth(): ?DateTime
    {
        return $this->DateOfBirth;
    }

    /**
     * @param DateTime|null $DateOfBirth
     */
    public function setDateOfBirth(?DateTime $DateOfBirth): void
    {
        $this->DateOfBirth = $DateOfBirth;
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
}
