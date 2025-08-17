<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 1:09
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\PaymentInfo;

/**
 * Class Ticket
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class Ticket
{
    /**
     * @JMS\SerializedName("Number")
     * @JMS\Type("string")
     * @var null|string $Number
     */
    protected $Number;
    /**
     * @JMS\SerializedName("TicketId")
     * @JMS\Type("string")
     * @var null|string $TicketId
     */
    protected $TicketId;
    /**
     * @JMS\SerializedName("ID")
     * @JMS\Type("string")
     * @var null|string $ID
     */
    protected $ID;
    /**
     * @JMS\SerializedName("ExpressID")
     * @JMS\Type("string")
     * @var null|string $ExpressID
     */
    protected $ExpressID;
    /**
     * @JMS\SerializedName("Tariff")
     * @JMS\Type("float")
     * @var null|float $Tariff
     */
    protected $Tariff;
    /**
     * @JMS\SerializedName("TariffNDS")
     * @JMS\Type("float")
     * @var null|float $TariffNDS
     */
    protected $TariffNDS;
    /**
     * @JMS\SerializedName("TariffBP")
     * @JMS\Type("float")
     * @var null|float $TariffBP
     */
    protected $TariffBP;
    /**
     * @JMS\SerializedName("TariffB")
     * @JMS\Type("float")
     * @var null|float $TariffB
     */
    protected $TariffB;
    /**
     * @JMS\SerializedName("TariffP")
     * @JMS\Type("float")
     * @var null|float $TariffP
     */
    protected $TariffP;
    /**
     * @JMS\SerializedName("TariffInsurance")
     * @JMS\Type("float")
     * @var null|float $TariffInsurance
     */
    protected $TariffInsurance;
    /**
     * @JMS\SerializedName("TariffService")
     * @JMS\Type("float")
     * @var null|float $TariffService
     */
    protected $TariffService;
    /**
     * @JMS\SerializedName("TariffServiceNDS")
     * @JMS\Type("float")
     * @var null|float $TariffServiceNDS
     */
    protected $TariffServiceNDS;
    /**
     * @JMS\SerializedName("TariffPaymentTotal")
     * @JMS\Type("float")
     * @var null|float $TariffPaymentTotal
     */
    protected $TariffPaymentTotal;
    /**
     * @JMS\SerializedName("TariffTotal")
     * @JMS\Type("float")
     * @var null|float $TariffTotal
     */
    protected $TariffTotal;
    /**
     * @JMS\SerializedName("TariffType")
     * @JMS\Type("int")
     * @var null|int $TariffType
     */
    protected $TariffType;
    /**
     * @JMS\SerializedName("PassCount")
     * @JMS\Type("int")
     * @var null|int $PassCount
     */
    protected $PassCount;
    /**
     * @JMS\SerializedName("Seats")
     * @JMS\Type("ArrayCollection")
     * @var null|Collection $Seats
     */
    protected $Seats;
    /**
     * @JMS\SerializedName("SeatsType")
     * @JMS\Type("string")
     * @var null|string $SeatsType
     */
    protected $SeatsType;
    /**
     * @JMS\SerializedName("D5")
     * @JMS\Type("bool")
     * @var null|bool $D5
     */
    protected $D5;
    /**
     * @JMS\SerializedName("Passengers")
     * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\PassengerResponse>")
     * @var null|Collection|PassengerResponse[] $Passengers
     */
    protected $Passengers;
    /**
     * @JMS\SerializedName("TariffKtj")
     * @JMS\Type("float")
     * @var null|float $TariffKtj
     */
    protected $TariffKtj;
    /**
     * @JMS\SerializedName("TariffDealer")
     * @JMS\Type("float")
     * @var null|float $TariffDealer
     */
    protected $TariffDealer;
    /**
     * @JMS\SerializedName("Comission")
     * @JMS\Type("float")
     * @var null|float $Comission
     */
    protected $Comission;
    /**
     * @JMS\SerializedName("NoBedding")
     * @JMS\Type("bool")
     * @var null|bool $NoBedding
     */
    protected $NoBedding;
    /**
     * @JMS\SerializedName("PaymentInfo")
     * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\PaymentInfo")
     * @var null|PaymentInfo $PaymentInfo
     */
    protected $PaymentInfo;
    /**
     * @JMS\SerializedName("TariffWithoutService")
     * @JMS\Type("float")
     * @var null|float $TariffWithoutService
     */
    protected $TariffWithoutService;
    /**
     * @JMS\SerializedName("TariffPWithoutService")
     * @JMS\Type("float")
     * @var null|float $TariffPWithoutService
     */
    protected $TariffPWithoutService;
    /**
     * @JMS\SerializedName("TariffNDSWithoutServiceNDS")
     * @JMS\Type("float")
     * @var null|float $TariffNDSWithoutServiceNDS
     */
    protected $TariffNDSWithoutServiceNDS;
    /**
     * @JMS\SerializedName("BlankIdentity")
     * @JMS\Type("string")
     * @var null|string $BlankIdentity
     */
    protected $BlankIdentity;
    /**
     * @JMS\SerializedName("PrintBlankEnum")
     * @JMS\Type("int")
     * @var null|int $PrintBlankEnum
     */
    protected $PrintBlankEnum;
    /**
     * @JMS\SerializedName("ExpoTicket")
     * @JMS\Type("string")
     * @var null|string $ExpoTicket
     */
    protected $ExpoTicket;
    /**
     * @JMS\SerializedName("DiscountCard")
     * @JMS\Type("string")
     * @var null|string $DiscountCard
     */
    protected $DiscountCard;
    /**
     * @JMS\SerializedName("ParentDocument")
     * @JMS\Type("string")
     * @var null|string $ParentDocument
     */
    protected $ParentDocument;
    /**
     * @JMS\SerializedName("CarAirConditioning")
     * @JMS\Type("bool")
     * @var null|bool $CarAirConditioning
     */
    protected $CarAirConditioning;
    /**
     * @JMS\SerializedName("EcoFriendlyToilets")
     * @JMS\Type("bool")
     * @var null|bool $EcoFriendlyToilets
     */
    protected $EcoFriendlyToilets;
    /**
     * @JMS\SerializedName("ConsumerServices")
     * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ConsumerServices")
     * @var null|ConsumerServices $ConsumerServices
     */
    protected $ConsumerServices;

    /**
     * Ticket constructor.
     */
    public function __construct()
    {
        $this->Passengers = new ArrayCollection();
    }

    /**
     * @return null|string
     */
    public function getNumber(): ?string
    {
        return $this->Number;
    }

    /**
     * @param null|string $Number
     *
     * @return Ticket
     */
    public function setNumber(?string $Number): Ticket
    {
        $this->Number = $Number;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTicketId(): ?string
    {
        return $this->TicketId;
    }

    /**
     * @param null|string $TicketId
     *
     * @return Ticket
     */
    public function setTicketId(?string $TicketId): Ticket
    {
        $this->TicketId = $TicketId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getID(): ?string
    {
        return $this->ID;
    }

    /**
     * @param null|string $ID
     *
     * @return Ticket
     */
    public function setID(?string $ID): Ticket
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getExpressID(): ?string
    {
        return $this->ExpressID;
    }

    /**
     * @param null|string $ExpressID
     *
     * @return Ticket
     */
    public function setExpressID(?string $ExpressID): Ticket
    {
        $this->ExpressID = $ExpressID;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariff(): ?float
    {
        return $this->Tariff;
    }

    /**
     * @param float|null $Tariff
     *
     * @return Ticket
     */
    public function setTariff(?float $Tariff): Ticket
    {
        $this->Tariff = $Tariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffNDS(): ?float
    {
        return $this->TariffNDS;
    }

    /**
     * @param float|null $TariffNDS
     *
     * @return Ticket
     */
    public function setTariffNDS(?float $TariffNDS): Ticket
    {
        $this->TariffNDS = $TariffNDS;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffBP(): ?float
    {
        return $this->TariffBP;
    }

    /**
     * @param float|null $TariffBP
     *
     * @return Ticket
     */
    public function setTariffBP(?float $TariffBP): Ticket
    {
        $this->TariffBP = $TariffBP;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffB(): ?float
    {
        return $this->TariffB;
    }

    /**
     * @param float|null $TariffB
     *
     * @return Ticket
     */
    public function setTariffB(?float $TariffB): Ticket
    {
        $this->TariffB = $TariffB;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffP(): ?float
    {
        return $this->TariffP;
    }

    /**
     * @param float|null $TariffP
     *
     * @return Ticket
     */
    public function setTariffP(?float $TariffP): Ticket
    {
        $this->TariffP = $TariffP;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffInsurance(): ?float
    {
        return $this->TariffInsurance;
    }

    /**
     * @param float|null $TariffInsurance
     *
     * @return Ticket
     */
    public function setTariffInsurance(?float $TariffInsurance): Ticket
    {
        $this->TariffInsurance = $TariffInsurance;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffService(): ?float
    {
        return $this->TariffService;
    }

    /**
     * @param float|null $TariffService
     *
     * @return Ticket
     */
    public function setTariffService(?float $TariffService): Ticket
    {
        $this->TariffService = $TariffService;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffServiceNDS(): ?float
    {
        return $this->TariffServiceNDS;
    }

    /**
     * @param float|null $TariffServiceNDS
     *
     * @return Ticket
     */
    public function setTariffServiceNDS(?float $TariffServiceNDS): Ticket
    {
        $this->TariffServiceNDS = $TariffServiceNDS;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffPaymentTotal(): ?float
    {
        return $this->TariffPaymentTotal;
    }

    /**
     * @param float|null $TariffPaymentTotal
     *
     * @return Ticket
     */
    public function setTariffPaymentTotal(?float $TariffPaymentTotal): Ticket
    {
        $this->TariffPaymentTotal = $TariffPaymentTotal;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffTotal(): ?float
    {
        return $this->TariffTotal;
    }

    /**
     * @param float|null $TariffTotal
     *
     * @return Ticket
     */
    public function setTariffTotal(?float $TariffTotal): Ticket
    {
        $this->TariffTotal = $TariffTotal;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTariffType(): ?int
    {
        return $this->TariffType;
    }

    /**
     * @param int|null $TariffType
     *
     * @return Ticket
     */
    public function setTariffType(?int $TariffType): Ticket
    {
        $this->TariffType = $TariffType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPassCount(): ?int
    {
        return $this->PassCount;
    }

    /**
     * @param int|null $PassCount
     *
     * @return Ticket
     */
    public function setPassCount(?int $PassCount): Ticket
    {
        $this->PassCount = $PassCount;

        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getSeats(): ?Collection
    {
        return $this->Seats;
    }

    /**
     * @param Collection|null $Seats
     *
     * @return Ticket
     */
    public function setSeats(?Collection $Seats): Ticket
    {
        $this->Seats = $Seats;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSeatsType(): ?string
    {
        return $this->SeatsType;
    }

    /**
     * @param null|string $SeatsType
     *
     * @return Ticket
     */
    public function setSeatsType(?string $SeatsType): Ticket
    {
        $this->SeatsType = $SeatsType;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getD5(): ?bool
    {
        return $this->D5;
    }

    /**
     * @param bool|null $D5
     *
     * @return Ticket
     */
    public function setD5(?bool $D5): Ticket
    {
        $this->D5 = $D5;

        return $this;
    }

    /**
     * @return Collection|PassengerResponse[]|null
     */
    public function getPassengers()
    {
        return $this->Passengers;
    }

    /**
     * @param Collection|PassengerResponse[]|null $Passengers
     *
     * @return Ticket
     */
    public function setPassengers($Passengers)
    {
        $this->Passengers = $Passengers;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffKtj(): ?float
    {
        return $this->TariffKtj;
    }

    /**
     * @param float|null $TariffKtj
     *
     * @return Ticket
     */
    public function setTariffKtj(?float $TariffKtj): Ticket
    {
        $this->TariffKtj = $TariffKtj;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffDealer(): ?float
    {
        return $this->TariffDealer;
    }

    /**
     * @param float|null $TariffDealer
     *
     * @return Ticket
     */
    public function setTariffDealer(?float $TariffDealer): Ticket
    {
        $this->TariffDealer = $TariffDealer;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getComission(): ?float
    {
        return $this->Comission;
    }

    /**
     * @param float|null $Comission
     *
     * @return Ticket
     */
    public function setComission(?float $Comission): Ticket
    {
        $this->Comission = $Comission;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNoBedding(): ?bool
    {
        return $this->NoBedding;
    }

    /**
     * @param bool|null $NoBedding
     *
     * @return Ticket
     */
    public function setNoBedding(?bool $NoBedding): Ticket
    {
        $this->NoBedding = $NoBedding;

        return $this;
    }

    /**
     * @return PaymentInfo|null
     */
    public function getPaymentInfo(): ?PaymentInfo
    {
        return $this->PaymentInfo;
    }

    /**
     * @param PaymentInfo|null $PaymentInfo
     *
     * @return Ticket
     */
    public function setPaymentInfo(?PaymentInfo $PaymentInfo): Ticket
    {
        $this->PaymentInfo = $PaymentInfo;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffWithoutService(): ?float
    {
        return $this->TariffWithoutService;
    }

    /**
     * @param float|null $TariffWithoutService
     *
     * @return Ticket
     */
    public function setTariffWithoutService(?float $TariffWithoutService): Ticket
    {
        $this->TariffWithoutService = $TariffWithoutService;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffPWithoutService(): ?float
    {
        return $this->TariffPWithoutService;
    }

    /**
     * @param float|null $TariffPWithoutService
     *
     * @return Ticket
     */
    public function setTariffPWithoutService(?float $TariffPWithoutService): Ticket
    {
        $this->TariffPWithoutService = $TariffPWithoutService;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffNDSWithoutServiceNDS(): ?float
    {
        return $this->TariffNDSWithoutServiceNDS;
    }

    /**
     * @param float|null $TariffNDSWithoutServiceNDS
     *
     * @return Ticket
     */
    public function setTariffNDSWithoutServiceNDS(?float $TariffNDSWithoutServiceNDS): Ticket
    {
        $this->TariffNDSWithoutServiceNDS = $TariffNDSWithoutServiceNDS;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getBlankIdentity(): ?string
    {
        return $this->BlankIdentity;
    }

    /**
     * @param null|string $BlankIdentity
     *
     * @return Ticket
     */
    public function setBlankIdentity(?string $BlankIdentity): Ticket
    {
        $this->BlankIdentity = $BlankIdentity;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPrintBlankEnum(): ?int
    {
        return $this->PrintBlankEnum;
    }

    /**
     * @param int|null $PrintBlankEnum
     *
     * @return Ticket
     */
    public function setPrintBlankEnum(?int $PrintBlankEnum): Ticket
    {
        $this->PrintBlankEnum = $PrintBlankEnum;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getExpoTicket(): ?string
    {
        return $this->ExpoTicket;
    }

    /**
     * @param null|string $ExpoTicket
     *
     * @return Ticket
     */
    public function setExpoTicket(?string $ExpoTicket): Ticket
    {
        $this->ExpoTicket = $ExpoTicket;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDiscountCard(): ?string
    {
        return $this->DiscountCard;
    }

    /**
     * @param null|string $DiscountCard
     *
     * @return Ticket
     */
    public function setDiscountCard(?string $DiscountCard): Ticket
    {
        $this->DiscountCard = $DiscountCard;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getParentDocument(): ?string
    {
        return $this->ParentDocument;
    }

    /**
     * @param string|null $ParentDocument
     * @return Ticket
     */
    public function setParentDocument(?string $ParentDocument): Ticket
    {
        $this->ParentDocument = $ParentDocument;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCarAirConditioning(): ?bool
    {
        return $this->CarAirConditioning;
    }

    /**
     * @param bool|null $CarAirConditioning
     * @return Ticket
     */
    public function setCarAirConditioning(?bool $CarAirConditioning): Ticket
    {
        $this->CarAirConditioning = $CarAirConditioning;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEcoFriendlyToilets(): ?bool
    {
        return $this->EcoFriendlyToilets;
    }

    /**
     * @param bool|null $EcoFriendlyToilets
     * @return Ticket
     */
    public function setEcoFriendlyToilets(?bool $EcoFriendlyToilets): Ticket
    {
        $this->EcoFriendlyToilets = $EcoFriendlyToilets;

        return $this;
    }

    /**
     * @return ConsumerServices|null
     */
    public function getConsumerServices(): ?ConsumerServices
    {
        return $this->ConsumerServices;
    }

    /**
     * @param ConsumerServices|null $ConsumerServices
     * @return Ticket
     */
    public function setConsumerServices(?ConsumerServices $ConsumerServices): Ticket
    {
        $this->ConsumerServices = $ConsumerServices;

        return $this;
    }
}
