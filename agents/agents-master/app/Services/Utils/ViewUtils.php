<?php


namespace App\Services\Utils;


use App\AppModels\RailwayReservation\ReservationStatus;
use App\KTJ\Klabs\KTJBundle\KTJ\Utils\TimeSpan;
use App\Models\SaleRailwayCarType;
use App\Models\SaleRailwayReservation;
use App\Models\SaleRailwayStation;
use App\Models\User;
use App\Services\Helpers\ArrayHelper;
use \DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class ViewUtils
{
    public function getStationNameByCode($stationCode){
        /**
         * @var SaleRailwayStation $station
         */
        $station = SaleRailwayStation::where('station_code', $stationCode)->first();

        if($station != null){
            return $station->station_name_full;
        }

        return '';
    }

    public function getCarTypeName($code){
        /**
         * @var SaleRailwayCarType $carType
         */
        $carType = SaleRailwayCarType::where('dcts_code', $code)->first();

        if($carType != null){
            return $carType->name;
        }

        return '';
    }

    public function getRailwayReservationStatusName($status){
        if($status != null && is_int($status)){
            $ret = 'undefined';
            switch ($status){
                case ReservationStatus::RESERVATION_NEW:
                    $ret = 'new';
                    break;
                case ReservationStatus::RESERVATION_CONFIRMING:
                    $ret = 'confirming';
                    break;
                case ReservationStatus::RESERVATION_CONFIRMED:
                    $ret = 'confirmed';
                    break;
                case ReservationStatus::RESERVATION_CONFIRM_ERROR:
                    $ret = 'confirm error';
                    break;
                case ReservationStatus::RESERVATION_RETURNING:
                    $ret = 'returning';
                    break;
                case ReservationStatus::RESERVATION_RETURNED:
                    $ret = 'returned';
                    break;
                case ReservationStatus::RESERVATION_RETURNED_MANUAL:
                    $ret = 'returned manual';
                    break;
                case ReservationStatus::RESERVATION_RETURN_ERROR:
                    $ret = 'return error';
                    break;
                case ReservationStatus::RESERVATION_CANCELED:
                    $ret = 'canceled';
                    break;
                default:
                    break;
            }

            return $ret;
        }

        return 'undefined';
    }

    function getDepartureTimeText(SaleRailwayReservation $reservation, $onMissing = false)
    {

        if (null !== ($departureTimeZone = $reservation->departure_time_zone)) {
            return implode('.', ['ticket','reservation','timezone','departure',$reservation->departure_time_zone]);
        } else {
            return $onMissing;
        }
    }

    function getArrivalTimeText(SaleRailwayReservation $reservation, $onMissing = false)
    {
        if (null !== ($departureTimeZone = $reservation->arrival_time_zone)) {
            return implode('.', ['ticket','reservation','timezone','arrival',$reservation->arrival_time_zone]);
        } else {
            return $onMissing;
        }
    }

    function formatDate(?DateTime $date, string $format='d-m-Y'){
        if($date == null){
            return '';
        }

        return $date->format($format);
    }

    function localizedDate($date, $dateFormat = 'medium', $timeFormat = 'medium', $locale = null, $timezone = null, $format = null, $calendar = 'gregorian')
    {


        return $date->format('d-m-Y H:i');
    }

    function getTariffTypeName($tariffType){
        if($tariffType == 0){
            return 'Полный';
        }elseif($tariffType == 1){
            return 'Детский';
        }

        return '';
    }

    public function getCarText($carType, $onEmpty=false)
    {
        $types = [
            1 => "Общий",
            2 => "Сидячий",
            3 => "Плацкарт",
            4 => "Купе",
            5 => "Мягкий",
            6 => "Люкс",
        ];

        return ArrayHelper::getValue($types, $carType, $onEmpty);
    }

    /**
     * @return string
     */
    function displayAlert()
    {
        if (Session::has('error'))
        {
            $message = Session::get('error');
            $type = 'danger';


            return sprintf('<div class="alert alert-%s">%s</div>', $type, $message);
        }

        return '';
    }


    function getBoolIfElectronicTicket($order)
    {
        $elTicketStatus = "";
        foreach($order->getRailwayReservationsRelations as $railwayReservation) {
            foreach ($railwayReservation->getRelatedTickets as $ticket) {
                $elTicketStatus = $ticket->el_reg_status;
            }
        }

        return $elTicketStatus;
    }

    /**
     * @param $order
     * @return array
     */
    function getPassengers($order){

        $ret = [];

        foreach($order->getRailwayReservationsRelations as $railwayReservation){
            foreach($railwayReservation->getRelatedTickets as $ticket){
                foreach($ticket->getRelatedPassengers as $passenger){
                    if(!key_exists($passenger->name, $ret)){
                        $ret[$passenger->name] = [
                            'name' => $passenger->name,
                            'document' => $passenger->document,
                            'birthday'=> $passenger->birthday != null ? $passenger->birthday->format("d.m.Y") : '',
                            'type'=>'',
                            'count'=> count($ticket->getRelatedPassengers),
                            'data'=>[]
                        ];
                    }

                    $status = 'PR';
                    if($railwayReservation->status == ReservationStatus::RESERVATION_CONFIRMED){
                        $status='OK';
                    }
                    if($railwayReservation->status == ReservationStatus::RESERVATION_RETURNED){
                        $status='RF';
                    }
                    $ret[$passenger->name]['data'][] = [
                        'place'=> $ticket->seats,
                        'status'=> $status
                    ];
                }
            }
        }
        return $ret;
    }

    function cost($order){
        $ret = [];

        foreach($order->getRailwayReservationsRelations as $railwayReservation){
            $tariff = 0;
            $fees = 0;
            $agentFees = 0;

            foreach($railwayReservation->getRelatedTickets as $ticket){
                $tariff += $ticket->cost;
                $fees += $ticket->system_commission;
                $agentFees += $ticket->agents_own_commission;
            }

            $ret[] = [
                'direction'=> $railwayReservation->direction,
                'reservationId'=> $railwayReservation->id,
                'tariff'=> $tariff,
                'fees'=> $fees,
                'agentFees'=> $agentFees,
                'total'=>  $tariff + $fees + $agentFees,
            ];
        }

        return $ret;
    }

    function costForInfo($order){
        $ret = [];

        foreach($order->getRailwayReservationsRelations as $railwayReservation){
            $tariff = 0;
            $fees = 0;
            $agentFees = $railwayReservation->agents_own_commission;

            foreach($railwayReservation->getRelatedTickets as $ticket){
                $tariff += $ticket->cost;
                $fees += $ticket->system_commission;
            }

            $ret[] = [
                'direction'=> $railwayReservation->direction,
                'reservationId'=> $railwayReservation->id,
                'tariff'=> $tariff,
                'fees'=> $fees,
                'agentFees'=> $agentFees,
                'total'=>  $tariff + $fees + $agentFees,
            ];
        }


        usort($ret, function ($a, $b){
            if($a['direction'] == 'backward'){
                return 1;
            }

            return 0;
        });

        return $ret;
    }

    function isWoBeddingAvailable($directionData)
    {
        $interVal  = new \DateInterval('PT6H');
        $carType = $directionData->getCarType();
        $forwardTimeInWay = TimeSpan::fromTimeSpan($directionData->getTimeInWay())->getInterval();

        $date = new \DateTime("now");

        if ((clone $date)->add($forwardTimeInWay) < (clone $date)->add($interVal) && $carType === 'Плацкартный') {
            return true;
        }

        return false;
    }

    public function mbUcfirst($string){
        return mb_strtoupper(mb_substr($string, 0, 1)).mb_substr($string, 1);
    }

    public function getTicketCost($ticket){
        $ticketsCount = 0;
        $reservation = $ticket->reservation;
        foreach($reservation->getRelatedTickets as $ticket1){
            $ticketsCount++;
        }

        return $ticket->cost + $ticket->system_commission + $reservation->agents_own_commission/$ticketsCount;
    }

    public function getAgentTicketFee($ticket){
        $ticketsCount = 0;
        $reservation = $ticket->reservation;
        foreach($reservation->getRelatedTickets as $ticket1){
            $ticketsCount++;
        }

        return /*$ticket->tariff_dealer + */ $ticket->system_commission + $reservation->agents_own_commission/$ticketsCount;
    }

    public function getNds($sum){
        return $sum * 0.12;
    }

    public function getAgentRoleName($role){
        $ret = '';
        switch ($role){
            case User::ROLE_AGENT:
                $ret = 'agent';
                break;
            case User::ROLE_AGENT_ADMIN:
                $ret = 'agent_admin';
                break;
            default:
                $ret = '';
                break;
        }

        return $ret;
    }

    public function getAgentRolesList(){
        $ret = [];
        $ret[User::ROLE_AGENT]= trans('user.roles.agent');
        $ret[User::ROLE_AGENT_ADMIN]= trans('user.roles.agent_admin');

        return $ret;
    }

    public function getIinFromDocNumber($docuemtnNumber){
        $a = explode(',', $docuemtnNumber);

        $ret = [];
        foreach ($a as $dn){
            if(mb_substr($dn, 0, 2) == "ИИ"){
                $ret[] = mb_substr($dn, 2);
            }
        }

        return implode(", ", $ret );
    }

    public function getUpDownOptions($seats){
        $ret = [
            'Не важно' => serialize([null, null])
        ];
        if ($seats != null || $seats != 0) {		
			if (count($seats)) {
				$max = count($seats);
				if ($max > 4) {
					$max = 4;
				}
				for ($i = 0; $i <= $max; $i++) {
					$j = $max - $i;
					$ret[implode("------", [
						'нижнее: '.$i,
						'верхнее: '. $j
					])] = serialize([$i, $j]);
				}
			}
		}
        return $ret;
    }

    public function sortReservations($order){
        $reservations = $order->getRailwayReservationsRelations;

        $ret = [];
        foreach ($reservations as $reservation){
            $ret[] = $reservation;
        }


        usort($ret, function ($a, $b){
            if($a->direction == 'backward'){
                return 1;
            }

            return 0;
        });

        return $ret;
    }

    public function getOrderRemainingTime($reservation){
        $diff = Carbon::now()->diffInMinutes($reservation->created_at);

        if($diff < 15){
            return 15 - $diff;
        }

        return 0;
    }
}
