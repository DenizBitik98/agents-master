<?php


namespace App\ViewModels\Sale\Railway\Buy;

use \DateTime;

class BlankForm
{
    /**
     * @var null|boolean $useDiscount
     */
    protected $useDiscount = false;
    /**
     * @var null|string $discount
     */
    protected $discount;
    /**
     * @var null|string $tariffType
     */
    protected $tariffType;
    /**
     * @var null|string $documentType
     */
    protected $documentType;
    /**
     * @var null|string $document
     */
    protected $document;
    /**
     * @var null|string $surname
     */
    protected $surname;
    /**
     * @var null|string $name
     */
    protected $name;
    /**
     * @var null|string $lastName
     */
    protected $lastName;
    /**
     * @var null|DateTime $birthday
     */
    protected $birthday;
    /**
     * @var null|string $citizenship
     */
    protected $citizenship;
    /**
     * @var null|string $iin
     */
    protected $iin;
    /**
     * @var null|boolean $passengerIinEnabled
     */
    protected $passengerIinEnabled;
    /**
     * @var null|int $sex
     */
    protected $sex;
    /**
     * @var null|string $phone
     *
     */
    protected $phone;
    /**
     * @var null|bool $withoutPlace
     */
    protected $withoutPlace;
    /**
     * @var null|boolean $isInvalidOptionEnabled
     */
    protected $isInvalidOptionEnabled;
    /**
     * @var null|boolean $consentCPPD
     */
    protected $consentCPPD;

    /**
     * @var null|string $code
     */
    protected $code;
    /**
     * @var null|string $disabilityCard
     */
    protected $disabilityCard;
    /**
     * @var null|string $passengerIin
     */
    protected $passengerIin;
    /**
     * @var null|bool $savePassenger
     */
    protected $savePassenger;


    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return DateTime|null
     */
    public function getBirthday(): ?DateTime
    {
        return $this->birthday;
    }

    /**
     * @param DateTime|null $birthday
     */
    public function setBirthday(?DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string|null
     */
    public function getCitizenship(): ?string
    {
        return $this->citizenship;
    }

    /**
     * @param string|null $citizenship
     */
    public function setCitizenship(?string $citizenship): void
    {
        $this->citizenship = $citizenship;
    }

    /**
     * @return string|null
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * @param string|null $documentType
     */
    public function setDocumentType(?string $documentType): void
    {
        $this->documentType = $documentType;
    }

    /**
     * @return string|null
     */
    public function getDocument(): ?string
    {
        return $this->document;
    }

    /**
     * @param string|null $document
     */
    public function setDocument(?string $document): void
    {
        $this->document = $document;
    }

    /**
     * @return bool|null
     */
    public function getUseDiscount(): ?bool
    {
        return $this->useDiscount;
    }

    /**
     * @param bool|null $useDiscount
     */
    public function setUseDiscount(?bool $useDiscount): void
    {
        $this->useDiscount = $useDiscount;
    }

    /**
     * @return string|null
     */
    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    /**
     * @param string|null $discount
     */
    public function setDiscount(?string $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return string|null
     */
    public function getTariffType(): ?string
    {
        return $this->tariffType;
    }

    /**
     * @param string|null $tariffType
     */
    public function setTariffType(?string $tariffType): void
    {
        $this->tariffType = $tariffType;
    }

    /**
     * @return int|null
     */
    public function getSex(): ?int
    {
        return $this->sex;
    }

    /**
     * @param int|null $sex
     */
    public function setSex(?int $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return bool|null
     */
    public function getWithoutPlace(): ?bool
    {
        return $this->withoutPlace;
    }

    /**
     * @param bool|null $withoutPlace
     */
    public function setWithoutPlace(?bool $withoutPlace): void
    {
        $this->withoutPlace = $withoutPlace;
    }

    /**
     * @return bool|null
     */
    public function getIsInvalidOptionEnabled(): ?bool
    {
        return $this->isInvalidOptionEnabled;
    }

    /**
     * @param bool|null $isInvalidOptionEnabled
     */
    public function setIsInvalidOptionEnabled(?bool $isInvalidOptionEnabled): void
    {
        $this->isInvalidOptionEnabled = $isInvalidOptionEnabled;
    }

    /**
     * @return bool|null
     */
    public function getConsentCPPD(): ?bool
    {
        return $this->consentCPPD;
    }

    /**
     * @param bool|null $consentCPPD
     */
    public function setConsentCPPD(?bool $consentCPPD): void
    {
        $this->consentCPPD = $consentCPPD;
    }

    /**
     * @return string|null
     */
    public function getIin(): ?string
    {
        return $this->iin;
    }

    /**
     * @param string|null $iin
     */
    public function setIin(?string $iin): void
    {
        $this->iin = $iin;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string|null
     */
    public function getDisabilityCard(): ?string
    {
        return $this->disabilityCard;
    }

    /**
     * @param string|null $disabilityCard
     */
    public function setDisabilityCard(?string $disabilityCard): void
    {
        $this->disabilityCard = $disabilityCard;
    }

    /**
     * @return string|null
     */
    public function getPassengerIin(): ?string
    {
        return $this->passengerIin;
    }

    /**
     * @param string|null $passengerIin
     */
    public function setPassengerIin(?string $passengerIin): void
    {
        $this->passengerIin = $passengerIin;
    }

    /**
     * @return bool|null
     */
    public function getPassengerIinEnabled(): ?bool
    {
        return $this->passengerIinEnabled;
    }

    /**
     * @param bool|null $passengerIinEnabled
     */
    public function setPassengerIinEnabled(?bool $passengerIinEnabled): void
    {
        $this->passengerIinEnabled = $passengerIinEnabled;
    }

    /**
     * @return bool|null
     */
    public function getSavePassenger(): ?bool
    {
        return $this->savePassenger;
    }

    /**
     * @param bool|null $savePassenger
     */
    public function setSavePassenger(?bool $savePassenger): void
    {
        $this->savePassenger = $savePassenger;
    }
}
