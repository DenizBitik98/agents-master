<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

use Doctrine\Common\Collections\Collection;

/**
 * Class Ticket
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class Ticket
{
    /**
     * @var null|int $Id
     */
    protected $Id;
    /**
     * @var null|string $ExpressId
     */
    protected $ExpressId;
    /**
     * @var null|string $ObsoleteExpressIdOrBlankIdentity
     */
    protected $ObsoleteExpressIdOrBlankIdentity;
    /**
     * @var null|float $Tariff
     */
    protected $Tariff;
    /**
     * @var null|float $GlobalTariffEuro
     */
    protected $GlobalTariffEuro;
    /**
     * @var float $NDSTariff
     */
    protected $NDSTariff;
    /**
     * @var null|float $BiletTariff
     */
    protected $BiletTariff;
    /**
     * @var null|float $PlackartaTariff
     */
    protected $PlackartaTariff;
    /**
     * @var null|float $PaidByOrganizationBTariff
     */
    protected $PaidByOrganizationBTariff;
    /**
     * @var null|float $PaidByOrganizationPTariff
     */
    protected $PaidByOrganizationPTariff;
    /**
     * @var null|float $PaidByOrganizationPWithoutServiceTariff
     */
    protected $PaidByOrganizationPWithoutServiceTariff;
    /**
     * @var null|float $PaidByOrganizationServiceTariff
     */
    protected $PaidByOrganizationServiceTariff;
    /**
     * @var null|float $PaidByOrganizationServiceNDSTariff
     */
    protected $PaidByOrganizationServiceNDSTariff;
    /**
     * @var null|bool $IsTransportRequirements
     */
    protected $IsTransportRequirements;
    /**
     * @var null|bool $ShowPaidByOrganizationServiceTariff
     */
    protected $ShowPaidByOrganizationServiceTariff;
    /**
     * @var null|bool $IsMilitaryPreference
     */
    protected $IsMilitaryPreference;
    /**
     * @var null|bool $ShowCollectExpressTariffCommission
     */
    protected $ShowCollectExpressTariffCommission;
    /**
     * @var null|float $ServiceTariff
     */
    protected $ServiceTariff;
    /**
     * @var null|float $ServiceNDSTariff
     */
    protected $ServiceNDSTariff;
    /**
     * @var null|float $TariffLoyality
     */
    protected $TariffLoyality;
    /**
     * @var null|float $TariffCommision
     */
    protected $TariffCommision;
    /**
     * @var null|float $TariffCommisionNDS
     */
    protected $TariffCommisionNDS;
    /**
     * @var null|Collection|PassengerInfo[] $Passengers
     */
    protected $Passengers;
    /**
     * @var null|string $TariffType
     */
    protected $TariffType;
    /**
     * @var null|int $SeatsCount
     */
    protected $SeatsCount;
    /**
     * @var null|string $SeatNumbers
     */
    protected $SeatNumbers;
    /**
     * @var null|int $TicketNumber
     */
    protected $TicketNumber;
    /**
     * @var null|string $PreferenceTariffInfo
     */
    protected $PreferenceTariffInfo;
    /**
     * @var null|float $TotalTariff
     */
    protected $TotalTariff;
    /**
     * @var null|float $KtjTariff
     */
    protected $KtjTariff;
    /**
     * @var null|float $KtjTariffWithCommission
     */
    protected $KtjTariffWithCommission;
    /**
     * @var null|float $DealerTariff
     */
    protected $DealerTariff;
    /**
     * @var null|float $ComissionTariff
     */
    protected $ComissionTariff;
    /**
     * @var null|float $TariffWithoutService
     */
    protected $TariffWithoutService;
    /**
     * @var null|float $NDSWithoutServiceNDSTariff
     */
    protected $NDSWithoutServiceNDSTariff;
    /**
     * @var null|float $PlackartaWithoutServiceTariff
     */
    protected $PlackartaWithoutServiceTariff;
    /**
     * @var null|float $TotalPaymentTariff
     */
    protected $TotalPaymentTariff;
    /**
     * @var null|string $BarcodeText
     */
    protected $BarcodeText;
    /**
     * @var null|TicketBlank[]|collection $Blanks
     */
    protected $Blanks;
    /**
     * @var null|bool $ERegistrationPossible
     */
    protected $ERegistrationPossible;
    /**
     * @var null|TicketTransportRequirement $TransportRequirementsInfo
     */
    protected $TransportRequirementsInfo;
    /**
     * @var null|FinalizeSaleTicketPaymentInfo $PaymentInfo
     */
    protected $PaymentInfo;
    /**
     * @var ReIssuanceTicketIdentity $ReissueDetail
     */
    protected $ReissueDetail;
    /**
     * @var null|string $TariffDocumentType
     */
    protected $TariffDocumentType;
    /**
     * @var null|int $BoardingForm
     */
    protected $BoardingForm;
    /**
     * @var null|bool $AllOrderTicketsLink
     */
    protected $AllOrderTicketsLink;
    /**
     * @var null|string $ParentDocument
     */
    protected $ParentDocument;
    /**
     * @var null|AdditionalServiceInfoResponse $TicketAdditionalServices
     */
    protected $TicketAdditionalServices;
    /**
     * @var null|CountryAdditionalInfo $CountryAdditionalInfo
     */
    protected $CountryAdditionalInfo;
    /**
     * @var null|string $BrandCode
     */
    protected $BrandCode;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->Id;
    }

    /**
     * @param int|null $Id
     * @return Ticket
     */
    public function setId(?int $Id): Ticket
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpressId(): ?string
    {
        return $this->ExpressId;
    }

    /**
     * @param string|null $ExpressId
     * @return Ticket
     */
    public function setExpressId(?string $ExpressId): Ticket
    {
        $this->ExpressId = $ExpressId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getObsoleteExpressIdOrBlankIdentity(): ?string
    {
        return $this->ObsoleteExpressIdOrBlankIdentity;
    }

    /**
     * @param string|null $ObsoleteExpressIdOrBlankIdentity
     * @return Ticket
     */
    public function setObsoleteExpressIdOrBlankIdentity(?string $ObsoleteExpressIdOrBlankIdentity): Ticket
    {
        $this->ObsoleteExpressIdOrBlankIdentity = $ObsoleteExpressIdOrBlankIdentity;

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
    public function getGlobalTariffEuro(): ?float
    {
        return $this->GlobalTariffEuro;
    }

    /**
     * @param float|null $GlobalTariffEuro
     * @return Ticket
     */
    public function setGlobalTariffEuro(?float $GlobalTariffEuro): Ticket
    {
        $this->GlobalTariffEuro = $GlobalTariffEuro;

        return $this;
    }

    /**
     * @return float
     */
    public function getNDSTariff(): float
    {
        return $this->NDSTariff;
    }

    /**
     * @param float $NDSTariff
     * @return Ticket
     */
    public function setNDSTariff(float $NDSTariff): Ticket
    {
        $this->NDSTariff = $NDSTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getBiletTariff(): ?float
    {
        return $this->BiletTariff;
    }

    /**
     * @param float|null $BiletTariff
     * @return Ticket
     */
    public function setBiletTariff(?float $BiletTariff): Ticket
    {
        $this->BiletTariff = $BiletTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPlackartaTariff(): ?float
    {
        return $this->PlackartaTariff;
    }

    /**
     * @param float|null $PlackartaTariff
     * @return Ticket
     */
    public function setPlackartaTariff(?float $PlackartaTariff): Ticket
    {
        $this->PlackartaTariff = $PlackartaTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPaidByOrganizationBTariff(): ?float
    {
        return $this->PaidByOrganizationBTariff;
    }

    /**
     * @param float|null $PaidByOrganizationBTariff
     * @return Ticket
     */
    public function setPaidByOrganizationBTariff(?float $PaidByOrganizationBTariff): Ticket
    {
        $this->PaidByOrganizationBTariff = $PaidByOrganizationBTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPaidByOrganizationPTariff(): ?float
    {
        return $this->PaidByOrganizationPTariff;
    }

    /**
     * @param float|null $PaidByOrganizationPTariff
     * @return Ticket
     */
    public function setPaidByOrganizationPTariff(?float $PaidByOrganizationPTariff): Ticket
    {
        $this->PaidByOrganizationPTariff = $PaidByOrganizationPTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPaidByOrganizationPWithoutServiceTariff(): ?float
    {
        return $this->PaidByOrganizationPWithoutServiceTariff;
    }

    /**
     * @param float|null $PaidByOrganizationPWithoutServiceTariff
     * @return Ticket
     */
    public function setPaidByOrganizationPWithoutServiceTariff(?float $PaidByOrganizationPWithoutServiceTariff): Ticket
    {
        $this->PaidByOrganizationPWithoutServiceTariff = $PaidByOrganizationPWithoutServiceTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPaidByOrganizationServiceTariff(): ?float
    {
        return $this->PaidByOrganizationServiceTariff;
    }

    /**
     * @param float|null $PaidByOrganizationServiceTariff
     * @return Ticket
     */
    public function setPaidByOrganizationServiceTariff(?float $PaidByOrganizationServiceTariff): Ticket
    {
        $this->PaidByOrganizationServiceTariff = $PaidByOrganizationServiceTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPaidByOrganizationServiceNDSTariff(): ?float
    {
        return $this->PaidByOrganizationServiceNDSTariff;
    }

    /**
     * @param float|null $PaidByOrganizationServiceNDSTariff
     * @return Ticket
     */
    public function setPaidByOrganizationServiceNDSTariff(?float $PaidByOrganizationServiceNDSTariff): Ticket
    {
        $this->PaidByOrganizationServiceNDSTariff = $PaidByOrganizationServiceNDSTariff;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsTransportRequirements(): ?bool
    {
        return $this->IsTransportRequirements;
    }

    /**
     * @param bool|null $IsTransportRequirements
     * @return Ticket
     */
    public function setIsTransportRequirements(?bool $IsTransportRequirements): Ticket
    {
        $this->IsTransportRequirements = $IsTransportRequirements;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowPaidByOrganizationServiceTariff(): ?bool
    {
        return $this->ShowPaidByOrganizationServiceTariff;
    }

    /**
     * @param bool|null $ShowPaidByOrganizationServiceTariff
     * @return Ticket
     */
    public function setShowPaidByOrganizationServiceTariff(?bool $ShowPaidByOrganizationServiceTariff): Ticket
    {
        $this->ShowPaidByOrganizationServiceTariff = $ShowPaidByOrganizationServiceTariff;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMilitaryPreference(): ?bool
    {
        return $this->IsMilitaryPreference;
    }

    /**
     * @param bool|null $IsMilitaryPreference
     * @return Ticket
     */
    public function setIsMilitaryPreference(?bool $IsMilitaryPreference): Ticket
    {
        $this->IsMilitaryPreference = $IsMilitaryPreference;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowCollectExpressTariffCommission(): ?bool
    {
        return $this->ShowCollectExpressTariffCommission;
    }

    /**
     * @param bool|null $ShowCollectExpressTariffCommission
     * @return Ticket
     */
    public function setShowCollectExpressTariffCommission(?bool $ShowCollectExpressTariffCommission): Ticket
    {
        $this->ShowCollectExpressTariffCommission = $ShowCollectExpressTariffCommission;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getServiceTariff(): ?float
    {
        return $this->ServiceTariff;
    }

    /**
     * @param float|null $ServiceTariff
     * @return Ticket
     */
    public function setServiceTariff(?float $ServiceTariff): Ticket
    {
        $this->ServiceTariff = $ServiceTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getServiceNDSTariff(): ?float
    {
        return $this->ServiceNDSTariff;
    }

    /**
     * @param float|null $ServiceNDSTariff
     * @return Ticket
     */
    public function setServiceNDSTariff(?float $ServiceNDSTariff): Ticket
    {
        $this->ServiceNDSTariff = $ServiceNDSTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffLoyality(): ?float
    {
        return $this->TariffLoyality;
    }

    /**
     * @param float|null $TariffLoyality
     * @return Ticket
     */
    public function setTariffLoyality(?float $TariffLoyality): Ticket
    {
        $this->TariffLoyality = $TariffLoyality;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffCommision(): ?float
    {
        return $this->TariffCommision;
    }

    /**
     * @param float|null $TariffCommision
     * @return Ticket
     */
    public function setTariffCommision(?float $TariffCommision): Ticket
    {
        $this->TariffCommision = $TariffCommision;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariffCommisionNDS(): ?float
    {
        return $this->TariffCommisionNDS;
    }

    /**
     * @param float|null $TariffCommisionNDS
     * @return Ticket
     */
    public function setTariffCommisionNDS(?float $TariffCommisionNDS): Ticket
    {
        $this->TariffCommisionNDS = $TariffCommisionNDS;

        return $this;
    }

    /**
     * @return Collection|PassengerInfo[]|null
     */
    public function getPassengers()
    {
        return $this->Passengers;
    }

    /**
     * @param Collection|PassengerInfo[]|null $Passengers
     * @return Ticket
     */
    public function setPassengers($Passengers)
    {
        $this->Passengers = $Passengers;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTariffType(): ?string
    {
        return $this->TariffType;
    }

    /**
     * @param string|null $TariffType
     * @return Ticket
     */
    public function setTariffType(?string $TariffType): Ticket
    {
        $this->TariffType = $TariffType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSeatsCount(): ?int
    {
        return $this->SeatsCount;
    }

    /**
     * @param int|null $SeatsCount
     * @return Ticket
     */
    public function setSeatsCount(?int $SeatsCount): Ticket
    {
        $this->SeatsCount = $SeatsCount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSeatNumbers(): ?string
    {
        return $this->SeatNumbers;
    }

    /**
     * @param string|null $SeatNumbers
     * @return Ticket
     */
    public function setSeatNumbers(?string $SeatNumbers): Ticket
    {
        $this->SeatNumbers = $SeatNumbers;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTicketNumber(): ?int
    {
        return $this->TicketNumber;
    }

    /**
     * @param int|null $TicketNumber
     * @return Ticket
     */
    public function setTicketNumber(?int $TicketNumber): Ticket
    {
        $this->TicketNumber = $TicketNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPreferenceTariffInfo(): ?string
    {
        return $this->PreferenceTariffInfo;
    }

    /**
     * @param string|null $PreferenceTariffInfo
     * @return Ticket
     */
    public function setPreferenceTariffInfo(?string $PreferenceTariffInfo): Ticket
    {
        $this->PreferenceTariffInfo = $PreferenceTariffInfo;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalTariff(): ?float
    {
        return $this->TotalTariff;
    }

    /**
     * @param float|null $TotalTariff
     * @return Ticket
     */
    public function setTotalTariff(?float $TotalTariff): Ticket
    {
        $this->TotalTariff = $TotalTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getKtjTariff(): ?float
    {
        return $this->KtjTariff;
    }

    /**
     * @param float|null $KtjTariff
     * @return Ticket
     */
    public function setKtjTariff(?float $KtjTariff): Ticket
    {
        $this->KtjTariff = $KtjTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getKtjTariffWithCommission(): ?float
    {
        return $this->KtjTariffWithCommission;
    }

    /**
     * @param float|null $KtjTariffWithCommission
     * @return Ticket
     */
    public function setKtjTariffWithCommission(?float $KtjTariffWithCommission): Ticket
    {
        $this->KtjTariffWithCommission = $KtjTariffWithCommission;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getDealerTariff(): ?float
    {
        return $this->DealerTariff;
    }

    /**
     * @param float|null $DealerTariff
     * @return Ticket
     */
    public function setDealerTariff(?float $DealerTariff): Ticket
    {
        $this->DealerTariff = $DealerTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getComissionTariff(): ?float
    {
        return $this->ComissionTariff;
    }

    /**
     * @param float|null $ComissionTariff
     * @return Ticket
     */
    public function setComissionTariff(?float $ComissionTariff): Ticket
    {
        $this->ComissionTariff = $ComissionTariff;

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
    public function getNDSWithoutServiceNDSTariff(): ?float
    {
        return $this->NDSWithoutServiceNDSTariff;
    }

    /**
     * @param float|null $NDSWithoutServiceNDSTariff
     * @return Ticket
     */
    public function setNDSWithoutServiceNDSTariff(?float $NDSWithoutServiceNDSTariff): Ticket
    {
        $this->NDSWithoutServiceNDSTariff = $NDSWithoutServiceNDSTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPlackartaWithoutServiceTariff(): ?float
    {
        return $this->PlackartaWithoutServiceTariff;
    }

    /**
     * @param float|null $PlackartaWithoutServiceTariff
     * @return Ticket
     */
    public function setPlackartaWithoutServiceTariff(?float $PlackartaWithoutServiceTariff): Ticket
    {
        $this->PlackartaWithoutServiceTariff = $PlackartaWithoutServiceTariff;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalPaymentTariff(): ?float
    {
        return $this->TotalPaymentTariff;
    }

    /**
     * @param float|null $TotalPaymentTariff
     * @return Ticket
     */
    public function setTotalPaymentTariff(?float $TotalPaymentTariff): Ticket
    {
        $this->TotalPaymentTariff = $TotalPaymentTariff;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBarcodeText(): ?string
    {
        return $this->BarcodeText;
    }

    /**
     * @param string|null $BarcodeText
     * @return Ticket
     */
    public function setBarcodeText(?string $BarcodeText): Ticket
    {
        $this->BarcodeText = $BarcodeText;

        return $this;
    }

    /**
     * @return Collection|TicketBlank[]|null
     */
    public function getBlanks()
    {
        return $this->Blanks;
    }

    /**
     * @param Collection|TicketBlank[]|null $Blanks
     * @return Ticket
     */
    public function setBlanks($Blanks)
    {
        $this->Blanks = $Blanks;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getERegistrationPossible(): ?bool
    {
        return $this->ERegistrationPossible;
    }

    /**
     * @param bool|null $ERegistrationPossible
     * @return Ticket
     */
    public function setERegistrationPossible(?bool $ERegistrationPossible): Ticket
    {
        $this->ERegistrationPossible = $ERegistrationPossible;

        return $this;
    }

    /**
     * @return TicketTransportRequirement|null
     */
    public function getTransportRequirementsInfo(): ?TicketTransportRequirement
    {
        return $this->TransportRequirementsInfo;
    }

    /**
     * @param TicketTransportRequirement|null $TransportRequirementsInfo
     * @return Ticket
     */
    public function setTransportRequirementsInfo(?TicketTransportRequirement $TransportRequirementsInfo): Ticket
    {
        $this->TransportRequirementsInfo = $TransportRequirementsInfo;

        return $this;
    }

    /**
     * @return FinalizeSaleTicketPaymentInfo|null
     */
    public function getPaymentInfo(): ?FinalizeSaleTicketPaymentInfo
    {
        return $this->PaymentInfo;
    }

    /**
     * @param FinalizeSaleTicketPaymentInfo|null $PaymentInfo
     * @return Ticket
     */
    public function setPaymentInfo(?FinalizeSaleTicketPaymentInfo $PaymentInfo): Ticket
    {
        $this->PaymentInfo = $PaymentInfo;

        return $this;
    }

    /**
     * @return ReIssuanceTicketIdentity
     */
    public function getReissueDetail(): ReIssuanceTicketIdentity
    {
        return $this->ReissueDetail;
    }

    /**
     * @param ReIssuanceTicketIdentity $ReissueDetail
     * @return Ticket
     */
    public function setReissueDetail(ReIssuanceTicketIdentity $ReissueDetail): Ticket
    {
        $this->ReissueDetail = $ReissueDetail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTariffDocumentType(): ?string
    {
        return $this->TariffDocumentType;
    }

    /**
     * @param string|null $TariffDocumentType
     * @return Ticket
     */
    public function setTariffDocumentType(?string $TariffDocumentType): Ticket
    {
        $this->TariffDocumentType = $TariffDocumentType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBoardingForm(): ?int
    {
        return $this->BoardingForm;
    }

    /**
     * @param int|null $BoardingForm
     * @return Ticket
     */
    public function setBoardingForm(?int $BoardingForm): Ticket
    {
        $this->BoardingForm = $BoardingForm;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllOrderTicketsLink(): ?bool
    {
        return $this->AllOrderTicketsLink;
    }

    /**
     * @param bool|null $AllOrderTicketsLink
     * @return Ticket
     */
    public function setAllOrderTicketsLink(?bool $AllOrderTicketsLink): Ticket
    {
        $this->AllOrderTicketsLink = $AllOrderTicketsLink;

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
     * @return AdditionalServiceInfoResponse|null
     */
    public function getTicketAdditionalServices(): ?AdditionalServiceInfoResponse
    {
        return $this->TicketAdditionalServices;
    }

    /**
     * @param AdditionalServiceInfoResponse|null $TicketAdditionalServices
     * @return Ticket
     */
    public function setTicketAdditionalServices(?AdditionalServiceInfoResponse $TicketAdditionalServices): Ticket
    {
        $this->TicketAdditionalServices = $TicketAdditionalServices;

        return $this;
    }

    /**
     * @return CountryAdditionalInfo|null
     */
    public function getCountryAdditionalInfo(): ?CountryAdditionalInfo
    {
        return $this->CountryAdditionalInfo;
    }

    /**
     * @param CountryAdditionalInfo|null $CountryAdditionalInfo
     * @return Ticket
     */
    public function setCountryAdditionalInfo(?CountryAdditionalInfo $CountryAdditionalInfo
    ): Ticket {
        $this->CountryAdditionalInfo = $CountryAdditionalInfo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrandCode(): ?string
    {
        return $this->BrandCode;
    }

    /**
     * @param string|null $BrandCode
     * @return Ticket
     */
    public function setBrandCode(?string $BrandCode): Ticket
    {
        $this->BrandCode = $BrandCode;

        return $this;
    }
}
