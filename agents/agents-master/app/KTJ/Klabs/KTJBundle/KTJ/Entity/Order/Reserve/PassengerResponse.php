<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 2:39
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class PassengerResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class PassengerResponse
{
    /**
     * @JMS\SerializedName("Doc")
     * @JMS\Type("string")
     * @var null|string $Doc
     */
    protected $Doc;
    /**
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     * @var null|string $Name
     */
    protected $Name;
    /**
     * @JMS\SerializedName("BirthDay")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $BirthDay
     */
    protected $BirthDay;
    /**
     * @JMS\SerializedName("Citizenship")
     * @JMS\Type("string")
     * @var null|string $Citizenship
     */
    protected $Citizenship;
    /**
     * @JMS\SerializedName("Sex")
     * @JMS\Type("int")
     * @var null|int $Sex
     */
    protected $Sex;
    /**
     * @JMS\SerializedName("ChildInfo")
     * @JMS\Type("string")
     * @var null|string $ChildInfo
     */
    protected $ChildInfo;
    /**
     * @JMS\SerializedName("Iin")
     * @JMS\Type("string")
     * @var null|string $Iin
     */
    protected $Iin;
    /**
     * @JMS\SerializedName("InternalDoc")
     * @JMS\Type("string")
     * @var null|string $InternalDoc
     */
    protected $InternalDoc;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param null|string $Name
     *
     * @return PassengerResponse
     */
    public function setName(?string $Name): PassengerResponse
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDoc(): ?string
    {
        return $this->Doc;
    }

    /**
     * @param null|string $Doc
     *
     * @return PassengerResponse
     */
    public function setDoc(?string $Doc): PassengerResponse
    {
        $this->Doc = $Doc;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getBirthDay(): ?DateTime
    {
        return $this->BirthDay;
    }

    /**
     * @param DateTime|null $BirthDay
     *
     * @return PassengerResponse
     */
    public function setBirthDay(?DateTime $BirthDay): PassengerResponse
    {
        $this->BirthDay = $BirthDay;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCitizenship(): ?string
    {
        return $this->Citizenship;
    }

    /**
     * @param null|string $Citizenship
     *
     * @return PassengerResponse
     */
    public function setCitizenship(?string $Citizenship): PassengerResponse
    {
        $this->Citizenship = $Citizenship;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSex(): ?int
    {
        return $this->Sex;
    }

    /**
     * @param int|null $Sex
     *
     * @return PassengerResponse
     */
    public function setSex(?int $Sex): PassengerResponse
    {
        $this->Sex = $Sex;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getChildInfo(): ?string
    {
        return $this->ChildInfo;
    }

    /**
     * @param null|string $ChildInfo
     *
     * @return PassengerResponse
     */
    public function setChildInfo(?string $ChildInfo): PassengerResponse
    {
        $this->ChildInfo = $ChildInfo;

        return $this;
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
     * @return $this
     */
    public function setIin(?string $Iin): PassengerResponse
    {
        $this->Iin = $Iin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInternalDoc(): ?string
    {
        return $this->InternalDoc;
    }

    /**
     * @param string|null $InternalDoc
     * @return $this
     */
    public function setInternalDoc(?string $InternalDoc): PassengerResponse
    {
        $this->InternalDoc = $InternalDoc;

        return $this;
    }
}
