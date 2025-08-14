<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class Notification
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class Notification
{
    /**
     * @var null|string $PersonName
     */
    protected $PersonName;
    /**
     * @var null|Email $EmailRequestDto
     */
    protected $EmailRequestDto;
    /**
     * @var null|Phone $PhoneRequestDto
     */
    protected $PhoneRequestDto;

    /**
     * @return string|null
     */
    public function getPersonName(): ?string
    {
        return $this->PersonName;
    }

    /**
     * @param string|null $PersonName
     * @return Notification
     */
    public function setPersonName(?string $PersonName): Notification
    {
        $this->PersonName = $PersonName;
        return $this;
    }

    /**
     * @return Email|null
     */
    public function getEmailRequestDto(): ?Email
    {
        return $this->EmailRequestDto;
    }

    /**
     * @param Email|null $EmailRequestDto
     * @return Notification
     */
    public function setEmailRequestDto(?Email $EmailRequestDto): Notification
    {
        $this->EmailRequestDto = $EmailRequestDto;
        return $this;
    }

    /**
     * @return Phone|null
     */
    public function getPhoneRequestDto(): ?Phone
    {
        return $this->PhoneRequestDto;
    }

    /**
     * @param Phone|null $PhoneRequestDto
     * @return Notification
     */
    public function setPhoneRequestDto(?Phone $PhoneRequestDto): Notification
    {
        $this->PhoneRequestDto = $PhoneRequestDto;
        return $this;
    }
}
