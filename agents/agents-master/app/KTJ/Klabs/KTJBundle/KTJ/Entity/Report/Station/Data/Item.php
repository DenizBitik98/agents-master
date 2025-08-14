<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 10/26/18
 * Time: 5:05 PM
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data;

use \DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Item
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Station\Data
 */
class Item
{
    /**
     * @JMS\SerializedName("Id")
     * @JMS\Type("int")
     * @var null|int $Id
     */
    protected $Id;
    /**
     * @JMS\SerializedName("StationCode")
     * @JMS\Type("string")
     * @var null|string $StationCode
     */
    protected $StationCode;
    /**
     * @JMS\SerializedName("StationNameShort")
     * @JMS\Type("string")
     * @var null|string $StationNameShort
     */
    protected $StationNameShort;
    /**
     * @JMS\SerializedName("StationNameFull")
     * @JMS\Type("string")
     * @var null|string $StationNameFull
     */
    protected $StationNameFull;
    /**
     * @JMS\SerializedName("RailwayCode")
     * @JMS\Type("string")
     * @var null|string $RailwayCode
     */
    protected $RailwayCode;
    /**
     * @JMS\SerializedName("RailwayTlf")
     * @JMS\Type("string")
     * @var null|string $RailwayTlf
     */
    protected $RailwayTlf;
    /**
     * @JMS\SerializedName("RailwayName")
     * @JMS\Type("string")
     * @var null|string $RailwayName
     */
    protected $RailwayName;
    /**
     * @JMS\SerializedName("CountryCode")
     * @JMS\Type("string")
     * @var null|string $CountryCode
     */
    protected $CountryCode;
    /**
     * @JMS\SerializedName("CountryTlf")
     * @JMS\Type("string")
     * @var null|string $CountryTlf
     */
    protected $CountryTlf;
    /**
     * @JMS\SerializedName("CountryName")
     * @JMS\Type("string")
     * @var null|string $CountryName
     */
    protected $CountryName;
    /**
     * @JMS\SerializedName("BaseCode")
     * @JMS\Type("string")
     * @var null|string $BaseCode
     */
    protected $BaseCode;
    /**
     * @JMS\SerializedName("SepNumber")
     * @JMS\Type("string")
     * @var null|string $SepNumber
     */
    protected $SepNumber;
    /**
     * @JMS\SerializedName("Sf")
     * @JMS\Type("string")
     * @var null|string $Sf
     */
    protected $Sf;
    /**
     * @JMS\SerializedName("Okato")
     * @JMS\Type("string")
     * @var null|string $Okato
     */
    protected $Okato;
    /**
     * @JMS\SerializedName("BaseStation")
     * @JMS\Type("bool")
     * @var null|bool $BaseStation
     */
    protected $BaseStation;
    /**
     * @JMS\SerializedName("DateModified")
     * @JMS\Type("string")
     * @var null|DateTime $DateModified
     */
    protected $DateModified;
    /**
     * @JMS\SerializedName("StationType")
     * @JMS\Type("int")
     * @var null|int $StationType
     */
    protected $StationType;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->Id;
    }

    /**
     * @param int|null $Id
     * @return Item
     */
    public function setId(?int $Id): Item
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getStationCode(): ?string
    {
        return $this->StationCode;
    }

    /**
     * @param null|string $StationCode
     * @return Item
     */
    public function setStationCode(?string $StationCode): Item
    {
        $this->StationCode = $StationCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getStationNameShort(): ?string
    {
        return $this->StationNameShort;
    }

    /**
     * @param null|string $StationNameShort
     * @return Item
     */
    public function setStationNameShort(?string $StationNameShort): Item
    {
        $this->StationNameShort = $StationNameShort;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getStationNameFull(): ?string
    {
        return $this->StationNameFull;
    }

    /**
     * @param null|string $StationNameFull
     * @return Item
     */
    public function setStationNameFull(?string $StationNameFull): Item
    {
        $this->StationNameFull = $StationNameFull;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRailwayCode(): ?string
    {
        return $this->RailwayCode;
    }

    /**
     * @param null|string $RailwayCode
     * @return Item
     */
    public function setRailwayCode(?string $RailwayCode): Item
    {
        $this->RailwayCode = $RailwayCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRailwayTlf(): ?string
    {
        return $this->RailwayTlf;
    }

    /**
     * @param null|string $RailwayTlf
     * @return Item
     */
    public function setRailwayTlf(?string $RailwayTlf): Item
    {
        $this->RailwayTlf = $RailwayTlf;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRailwayName(): ?string
    {
        return $this->RailwayName;
    }

    /**
     * @param null|string $RailwayName
     * @return Item
     */
    public function setRailwayName(?string $RailwayName): Item
    {
        $this->RailwayName = $RailwayName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCountryCode(): ?string
    {
        return $this->CountryCode;
    }

    /**
     * @param null|string $CountryCode
     * @return Item
     */
    public function setCountryCode(?string $CountryCode): Item
    {
        $this->CountryCode = $CountryCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCountryTlf(): ?string
    {
        return $this->CountryTlf;
    }

    /**
     * @param null|string $CountryTlf
     * @return Item
     */
    public function setCountryTlf(?string $CountryTlf): Item
    {
        $this->CountryTlf = $CountryTlf;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCountryName(): ?string
    {
        return $this->CountryName;
    }

    /**
     * @param null|string $CountryName
     * @return Item
     */
    public function setCountryName(?string $CountryName): Item
    {
        $this->CountryName = $CountryName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getBaseCode(): ?string
    {
        return $this->BaseCode;
    }

    /**
     * @param null|string $BaseCode
     * @return Item
     */
    public function setBaseCode(?string $BaseCode): Item
    {
        $this->BaseCode = $BaseCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSepNumber(): ?string
    {
        return $this->SepNumber;
    }

    /**
     * @param null|string $SepNumber
     * @return Item
     */
    public function setSepNumber(?string $SepNumber): Item
    {
        $this->SepNumber = $SepNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSf(): ?string
    {
        return $this->Sf;
    }

    /**
     * @param null|string $Sf
     * @return Item
     */
    public function setSf(?string $Sf): Item
    {
        $this->Sf = $Sf;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkato(): ?string
    {
        return $this->Okato;
    }

    /**
     * @param null|string $Okato
     * @return Item
     */
    public function setOkato(?string $Okato): Item
    {
        $this->Okato = $Okato;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBaseStation(): ?bool
    {
        return $this->BaseStation;
    }

    /**
     * @param bool|null $BaseStation
     * @return Item
     */
    public function setBaseStation(?bool $BaseStation): Item
    {
        $this->BaseStation = $BaseStation;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateModified(): ?DateTime
    {
        return $this->DateModified;
    }

    /**
     * @param DateTime|null $DateModified
     * @return Item
     */
    public function setDateModified(?DateTime $DateModified): Item
    {
        $this->DateModified = $DateModified;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStationType(): ?int
    {
        return $this->StationType;
    }

    /**
     * @param int|null $StationType
     * @return Item
     */
    public function setStationType(?int $StationType): Item
    {
        $this->StationType = $StationType;
        return $this;
    }
}
