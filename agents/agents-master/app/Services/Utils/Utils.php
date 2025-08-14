<?php


namespace App\Services\Utils;

use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\ConfirmRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\Payment;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\Ticket;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\AccompanyingDocument;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\AdditionalPreference;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Blank;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\InvalidStatusApprove;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ParentDocument;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ParentDocumentExpressId;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Passenger;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\PassengerEmail;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\PassengerName;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\PassengerPhone;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Requirements;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ReserveRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\SeatRange;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Train;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature\PaymentSignatureRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature\PaymentSignatureResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Car;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\CarSearchRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\CarSearchResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\DirectionDto;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Tariff;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\TrainCollection;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\Direction;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\TrainSearchRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Utils\CarUtils;
use App\KTJ\Klabs\KTJBundle\Signature\Signature;
use App\Models\SaleRailwayDocument;
use App\Models\SaleRailwayReservation;
use App\Models\SaleRailwayTicket;
use App\Services\Enum\Sex;
use App\Services\Enum\TariffType;
use App\Services\KTJ\KTJService;
use App\ViewModels\Sale\Railway\Buy\BlankForm;
use App\ViewModels\Sale\Railway\Buy\BuyDirectionForm;
use App\ViewModels\Sale\Railway\Buy\BuyForm;
use App\ViewModels\Sale\Railway\Train\SearchModel;
use \DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Support\Facades\App;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;
use Tightenco\Collect\Support\Collection;


class Utils
{
    /**
     * @var null|string $fluentDepartureDiff
     */
    protected $fluentDepartureDiff = '2 days';
    /**
     * @var null|string $maxDepartureDayDiff
     */
    protected $maxDepartureDayDiff = '45';
    /**
     * @var null | TariffTypeUtils
     */
    protected $tariffTypeUtils = null;
    /**
     * @var null|CarUtils $carUtils
     */
    protected $carUtils;
    /**
     * @var null|PhoneNumberUtil $phoneNumberUtils
     */
    protected $phoneNumberUtils;
    /**
     * @var null|SexUtils $sexUtils
     */
    protected $sexUtils;
    /**
     * @var null|string $machineKey
     */
    protected $machineKey;
    /**
     * @var null|string $ktjTerminal
     */
    protected $ktjTerminal;
    /**
     * @var null |  KtjService
     */
    protected $ktjService = null;


    public function __construct(string $machineKey)
    {
        $this->tariffTypeUtils = new TariffTypeUtils();
        $this->sexUtils = new SexUtils();
        $this->carUtils = new CarUtils();
        $this->phoneNumberUtils = PhoneNumberUtil::getInstance();
        $this->machineKey = $machineKey;
    }

    public function buildRouteSearchRequest(SearchModel $model){
        $request = new TrainSearchRequest();
        $request->setStationFrom($model->getDepartureStationCode());
        $request->setStationTo($model->getArrivalStationCode());
        $request->setForwardDirection($this->buildDirection($model->getDepartureDate(), false));

        if($model->getBackwardDate() != null){

            $request->setBackwardDirection($this->buildDirection($model->getBackwardDate(), false));
        }
        $request->setShowWithoutPlaces(false);

        return $request;
    }

    protected function buildDirection(?DateTime $dateTime = null, ?bool $fluentDeparture = false): ?Direction
    {
        $direction = new Direction();
        # If no date was sent we return nothing
        if (null == $dateTime) {
            return null;
        }
        # We have to clone default $dateTime to have a diapason
        $fromDateTime = clone $dateTime;
        $tillDateTime = clone $dateTime;
        # From always have to be 0:00
        $fromDateTime->setTime(0, 0, 0);
        # Till always have to be 0:00
        $tillDateTime->setTime(23, 59, 0);
        # Current date
        $today = new DateTime();
        # If we want to search with fluent date we modify date diapasons
        if ($fluentDeparture) {
            $fromDateTime->modify(implode([
                '-',
                $this->fluentDepartureDiff
            ]));
            $tillDateTime->modify(implode([
                '+',
                $this->fluentDepartureDiff
            ]));
        }
        # If selected day less than today
        if ($fromDateTime->diff($today)->format("%a") > 0 && $fromDateTime < $today) {
            $fromDateTime = $today;
        }
        # If selected day more than 40 days
        if ($tillDateTime->diff($today)->format("%a") > $this->maxDepartureDayDiff) {
            $tillDateTime = $today->modify(implode([
                '+',
                $this->maxDepartureDayDiff,
                ' days'
            ]));
        }
        $direction->setDateTimeFrom($fromDateTime);
        $direction->setDateTimeTo($tillDateTime);
        $direction->setIsArrivalDateTime(false);

        return $direction;
    }


    public function buildCarSearchRequest(CarSearchRequest $request){
        $request = new CarSearchRequest();





        return $request;
    }

    public function filterSimilarCar(CarSearchResponse $response){
        $response->setForwardDirectionDto(
            $this->filterDirection(
                $response->getForwardDirectionDto()
            )
        );
        $response->setBackwardDirectionDto(
            $this->filterDirection(
                $response->getBackwardDirectionDto()
            )
        );
        return $response;
    }

    protected function filterDirection(?DirectionDto $direction = null): ?DirectionDto
    {
        if (null == $direction) {
            return $direction;
        }

        /** @var TrainCollection $trainCollection */
        foreach ($direction->getTrains() as $trainCollection) {
            $tariffs = new ArrayCollection();
            $tariffsArray = [];
            $carsArray = [];

            /** @var Tariff $carTariff */
            foreach ($trainCollection->getTrain()->getCars() as $carTariff) {
                /**@var Car $car*/
                foreach ($carTariff->getCars() as $car){
                    if(!array_key_exists($car->getNumber(), $tariffsArray)){
                        $tariffsArray[$car->getNumber()] = $carTariff;
                        $carsArray[$car->getNumber()] = [];

                    }else{
                        /**@var Tariff $tt*/
                        $tt = $tariffsArray[$car->getNumber()];
                        if($carTariff->getTariff() < $tt->getTariff()){
                            $tariffsArray[$car->getNumber()] = $carTariff;
                        }
                    }

                    $carsArray[$car->getNumber()][] = $car;
                }
            }

            $tariffsUnited = [];
            $carsUnited = [];

            foreach ($carsArray as $k=>$cArr){

                $hash = spl_object_hash($tariffsArray[$k]);
                if(!array_key_exists($hash, $carsUnited)){
                    $carsUnited[$hash] = [];
                }

                $carsUnited[$hash] = array_merge($carsUnited[$hash], $cArr);

                if(!array_key_exists($hash, $tariffsUnited)){
                    $tariffsUnited[$hash] = $tariffsArray[$k];
                }
            }

            /**@var Tariff $tt*/
            foreach ($tariffsUnited as $k=>$tt){

                $tt->setCars(new ArrayCollection($carsUnited[$k]));
                $tariffs->add($tt);
            }

            $trainCollection->getTrain()->setCars($tariffs);
        }



        foreach ($direction->getTrains() as $trainCollection) {
            /** @var TrainCollection $trainCollection */
            foreach ($trainCollection->getTrain()->getCars() as $carTariff) {
                $cars = Collection::make($carTariff->getCars());
                $carTariff->setCarsMerged(
                    $cars->groupBy(function (Car $car) {
                        return $car->getNumber();
                    })
                );
            }
        }
        return $direction;
    }

    public function buildReserveRequest(BuyDirectionForm $buyDirectionForm, array $blanks, $user){
        $request = new ReserveRequest();

        $request->setStationFrom($buyDirectionForm->getDepartureStation());
        $request->setStationTo($buyDirectionForm->getArrivalStation());
        $request->setDepDate($buyDirectionForm->getDepartureDatetime());
        $request->setDepTime($buyDirectionForm->getDepartureDatetime());
        $request->setTrain(new Train($buyDirectionForm->getTrain()));

        $car = new \App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Car(
            $this->getCarUtils()->getCarTypeIdWithLabel(
                $buyDirectionForm->getCarType()
            ),
            $buyDirectionForm->getCarNumber(),
            $buyDirectionForm->getCarService()
        );

        $request->setCar($car);

        $requirements = new Requirements();

        $upSeatSlider = unserialize($buyDirectionForm->getUpDownSlider());

        $requirements->setSeatsBottom($upSeatSlider[0]);
        $requirements->setSeatsTop($upSeatSlider[1]);

		if (is_array($buyDirectionForm->getSeats()) || is_object($buyDirectionForm->getSeats()))
		{
			if (count($buyDirectionForm->getSeats())) {
				$requirements->setSeatsRange(
					new SeatRange(
						min($buyDirectionForm->getSeats()),
						max($buyDirectionForm->getSeats())
					)
				);
			}
		}

        $requirements->setWoBedding($buyDirectionForm->getWithoutBedding());

        $requirements->setSeatsComp($buyDirectionForm->getSeatsComp());

        $request->setRequirements($requirements);

		/*if ($buyDirectionForm->getCreditCard() !=null and $buyDirectionForm->getCreditCard() !="") {*/
			$request->setCreditCard($buyDirectionForm->getCreditCard());
		/*}
		else {
			$request->setCreditCard(true);
		}*/

        $DCTSBlanks = new ArrayCollection();

        /**
         * @var BlankForm $blankForm
         */
        foreach ($blanks as $blankForm) {
            $blank = new Blank();
            $blank->setSeatsCount(1);
            if ($blankForm->getUseDiscount() == true
                && strlen(
                    $blankForm->getDiscount()
                )
            ) {
                $blank->setTariffType(
                    $this->getTariffTypeUtils()->convertToDCTS(TariffType::DISCOUNT())
                );

                $cardNumber = $blankForm->getDiscount();

                if (substr($cardNumber, 0, 6) == '800151'
                    && $blankForm->getTariffType()->equals(TariffType::KID())) {
                    $ap = new AdditionalPreference();
                    $ap->setChildPreference(0);
                    $blank->setAdditionalPreference($ap);
                }
            } else {
                $blank->setTariffType(
                    //$this->getTariffTypeUtils()->convertToDCTS($blankForm->getTariffType())
                    intval($blankForm->getTariffType())
                );
            }

            if($buyDirectionForm->getParentDocumentExpressId()){
                $parentDocument = new ParentDocument();
                $parentDocumentExpressId = new ParentDocumentExpressId();
                $parentDocumentExpressId->setValue($buyDirectionForm->getParentDocumentExpressId());
                $parentDocument->setExpressId($parentDocumentExpressId);
                $parentDocument->setMode(ParentDocument::MODE_EXPRESS_ID);

                $ap = $blank->getAdditionalPreference() != null ? $blank->getAdditionalPreference() : new AdditionalPreference();
                $ap->setChildPreference(AdditionalPreference::CHILD_PREFERENCE_DET5_27);
                $ap->setParentDocument($parentDocument);
                $blank->setAdditionalPreference($ap);
            }

            $passenger = new Passenger();
            if (!empty($blankForm->getDiscount()) && $blankForm->getUseDiscount()) {
                $passenger->setTCard($blankForm->getDiscount());
            } else {
                $passenger->setDocType($blankForm->getDocumentType());

                $docNumber = $blankForm->getDocument();

                if($blankForm->getDocumentType() == 0){
                    $docNumber = "N".$docNumber;
                }
                $passenger->setDoc($docNumber);

                $passenger->setName(
                    new PassengerName(
                        $blankForm->getName(),
                        $blankForm->getSurname(),
                        $blankForm->getLastName()
                    )
                );
                $passenger->setChildBirthday($blankForm->getBirthday());
                $passenger->setWithoutPlace($blankForm->getWithoutPlace());
                $passenger->setCitizenship($blankForm->getCitizenship());
                /*if ($blankForm->getSex() instanceof Sex) {
                    $passenger->setSex(
                        $this->getSexUtils()->getDCTSValue(
                            $blankForm->getSex()
                        )
                    );
                }*/
                $passenger->setSex($blankForm->getSex());
                if (null !== $blankForm->getPhone()) {
                    $phone = $this->getPhoneNumberUtils()->parse($blankForm->getPhone(), 'KZ');

                    $passenger->setPassengerPhone(
                        new PassengerPhone(

                            //todo bakyt
                            $this->getPhoneNumberUtils()
                                ->format(
                                    $phone,
                                    PhoneNumberFormat::E164
                                )
                        )
                    );
                }
                $passenger->setPassengerEmail(
                    new PassengerEmail($user->email)
                );

                $passenger->setPassengerIin($blankForm->getPassengerIin());

                if($blankForm->getIsInvalidOptionEnabled() === true){
                    $ap = $blank->getAdditionalPreference() != null ? $blank->getAdditionalPreference() : new AdditionalPreference();
                    $invalidStatusApprove = new InvalidStatusApprove();
                    $invalidStatusApprove->setConsentCPPD($blankForm->getConsentCPPD());
                    $invalidStatusApprove->setIin($blankForm->getIin());
                    $invalidStatusApprove->setCode($blankForm->getCode());
                    $ap->setInvalidStatusApprove($invalidStatusApprove);

                    $ap->setPreferenceKey(0);

                    $accompanyingDocument = new AccompanyingDocument();
                    $accompanyingDocument->setDocumentNumber($blankForm->getDisabilityCard());
                    $ap->setAccompanyingDocument($accompanyingDocument);

                    if ($blankForm->getTariffType()->equals(TariffType::KID())) {
                        $ap->setChildPreference(3);
                    }

                    $blank->setAdditionalPreference($ap);

                    //PKT-589 костыль уберите когда в мобиусе решат проблему с валидацией
                    $passenger->setName(
                        new PassengerName(
                            'ааааа',
                            'бббббб'
                        )
                    );
                }
            }

            $blank->getPassengers()->add($passenger);
            $DCTSBlanks->add($blank);
        }

        $request->setBlanks($DCTSBlanks);
        $request->setMachineKey($this->getMachineKey());

        return $request;
    }

    public function createReservationEntity2KTJConfirmRequest(SaleRailwayReservation $reservation){
        $request = new ConfirmRequest();

        $request->setMachineKey($this->getMachineKey());
        $request->setOrderId($reservation->api_id);

        $tickets = new ArrayCollection();
        /**
         * @var $mdlTicket SaleRailwayTicket
         */
        foreach ($reservation->getRelatedTickets as $mdlTicket) {

            $ticket = new Ticket();
            $ticket->setTicketId($mdlTicket->api_id);
            $payment = new Payment();
            $payment->setTerminal($this->getKtjTerminal())
                ->setRequisite($mdlTicket->express_id)
                ->setAmount($mdlTicket->cost)
                ->setComission($mdlTicket->commission)
                ->setPaymentTimestamp(new DateTime());


            $ticket->setPayment($payment);

            $ticket->getPayment()->setSignature($this->getSignature($ticket));


            $tickets->add($ticket);
        }

        $request->setTickets($tickets);

        return $request;
    }

    public function getSignature(Ticket $ticket){
        $signatureRequest = new PaymentSignatureRequest();
        $signatureRequest->setTerminal( $ticket->getPayment()->getTerminal() );
        $signatureRequest->setPaymentTimestamp( $ticket->getPayment()->getPaymentTimestamp() );
        $signatureRequest->setService( $ticket->getPayment()->getService() );
        $signatureRequest->setRequisite( $ticket->getPayment()->getRequisite() );
        $signatureRequest->setAmount( $ticket->getPayment()->getAmount() );
        $signatureRequest->setComission( $ticket->getPayment()->getComission() );

        /**@var Signature $signature*/
        $signature = App::make(Signature::class);

        /**@var SerializerInterface $serializer*/
        $serializer = App::make(SerializerInterface::class);

        return $signature->sign($serializer->serialize(
            $signatureRequest,
            'json',
            SerializationContext::create()->setSerializeNull(true)
        ));

        /**
         * @var $signatureResponse PaymentSignatureResponse
         */
        /*$signatureResponse = $this->getKtjService()->getETicketService()->getSignatureAuthorized($signatureRequest);

        return $signatureResponse->getSignature( true );*/
    }


    /**
     * @return TariffTypeUtils|null
     */
    public function getTariffTypeUtils(): ?TariffTypeUtils
    {
        return $this->tariffTypeUtils;
    }

    /**
     * @param TariffTypeUtils|null $tariffTypeUtils
     */
    public function setTariffTypeUtils(?TariffTypeUtils $tariffTypeUtils): void
    {
        $this->tariffTypeUtils = $tariffTypeUtils;
    }

    /**
     * @return CarUtils|null
     */
    public function getCarUtils(): ?CarUtils
    {
        return $this->carUtils;
    }

    /**
     * @param CarUtils|null $carUtils
     */
    public function setCarUtils(?CarUtils $carUtils): void
    {
        $this->carUtils = $carUtils;
    }

    /**
     * @return PhoneNumberUtil|null
     */
    public function getPhoneNumberUtils(): ?PhoneNumberUtil
    {
        return $this->phoneNumberUtils;
    }

    /**
     * @param PhoneNumberUtil|null $phoneNumberUtils
     */
    public function setPhoneNumberUtils(?PhoneNumberUtil $phoneNumberUtils): void
    {
        $this->phoneNumberUtils = $phoneNumberUtils;
    }

    /**
     * @return SexUtils|null
     */
    public function getSexUtils(): ?SexUtils
    {
        return $this->sexUtils;
    }

    /**
     * @param SexUtils|null $sexUtils
     */
    public function setSexUtils(?SexUtils $sexUtils): void
    {
        $this->sexUtils = $sexUtils;
    }

    /**
     * @return string|null
     */
    public function getMachineKey(): ?string
    {
        return $this->machineKey;
    }

    /**
     * @param string|null $machineKey
     */
    public function setMachineKey(?string $machineKey): void
    {
        $this->machineKey = $machineKey;
    }

    /**
     * @return string|null
     */
    public function getKtjTerminal(): ?string
    {
        return $this->ktjTerminal;
    }

    /**
     * @param string|null $ktjTerminal
     */
    public function setKtjTerminal(?string $ktjTerminal): void
    {
        $this->ktjTerminal = $ktjTerminal;
    }

    /**
     * @return KTJService|null
     */
    public function getKtjService(): ?KTJService
    {
        return $this->ktjService;
    }

    /**
     * @param KTJService|null $ktjService
     */
    public function setKtjService(?KTJService $ktjService): void
    {
        $this->ktjService = $ktjService;
    }
}
