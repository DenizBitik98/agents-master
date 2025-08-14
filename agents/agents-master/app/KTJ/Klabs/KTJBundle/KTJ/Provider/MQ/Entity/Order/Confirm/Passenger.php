<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm;

use DateTime;

/**
 * Class Passenger
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm
 */
class Passenger
{
    /**
     * @var null|string $Document
     */
    protected $Document;
    /**
     * @var null|int $PassengerDocumentType
     */
    protected $PassengerDocumentType;
    /**
     * @var null|string $PassengerDocumentNumber
     */
    protected $PassengerDocumentNumber;
    /**
     * @var null|string $FullName
     */
    protected $FullName;
    /**
     * @var null|string $FirstName
     */
    protected $FirstName;
    /**
     * @var null|string $LastName
     */
    protected $LastName;
    /**
     * @var null|string $Patronymic
     */
    protected $Patronymic;
    /**
     * @var null|DateTime $DateOfBirth
     */
    protected $DateOfBirth;
    /**
     * @var null|int $Citizenship
     */
    protected $Citizenship;
    /**
     * @var null|int $Gender
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
     * @return Passenger
     */
    public function setDocument(?string $Document): Passenger
    {
        $this->Document = $Document;

        return $this;
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
     * @return Passenger
     */
    public function setPassengerDocumentType(?int $PassengerDocumentType): Passenger
    {
        $this->PassengerDocumentType = $PassengerDocumentType;

        return $this;
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
     * @return Passenger
     */
    public function setPassengerDocumentNumber(?string $PassengerDocumentNumber): Passenger
    {
        $this->PassengerDocumentNumber = $PassengerDocumentNumber;

        return $this;
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
     * @return Passenger
     */
    public function setFullName(?string $FullName): Passenger
    {
        $this->FullName = $FullName;

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
     * @return Passenger
     */
    public function setFirstName(?string $FirstName): Passenger
    {
        $this->FirstName = $FirstName;

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
     * @return Passenger
     */
    public function setLastName(?string $LastName): Passenger
    {
        $this->LastName = $LastName;

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
     * @return Passenger
     */
    public function setPatronymic(?string $Patronymic): Passenger
    {
        $this->Patronymic = $Patronymic;

        return $this;
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
     * @return Passenger
     */
    public function setDateOfBirth(?DateTime $DateOfBirth): Passenger
    {
        $this->DateOfBirth = $DateOfBirth;

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
     * @return Passenger
     */
    public function setCitizenship(?int $Citizenship): Passenger
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
     * @return Passenger
     */
    public function setGender(?int $Gender): Passenger
    {
        $this->Gender = $Gender;

        return $this;
    }
}
