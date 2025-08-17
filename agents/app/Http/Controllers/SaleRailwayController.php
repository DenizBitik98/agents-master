<?php

namespace App\Http\Controllers;

use App\AppModels\RailwayReservation\ReservationStatus;
use App\Common\Utils\DayShiftUtils;
use App\Events\RailwayBuyAfter;
use App\Events\RouteSearchAfter;
use App\Http\Requests\Railway\BuyRequest;
use App\Http\Requests\Railway\SearchCarRequest;
use App\Http\Requests\Railway\SearchTrainRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Passenger;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ReserveResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Ticket;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnTicketRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnTicketResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route\TrainRouteRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\CarSearchRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\DepDate;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Direction;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Train;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\Models\Agent;
use App\Models\Country;
use App\Models\Reservation;
use App\Models\SaleRailwayCarType;
use App\Models\SaleRailwayDocument;
use App\Models\SaleRailwayPassenger;
use App\Models\SaleRailwayReservation;
use App\Models\SaleRailwayStation;
use App\Models\SaleRailwayTicket;
use App\Services\KTJ\KTJService;
use App\Services\Utils\BalanceUtils;
use App\Services\Utils\Railway\ReservationConfirmService;
use App\Services\Utils\Railway\ReservationUtils;
use App\Services\Utils\SexUtils;
use App\Services\Utils\Utils;
use App\ViewModels\Sale\Railway\Buy\BlankForm;
use App\ViewModels\Sale\Railway\Buy\BuyForm;
use App\ViewModels\Sale\Railway\Train\SearchModel;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Repository\AnnouncementRepository;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Spatie\Async\Pool;


class SaleRailwayController extends Controller
{
    /**
     * @var null |  KtjService
     */
    protected $ktjService = null;
    /**
     * @var null | Utils
     */
    protected $utils = null;
    /**
     * @var null | BalanceUtils
     */
    protected $balanceUtils = null;
    /**
     * @var null | ReservationUtils
     */
    protected $reservationUtils = null;
    /**
     * @var null | SexUtils
     */
    protected $sexUtils = null;
    /**
     * @var null | ReservationConfirmService
     */
    protected $reservationConfirmService = null;



    public function __construct(
        KtjService $ktjService,
        BalanceUtils $balanceUtils,
        ReservationUtils $reservationUtils,
        ReservationConfirmService $reservationConfirmService ,
        AnnouncementRepository $announcementRepository
    )
    {
        $this->utils = new Utils($ktjService->getMachineKey());

        $this->ktjService = $ktjService;
        $this->balanceUtils = $balanceUtils;
        $this->reservationUtils = $reservationUtils;
        $this->reservationConfirmService = $reservationConfirmService;
        $this->announcementrepo = $announcementRepository;

        $this->sexUtils = new SexUtils();

        $this->middleware('auth');
    }

    public function searchStation(Request $request)
    {
        $stations = SaleRailwayStation::where('station_name_full', 'LIKE', '%'.mb_strtoupper($request->get('term')).'%')
            ->whereIn('station_type', [0, 2])
            ->get();

        $stData = [];

        foreach ($stations as $station){
            $stData[] = [
                'value'=>$station->station_name_full,
                'id'=>$station->station_code,
            ];
        }

        return response()->json($stData);
    }

    public function getStationsVersion(Request $request)
    {
        return response()->json(1);
    }

    public function getStationsCount(Request $request)
    {
        $stationsCount = SaleRailwayStation::whereIn('station_type', [0, 2])->count();

        return response()->json($stationsCount);
    }

    public function getStations(Request $request)
    {

        $stations = SaleRailwayStation::whereIn('station_type', [0, 2])->skip($request->get('page', 0) * 100)->take(100)->get();

        $stData = [];

        foreach ($stations as $station){
            $stData[] = [
                'value'=>$station->station_name_full,
                'id'=>$station->station_code,
            ];
        }

        return response()->json($stData);
    }

    public function searchTrain()
    {
        $searchModel = new SearchModel();

		$abc0 = '';
		$abc1 = '';
		$abc2 = '';
		$abc3 = '';
		$abc4 = '';
		$abc5 = '';
		$abc6 = '';

		$abc00 = '';
		$abc11 = '';
		$abc22 = '';
		$abc33 = '';
		$abc44 = '';
		$abc55 = '';
		$abc66 = '';

        $dayShifts = DayShiftUtils::getDayShiftChoices();
        $carTypes = SaleRailwayCarType::all();
        $announcements = $this->announcementrepo->getAllAnnouncement();

		$myArrayResponse = [];
		$myArrayResponseTime = null;
		$results = null;
		$executionTime = null;

        $ktjResponse = null;
        $ktjResponse_add1 = null;
        $ktjResponse_add2 = null;
        $ktjResponse_add3 = null;
        $ktjResponse_add4 = null;
        $ktjResponse_add5 = null;
        $ktjResponse_add6 = null;

        return view('railway.searchForm', [
            'dayShifts'=>$dayShifts,
            'carTypes'=>$carTypes,
            'ktjResponse'=>$ktjResponse,
            'ktjResponse_add1'=>$ktjResponse_add1,
            'ktjResponse_add2'=>$ktjResponse_add2,
            'ktjResponse_add3'=>$ktjResponse_add3,
            'ktjResponse_add4'=>$ktjResponse_add4,
            'ktjResponse_add5'=>$ktjResponse_add5,
            'ktjResponse_add6'=>$ktjResponse_add6,

            'searchModel'=>$searchModel,

            'announcements'=>$announcements,

			'results' => $results,
			'executionTime' => $executionTime,


            'abc0'=>$abc0,
            'abc1'=>$abc1,
            'abc2'=>$abc2,
            'abc3'=>$abc3,
            'abc4'=>$abc4,
            'abc5'=>$abc5,
            'abc6'=>$abc6,

            'abc00'=>$abc00,
            'abc11'=>$abc11,
            'abc22'=>$abc22,
            'abc33'=>$abc33,
            'abc44'=>$abc44,
            'abc55'=>$abc55,
            'abc66'=>$abc66,
        ]);
    }

    public function searchResPar(SearchTrainRequest $request, int $day)
    {
        $searchModel = $request->getData();

		$abc1 = Carbon::parse($searchModel->getDepartureDate())->addDays($day)->format('d-m-Y');

		$abc11 = Carbon::parse($searchModel->getDepartureDate())->addDays($day);

        $searchModel_add1 = $request->getData();
        $searchModel_add1->setDepartureDate($abc11);

        $searchRequest_add1 = $this->utils->buildRouteSearchRequest($searchModel_add1);

        try {
            $ktjResponse_add1 = $this->ktjService->getSearchPlacesService()->searchAuthorized($searchRequest_add1);
            RouteSearchAfter::dispatch($searchModel_add1, $ktjResponse_add1);
			return array('x' =>$ktjResponse_add1, 'y'=>$abc1, 'z'=>"---------");

        }catch (ClientException $exception) {
            $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());

            $ktjResponse_add1 = null;
		    return array('x' =>$ktjResponse_add1, 'y'=>$abc1, 'z'=>$dctsException->getMessage() );
        }
        catch (\Exception $e){

            $ktjResponse_add1 = null;
		    return array('x' =>$ktjResponse_add1, 'y'=>$abc1, 'z'=>$e->getMessage() );
        }

        return array('x' =>null, 'y'=>null, 'z'=>null);
    }

    public function searchTrainResult(SearchTrainRequest $request)
    {
		$requestIt = $request;

		$searchModel = $request->getData();

		$myArrayRequest = [];
		$myArrayResponse = [];
		$myArrayResponseTime = [];
		$results = null;
		$executionTime = null;

		if($request->has('days3'))
		{
			array_push($myArrayRequest, -3, -2, -1, 0, 1, 2, 3);
			session(['ktjid' => 3]);
		}
		else
		{
			array_push($myArrayRequest, 0);
			session(['ktjid' => 0]);
		}

		$pool = Pool::create();

		foreach ($myArrayRequest as $thing) {
			$pool->add(function () use ($thing, $requestIt) {
				$thing1=$this->searchResPar($requestIt, $thing);
				return $thing1;
			})->then(function ($output)  use ($myArrayResponse) {
				array_push($myArrayResponse, $output);
			})->catch(function (ClientException $exception) {

			})->catch(function (\Exception $e) {

			});
		}

		$startTime1 = microtime(true);
		$results = $pool->wait();
		$endTime = microtime(true);
		$executionTime = $endTime - $startTime1;

        $dayShifts = DayShiftUtils::getDayShiftChoices();
        $carTypes = SaleRailwayCarType::all();
        $announcements = $this->announcementrepo->getAllAnnouncement();

		if(isset($results[0]['x'])) { $x0 = $results[0]['x']; } else { $x0 = null;}
		if(isset($results[1]['x'])) { $x1 = $results[1]['x']; } else { $x1 = null;}
		if(isset($results[2]['x'])) { $x2 = $results[2]['x']; } else { $x2 = null;}
		if(isset($results[3]['x'])) { $x3 = $results[3]['x']; } else { $x3 = null;}
		if(isset($results[4]['x'])) { $x4 = $results[4]['x']; } else { $x4 = null;}
		if(isset($results[5]['x'])) { $x5 = $results[5]['x']; } else { $x5 = null;}
		if(isset($results[6]['x'])) { $x6 = $results[6]['x']; } else { $x6 = null;}

		if(isset($results[0]['y'])) { $y0 = $results[0]['y']; } else { $y0 = null;}
		if(isset($results[1]['y'])) { $y1 = $results[1]['y']; } else { $y1 = null;}
		if(isset($results[2]['y'])) { $y2 = $results[2]['y']; } else { $y2 = null;}
		if(isset($results[3]['y'])) { $y3 = $results[3]['y']; } else { $y3 = null;}
		if(isset($results[4]['y'])) { $y4 = $results[4]['y']; } else { $y4 = null;}
		if(isset($results[5]['y'])) { $y5 = $results[5]['y']; } else { $y5 = null;}
		if(isset($results[6]['y'])) { $y6 = $results[6]['y']; } else { $y6 = null;}

		if(isset($results[0]['z'])) { $z0 = $results[0]['z']; } else { $z0 = null;}
		if(isset($results[1]['z'])) { $z1 = $results[1]['z']; } else { $z1 = null;}
		if(isset($results[2]['z'])) { $z2 = $results[2]['z']; } else { $z2 = null;}
		if(isset($results[3]['z'])) { $z3 = $results[3]['z']; } else { $z3 = null;}
		if(isset($results[4]['z'])) { $z4 = $results[4]['z']; } else { $z4 = null;}
		if(isset($results[5]['z'])) { $z5 = $results[5]['z']; } else { $z5 = null;}
		if(isset($results[6]['z'])) { $z6 = $results[6]['z']; } else { $z6 = null;}

        Cache::store('redis')->put('ktjResponse', $x0 );
        Cache::store('redis')->put('ktjResponse_add1', $x1 );
        Cache::store('redis')->put('ktjResponse_add2', $x2 );
        Cache::store('redis')->put('ktjResponse_add3', $x3 );
        Cache::store('redis')->put('ktjResponse_add4', $x4 );
        Cache::store('redis')->put('ktjResponse_add5', $x5 );
        Cache::store('redis')->put('ktjResponse_add6', $x6 );

        Cache::store('redis')->put('dayShifts', $dayShifts);
        Cache::store('redis')->put('carTypes', $carTypes);
        Cache::store('redis')->put('searchModel', $searchModel);

		session(['abc0' => $y0]);
		session(['abc1' => $y1]);
		session(['abc2' => $y2]);
		session(['abc3' => $y3]);
		session(['abc4' => $y4]);
		session(['abc5' => $y5]);
		session(['abc6' => $y6]);

        return view('railway.searchForm', [
            'dayShifts'=>$dayShifts,
            'carTypes'=>$carTypes,
            'searchModel'=>$searchModel,

			'myArrayResponseTime' => $myArrayResponseTime,
			'executionTime' => $executionTime,
			'results' => $results,

            'ktjResponse'=>$x0,
            'ktjResponse_add1'=>$x1,
            'ktjResponse_add2'=>$x2,
            'ktjResponse_add3'=>$x3,
            'ktjResponse_add4'=>$x4,
            'ktjResponse_add5'=>$x5,
            'ktjResponse_add6'=>$x6,

            'abc0'=>$y0,
            'abc1'=>$y1,
            'abc2'=>$y2,
            'abc3'=>$y3,
            'abc4'=>$y4,
            'abc5'=>$y5,
            'abc6'=>$y6,

            'abc00'=>$z0,
            'abc11'=>$z1,
            'abc22'=>$z2,
            'abc33'=>$z3,
            'abc44'=>$z4,
            'abc55'=>$z5,
            'abc66'=>$z6,

            'announcements'=>$announcements,
        ]);
    }

    public function searchResult()
    {
		$id = $_GET['id'];

		switch ($id) {
			case 0:
				session(['departureDate' => session('abc0')]);
				session(['ktjid' => 0]);
				break;
			case 1:
				session(['departureDate' => session('abc1')]);
				session(['ktjid' => 1]);
				break;
			case 2:
				session(['departureDate' => session('abc2')]);
				session(['ktjid' => 2]);
				break;
			case 3:
				session(['departureDate' => session('abc3')]);
				session(['ktjid' => 3]);
				break;
			case 4:
				session(['departureDate' => session('abc4')]);
				session(['ktjid' => 4]);
				break;
			case 5:
				session(['departureDate' => session('abc5')]);
				session(['ktjid' => 5]);
				break;
			case 6:
				session(['departureDate' => session('abc6')]);
				session(['ktjid' => 6]);
				break;
		}

		return response()->json(true);
    }

    public function searchResPar60($searchModel, int $day)
    {
        $searchModel = $searchModel;

		$abc1 = Carbon::parse($searchModel->getDepartureDate())->addDays($day)->format('d-m-Y');

		$abc11 = Carbon::parse($searchModel->getDepartureDate())->addDays($day);

        $searchModel_add1 =  $searchModel;
        $searchModel_add1->setDepartureDate($abc11);

        $searchRequest_add1 = $this->utils->buildRouteSearchRequest($searchModel_add1);

        try {
            $ktjResponse_add1 = $this->ktjService->getSearchPlacesService()->searchAuthorized($searchRequest_add1);
            RouteSearchAfter::dispatch($searchModel_add1, $ktjResponse_add1);
			return array('x' =>$ktjResponse_add1, 'y'=>$abc1, 'z'=>"---------");

        }catch (ClientException $exception) {
            $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());

            $ktjResponse_add1 = null;
		    return array('x' =>$ktjResponse_add1, 'y'=>$abc1, 'z'=>$dctsException->getMessage() );
        }
        catch (\Exception $e){

            $ktjResponse_add1 = null;
		    return array('x' =>$ktjResponse_add1, 'y'=>$abc1, 'z'=>$e->getMessage() );
        }

        return array('x' =>null, 'y'=>null, 'z'=>null);
    }

    protected function findStationByCode(string $code){
        return SaleRailwayStation::where('station_code', '=', $code)->first();
    }

    public function search60Result($dcs, $acs)
    {
		$dcs = $dcs;
		$acs = $acs;

        $searchModel = new SearchModel();

        $searchModel->setDepartureStationCode($dcs);
        $searchModel->setArrivalStationCode($acs);
        //$searchModel->setDepartureDate(Carbon::now());

        if($searchModel->getDepartureStationCode() != null){
            $searchModel->setDepartureStation($this->findStationByCode($searchModel->getDepartureStationCode()));
        }

        if($searchModel->getArrivalStationCode() != null){
            $searchModel->setArrivalStation($this->findStationByCode($searchModel->getArrivalStationCode()));
        }

		$myArrayRequest = [];
		$myArrayResponse = [];
		$myArrayResponseTime = [];
		$results = null;
		$executionTime = null;

		array_push($myArrayRequest
		, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
		, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
//		, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
//		, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
		, 1, 1, 1, 1, 1
		, 1, 1, 1, 1, 1);

		$pool = Pool::create();

		foreach ($myArrayRequest as $thing) {
			$pool->add(function () use ($thing, $searchModel) {
				$thing1=$this->searchResPar60($searchModel, $thing);
				return $thing1;
			})->then(function ($output)  use ($myArrayResponse) {
				array_push($myArrayResponse, $output);
			})->catch(function (ClientException $exception) {

			})->catch(function (\Exception $e) {

			});
		}

		$startTime1 = microtime(true);
		$results = $pool->wait();
		$endTime = microtime(true);
		$executionTime = $endTime - $startTime1;

		//session(['ktj60' => $results]);
		//session(['ktj60time' => $executionTime]);

		session(['results60' => $results]);

		$dcs1 = '';
		$acs1 = '';

		if ($searchModel->getDepartureStation()!=null && $searchModel->getArrivalStation() !=null) {
			$dcs1 = $searchModel->getDepartureStation()->station_name_full;
			$acs1 = $searchModel->getArrivalStation()->station_name_full;
		}

        return view('railway.searchResult', [

			'executionTime' => $executionTime,
			'results' => $results,
			'dcs1' => $dcs1,
			'acs1' => $acs1,
        ]);

    }

    public function searchCarsResult(SearchCarRequest $request)
    {
        $ktjResponse = $this->ktjService->getSearchPlacesService()
            ->searchCarsAuthorized($request->getData());

        $this->utils->filterSimilarCar($ktjResponse);


        $dayShifts = DayShiftUtils::getDayShiftChoices();
        $carTypes = SaleRailwayCarType::all();


        return view('railway.searchCarsResult', [
            'dayShifts' => $dayShifts,
            'carTypes' => $carTypes,
            'ktjResponse' => $ktjResponse,
            'stationFrom' => $request->getStationFrom(),
            'stationTo' => $request->getStationTo(),
            'forwardDepDate' => $request->getForwardDetDate(),
            'isObligativeElReg' => $request->getIsObligativeElReg(),
        ]);
    }

    public function buy(BuyRequest $request)
    {
        $user = Auth::user();
        $buyForm = $request->getData();
        if($request->isMethod($request::METHOD_POST)){


            $order = new Reservation();
            $order->user_id = $user->id;
            $order->agent_id = $user->agent_id;
            $order->email = $user->email;

            $byRequestForward = $this->utils->buildReserveRequest($buyForm->getForwardDirection(), $buyForm->getBlanks(), $user);


            $ktjResponseForward = $this->ktjService->getETicketService()->reservationReserveAuthorized($byRequestForward);

            $order->addRailwayReservation($this->createDbReservation($ktjResponseForward, SaleRailwayReservation::DIRECTION_FORWARD));

            if($buyForm->getBackwardDirection() != null
                    && strlen($buyForm->getBackwardDirection()->getTrain())){
                $byRequestBackward = $this->utils->buildReserveRequest($buyForm->getBackwardDirection(), $buyForm->getBlanks(), $user);

                $ktjResponseBackward = $this->ktjService->getETicketService()->reservationReserveAuthorized($byRequestBackward);

                $order->addRailwayReservation($this->createDbReservation($ktjResponseBackward, SaleRailwayReservation::DIRECTION_BACKWARD));
            }

            DB::beginTransaction(); //Start transaction!
            $agent = $this->getAgent();
            try{

                $order->save();
                /**@var SaleRailwayReservation $reservation*/
                foreach ($order->getRailwayReservations() as $reservation){
                    $reservation->reservation_id = $order->id;

                    $reservation->save();
                    /**@var SaleRailwayTicket $ticket*/
                    foreach ($reservation->getTickets() as $ticket){
                        $ticket->reservation_id = $reservation->id;

                        $ticket->system_commission = $agent->commission;
                        $ticket->agents_own_commission = $agent->own_commission;

                        $ticket->save();

                        /**@var SaleRailwayPassenger $passenger*/
                        foreach ($ticket->getPassengers() as $passenger){
                            $passenger->ticket_id = $ticket->id;

                            $passenger->save();
                        }
                    }
                }

                DB::commit();

                RailwayBuyAfter::dispatch($buyForm, $agent);

                return redirect()->route('confirmReservation', [
                    'reservationId' => $order->id
                ]);
            }
            catch(\Exception $e)
            {

                DB::rollback();

                throw $e;
                //failed logic here

            }
        }else{

        }

        $docTypes = SaleRailwayDocument::all();
        $countries = Country::all();
        $sexList = $this->sexUtils->getForForm();

        return view('railway.buy', [
            'buyForm'=>$buyForm,
            'docTypes'=>$docTypes,
            'countries'=>$countries,
            'sexList'=>$sexList,
            'stationFrom'=>'',
            'stationTo'=>'',
            'isObligativeElReg' => $request->getIsObligativeElReg(),
        ]);
    }




    public function confirm(Request $request){

        $reservationId = $request->get('reservationId', false);

        $agentFees = $request->get('agentFees', false);

        /**
         * @var $reservation Reservation
         */
        if($reservationId != false && ($reservation = Reservation::find($reservationId)) instanceof Reservation){
            //$this->denyAccessUnlessGranted(RailwayTicketVoter::ACCESS_OWN_RESERVATION, $reservation);

            if($reservation->isPayed()){
                return view('railway.pay.payed', []);
            }
        }


        if($request->isMethod(Request::METHOD_POST)){
            $validated = $request->validate([
                'agentFees.*' => 'required|integer|min:0'
            ]);

            $bayResult = $this->reservationUtils->buy($reservation, $this->getAgent());

            if($bayResult == ReservationUtils::BUY_RESULT_OK){
                /**
                 * @var SaleRailwayReservation $rr
                 */
                foreach ($reservation->getRailwayReservationsRelations as $rr) {
                    $rr->is_available_for_confirm = true;
                    $rr->status = ReservationStatus::RESERVATION_CONFIRMING;
                    $rr->system_commission = 0;
                    $rr->agents_own_commission = $agentFees[$rr->id];

                    $ticketsCount = 0;
                    foreach($rr->getRelatedTickets as $ticket){
                        $ticket->status_id = ReservationStatus::RESERVATION_CONFIRMING;
                        $ticket->save();

                        $ticketsCount++;
                    }

                    if($ticketsCount>0){
                        $commissionPerTicket = $rr->agents_own_commission/$ticketsCount;
                        foreach($rr->getRelatedTickets as $ticket){
                            $ticket->agents_own_commission = $commissionPerTicket;
                            $ticket->save();
                        }
                    }

                    $rr->save();

                    try{
                        $this->reservationConfirmService->confirmReservation($rr);
                    }catch (\Exception $e){
                        //do nothing
                    }

                }

                return redirect()->route('orders', []);
            }elseif($bayResult == ReservationUtils::BUY_RESULT_NOT_ENOUGH_MONEY){

                Session::flash('error', "Не хватает баланса");

            }elseif ($bayResult == ReservationUtils::BUY_RESULT_UNKNOWN_ERROR){

                Session::flash('error', "Неизвестная ошибка");
            }
        }

        return view('orders.railway.info', [
            'order'=>$reservation
        ]);
    }

    public function cancel(Request $request){
        $reservationId = $request->get('reservationId', false);
        /**
         * @var $reservation Reservation
         */
        if($reservationId != false && ($reservation = Reservation::find($reservationId)) instanceof Reservation){
            if($reservation->isPayed()){
                return view('railway.pay.payed', []);
            }
        }


        if($request->isMethod(Request::METHOD_POST)){
            /**
             * @var SaleRailwayReservation $rr
             */
            foreach ($reservation->getRailwayReservationsRelations as $rr) {

                $rr->status = ReservationStatus::RESERVATION_CANCELED;

                foreach($rr->getRelatedTickets as $ticket){
                    $ticket->status_id = ReservationStatus::RESERVATION_CANCELED;
                    $ticket->save();
                }

                $rr->save();
            }
        }

        return redirect()->route('orders', []);
    }

    public function trainRoute(Request $request)
    {
        $trainNumber = $request->input('train');
        $date = $request->date('date');
        $station = $request->input('station');

        $request = new TrainRouteRequest();

        $request->setDate($date);
        $request->setTrainNumber($trainNumber);
        $request->setStation($station);

        $routes = $this->ktjService->getSearchPlacesService()->routeAuthorized($request);

        return view('railway.train.trainRoute', [
            'routes'=>$routes
        ]);
    }


    /**
     * @return Agent
     */
    protected function getAgent(){
        $agentId = Auth::user()->agent_id;
        $agent = Agent::find($agentId);

        return $agent;
    }


    /**
     * @param ReserveResponse $reservation
     * @param string $direction
     * @return SaleRailwayReservation
     */
    protected function createDbReservation(ReserveResponse $reservation, string $direction){

        $dbReservation = new SaleRailwayReservation();
        $dbReservation->api_id = $reservation->getOrder()->getId();
        $dbReservation->express_id = $reservation->getOrder()->getExpressID();
        $station = SaleRailwayStation::where('station_code', '=', $reservation->getDeparture()->getStationCode())->first();

        $dbReservation->departure_station_id = $station->id;

        $dbReservation->departure_time = $reservation->getDeparture()->getDate();

        $station = SaleRailwayStation::where('station_code', '=', $reservation->getArrival()->getStationCode())->first();
        $dbReservation->arrival_station_id = $station->id;

        $dbReservation->arrival_time = $reservation->getArrival()->getDate();
        $dbReservation->iidb = $reservation->getIIDB();
        $dbReservation->reserved_at = $reservation->getOrder()->getCreateDate();
        $dbReservation->payment_type = $reservation->getOrder()->getPaymentType();
        $dbReservation->departure_train = $reservation->getDeparture()->getTrain();
        $dbReservation->arrival_train = $reservation->getArrival()->getTrain();
        $dbReservation->is_talgo = $reservation->getDeparture()->getisTalgoTrain();
        $dbReservation->car = $reservation->getCar()->getNumber();
        $dbReservation->car_type = $reservation->getCar()->getType();
        $dbReservation->carrier = $reservation->getCarrier()->getName();
        $dbReservation->bin = $reservation->getPayerInfo()->getBin();
        $dbReservation->nds = $reservation->getCarrier()->getInn();
        $dbReservation->service_class = $reservation->getCar()->getClassService();
        $dbReservation->sign_gb = $reservation->getSignGb();
        $dbReservation->carrier_name = $reservation->getCarrier()->getName();
        $dbReservation->carrier_inn = $reservation->getCarrier()->getInn();
        $dbReservation->car_carrier_name = $reservation->getCar()->getCarrierName();
        $dbReservation->payer_info_name = $reservation->getPayerInfo()->getName();
        $dbReservation->payer_info_bin = $reservation->getPayerInfo()->getBin();
        $dbReservation->payer_info_is_agent = $reservation->getPayerInfo()->getisAgent();
        $dbReservation->payer_info_is_vat_charged = $reservation->getPayerInfo()->getisVATCharged();
        $dbReservation->terminal_name = $reservation->getTerminalName();
        $dbReservation->terminal_znkkm = $reservation->getTerminalZNKKM() ? '1' : '';
        $dbReservation->departure_time_zone = $reservation->getDeparture()->getTimezone();
        $dbReservation->arrival_time_zone = $reservation->getArrival()->getTimezone();
        $dbReservation->status = ReservationStatus::RESERVATION_NEW;
        $dbReservation->is_confirmed = false;
        $dbReservation->is_available_for_confirm = false;

        foreach ($reservation->getTickets() as $ticket ){
            $dbReservation->addTicket($this->createDbTicket($ticket, $reservation));
        }

        $dbReservation->direction = $direction;
        return $dbReservation;

    }

    /**
     * @param Ticket $ticket
     * @return SaleRailwayTicket
     */
    protected function createDbTicket(Ticket $ticket, ReserveResponse $reservation){
        $dbTicket = new SaleRailwayTicket();
        $dbTicket->ticket_id = $ticket->getTicketId();
        $dbTicket->express_id = $ticket->getExpressID();
        $dbTicket->commission = $ticket->getComission();
        $dbTicket->cost = $ticket->getTariffPaymentTotal();
        $dbTicket->wo_bedding = $ticket->getNoBedding();
        $dbTicket->seats = implode(',', $ticket->getSeats()->toArray());
        $dbTicket->tariff = $ticket->getTariff();
        $dbTicket->tariff_b = $ticket->getTariffB();
        $dbTicket->tariff_p = $ticket->getTariffP();
        $dbTicket->tariff_service = $ticket->getTariffService();
        $dbTicket->tariff_nds = $ticket->getTariffNDS();
        $dbTicket->tariff_nds_service = $ticket->getTariffServiceNDS();
        $dbTicket->tariff_dealer = $ticket->getTariffDealer();
        $dbTicket->tariff_pwithout_service = $ticket->getTariffPWithoutService();
        $dbTicket->tariff_total = $ticket->getTariffTotal();
        $dbTicket->nds_certificate = $reservation->getPayerInfo()->getNDSCertificate();
        $dbTicket->discount = $ticket->getDiscountCard() ? $ticket->getDiscountCard() : '';
        $dbTicket->tariff_type = $ticket->getTariffType();
        $dbTicket->car_air_conditioning = $ticket->getCarAirConditioning();
        $dbTicket->eco_friendly_toilets = $ticket->getEcoFriendlyToilets();
        $dbTicket->system_commission = $ticket->getEcoFriendlyToilets();

        if($ticket->getSeatsType() == "Н"){
            $dbTicket->seats_type = "Н";
        }elseif ($ticket->getSeatsType() == "В"){
            $dbTicket->seats_type = "В";
        }

        if($ticket->getConsumerServices() != null){
            $dbTicket->cash_receipt_url = $ticket->getConsumerServices()->getCashReceiptUrl();
            $dbTicket->carry_on_baggage_url = $ticket->getConsumerServices()->getCarryOnBaggageUrl();
        }

        $dbTicket->barcode = '';
        $dbTicket->api_id = $ticket->getId();
        $dbTicket->status_id = ReservationStatus::RESERVATION_NEW;
        $dbTicket->payment_number = '';
        $dbTicket->el_reg_status = false;
        $dbTicket->fiscal_number = '';
        $dbTicket->terminal = '';
        $dbTicket->payment_info_rnm = '';
        $dbTicket->stop_date = new \DateTime();
        $dbTicket->tariff_dealer_nds = 0;
        $dbTicket->is_confirmed = false;
        $dbTicket->fiscal_document_number = '';
        $dbTicket->fiscalizator_type = 0;
        $dbTicket->fiscal_date = new \DateTime();
        $dbTicket->qr_code = '';

		if(session('femalew')== "ЖН")
        {
            $dbTicket->femalew = 'femalew';
        }
		else{
            $dbTicket->femalew = '';
        }

        foreach ( $ticket->getPassengers() as $passenger )
        {
            /** @var SaleRailwayPassenger $mdlPassenger */
            $mdlPassenger = new SaleRailwayPassenger();
            $mdlPassenger->name = $passenger->getName();
            $mdlPassenger->document = $passenger->getDoc();
            $mdlPassenger->citizenship = $passenger->getCitizenship();
            $mdlPassenger->birthday = $passenger->getBirthday();
            $mdlPassenger->sex = $passenger->getSex();

            $mdlPassenger->iin = $passenger->getIin();
            $mdlPassenger->internal_document = $passenger->getInternalDoc();

            $dbTicket->addPassenger($mdlPassenger);
        }

        return $dbTicket;
    }


    protected function testBuy()
    {
        $a = <<< EOL
{
	"Order": {
		"Id": 117042783,
		"ExpressID": "73350663069046",
		"CreateDate": "2025-04-02T21:40:00",
		"PaymentType": 0,
		"IsInternational": false,
		"StopDateTime": null
	},
	"Departure": {
		"Train": "043ТА",
		"Date": "2025-05-14T17:05:00",
		"Station": "АЛМАТЫ 1",
		"StationCode": "2700002",
		"IsTalgoTrain": false,
		"Timezone": 101,
		"DepartureDiffTime": 0
	},
	"Arrival": {
		"Train": "043Т",
		"Date": "2025-05-15T17:07:00",
		"Station": "АСТАНА-1",
		"StationCode": "2708000",
		"IsTalgoTrain": false,
		"Timezone": 101,
		"ArrivalDiffTime": 0
	},
	"TimeInWay": "1.00:02:00",
	"Carrier": {
		"Code": "18",
		"Inn": "СВ.СЕРИЯ62001 N0017019",
		"Name": "ТОО ТУРКСИБ АСТАНА"
	},
	"Car": {
		"Number": "15",
		"Type": 4,
		"ClassService": "2Л",
		"AddSigns": "У0",
		"OwnerType": "КЗХ",
		"CarrierName": "КЗХ БИН091040010015",
		"CarrierMnemocode": "ТУРСИБ"
	},
	"SeatsCount": 2,
	"Tickets": [
		{
			"Number": "1",
			"TicketId": 168736856,
			"ID": "173782274",
			"ExpressID": "73350663069046",
			"Tariff": 13984.0,
			"TariffNDS": 1498.0,
			"TariffBP": 13984.0,
			"TariffB": 8832.0,
			"TariffP": 5152.0,
			"TariffInsurance": 0.0,
			"TariffService": 1000.0,
			"TariffServiceNDS": 107.0,
			"TariffPaymentTotal": 13984.0,
			"TariffTotal": 13984.0,
			"TariffType": 0,
			"PassCount": 0,
			"Seats": [
				"025"
			],
			"SeatsType": "Н",
			"D5": false,
			"Passengers": [
				{
					"Doc": "ПКN12554722",
					"InternalDoc": "ИИ740205401060",
					"Name": "ИВАНОВ=ПЕТР=ИВАНОВИЧ",
					"BirthDay": "1974-02-05T00:00:00",
					"Citizenship": null,
					"Sex": null,
					"ChildInfo": null,
					"Iin": "740205401060"
				}
			],
			"TariffKtj": 0.0,
			"TariffDealer": 0.0,
			"Comission": 0.0,
			"NoBedding": false,
			"CarAirConditioning": false,
			"EcoFriendlyToilets": false,
			"PaymentInfo": null,
			"TariffWithoutService": 12984.0,
			"TariffPWithoutService": 4152.0,
			"TariffNDSWithoutServiceNDS": 1391.0,
			"BlankIdentity": null,
			"PrintBlankEnum": 1,
			"ExpoTicket": null,
			"DiscountCard": null,
			"ParentDocument": null,
			"ConsumerServices": {
				"CashReceiptUrl": "https://ofd.railways.kz/Home/CashReceipt?ticketId=168736856&code=00481&serviceType=0",
				"CarryOnBaggageUrl": "https://ofd.railways.kz/Home/CarryOnBaggage"
			}
		},
		{
			"Number": "2",
			"TicketId": 168736857,
			"ID": "173782275",
			"ExpressID": "73350663069050",
			"Tariff": 7496.0,
			"TariffNDS": 803.0,
			"TariffBP": 7496.0,
			"TariffB": 4416.0,
			"TariffP": 3080.0,
			"TariffInsurance": 0.0,
			"TariffService": 1000.0,
			"TariffServiceNDS": 107.0,
			"TariffPaymentTotal": 7496.0,
			"TariffTotal": 7496.0,
			"TariffType": 1,
			"PassCount": 0,
			"Seats": [
				"026"
			],
			"SeatsType": "В",
			"D5": false,
			"Passengers": [
				{
					"Doc": "СР7778794",
					"InternalDoc": "ИИ291210567457",
					"Name": "ПАРМОНОВ=ОЛЕГ=ИВАНОВИЧ",
					"BirthDay": "2010-12-29T00:00:00",
					"Citizenship": null,
					"Sex": null,
					"ChildInfo": null,
					"Iin": "291210567457"
				}
			],
			"TariffKtj": 0.0,
			"TariffDealer": 0.0,
			"Comission": 0.0,
			"NoBedding": false,
			"CarAirConditioning": false,
			"EcoFriendlyToilets": false,
			"PaymentInfo": null,
			"TariffWithoutService": 6496.0,
			"TariffPWithoutService": 2080.0,
			"TariffNDSWithoutServiceNDS": 696.0,
			"BlankIdentity": null,
			"PrintBlankEnum": 1,
			"ExpoTicket": null,
			"DiscountCard": null,
			"ParentDocument": null,
			"ConsumerServices": {
				"CashReceiptUrl": "https://ofd.railways.kz/Home/CashReceipt?ticketId=168736857&code=1E468&serviceType=0",
				"CarryOnBaggageUrl": "https://ofd.railways.kz/Home/CarryOnBaggage"
			}
		}
	],
	"IIDB": "КЗХ27",
	"SignR": null,
	"SignGb": "ВРЕМЯ МЕСТНОЕ",
	"TerminalName": "EchoDealerTerminal",
	"TerminalAddress": "г. Алматы улица Ауэзова 48, офис 6/1",
	"TerminalZNKKM": null,
	"BrunchBin": "041041009355",
	"PayerInfo": {
		"Name": "EchoBravo (ЭкоБраво)",
		"Bin": "200340001139",
		"NDSCertificate": "",
		"IsAgent": true,
		"IsVATCharged": true
	},
	"PrintedBlankInfo": {
		"ElRegPossible": null,
		"PrintBlank": 1
	},
	"DepartureAndArrivalTimeInfo": "Жөнелтуі Нур-Султан уақытымен, келу Нур-Султан уақытымен / Время отпр. Нур-Султан, время приб. Нур-Султан",
	"TerminalSkipFiscalization": true
}
EOL;

        $ktjResponseForward = $this->ktjService->getETicketService()->getSerializer()->deserialize(
            $a,
            ReserveResponse::class,
            'json'
        );


        $user = Auth::user();
        $order = new Reservation();
        $order->user_id = $user->id;
        $order->agent_id = $user->agent_id;
        $order->email = $user->email;

        $order->addRailwayReservation($this->createDbReservation($ktjResponseForward, SaleRailwayReservation::DIRECTION_FORWARD));

        $agent = $this->getAgent();
        $order->save();
        /**@var SaleRailwayReservation $reservation*/
        foreach ($order->getRailwayReservations() as $reservation){
            $reservation->reservation_id = $order->id;

            $reservation->save();
            /**@var SaleRailwayTicket $ticket*/
            foreach ($reservation->getTickets() as $ticket){
                $ticket->reservation_id = $reservation->id;

                $ticket->system_commission = $agent->commission;
                $ticket->agents_own_commission = $agent->own_commission;

                $ticket->save();

                /**@var SaleRailwayPassenger $passenger*/
                foreach ($ticket->getPassengers() as $passenger){
                    $passenger->ticket_id = $ticket->id;

                    $passenger->save();
                }
            }
        }

        return redirect()->route('orders', []);
    }

}
