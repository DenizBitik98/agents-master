<?php

namespace App\Http\Controllers;

use App\AppModels\RailwayReservation\ReservationStatus;
use App\Export\Orders1CExport;
use App\Export\OrdersExport;
use App\Http\Requests\Order\ExportOrderFilterRequest;
use App\Http\Requests\Order\FilterOrderRequest;
use App\Models\Agent;
use App\Models\Reservation;
use App\Models\SaleRailwayStation;
use App\ViewModels\Sale\Order\ExportFilterOrderForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function railwayOrders(FilterOrderRequest $request)
    {
        //$orders = Reservation::all();
        $filterModel = $request->getData();

        $limit = 10;
        $page = $request->get('page', 1);
        $offset = ($page - 1) * $limit;

        $query = <<<EOL
select r.id as id, u.name as username, r.id as order_number
     , concat(depst.station_name_full, '------>', arrst.station_name_full) as direction
     , count(passenger.id) as passengersCount
     , string_agg(passenger.name, ' ') as passengers_name
     , ticket.cost as cost
     , ticket.status_id as order_status
     -- , srr.payment_status as paymentStatus
     , srr.departure_time as departureDate
     , srr.arrival_time as arrivalDate
     , aa.id as agent_id
     , aa.company_name as agent_name
     , r.created_at as created_at
     , ticket.express_id as tickets
     , ticket.agents_own_commission as agents_own_commission
     , ticket.system_commission as system_commission
     , depst.station_name_full direction_from
     , depst.station_code station_from_code
     , arrst.station_name_full direction_to
     , arrst.station_code station_to_code
     , aa.bin bin
     , aa.contract_number contract_number
     , srr.departure_train train_number
     , srr.service_class service_class
     , srr.car car_number
     , ticket.seats seat
     , string_agg(passenger.document, ',') document_number
     , bool_or(passenger.sex) sex
     , string_agg(passenger.document, ',') iin
     , srr.payment_type payment_type
     , ticket.tariff_type tariff_type
     , u.email user_email
from sale_railway_ticket ticket

         left join sale_railway_reservation srr on srr.id = ticket.reservation_id
         left join reservation r on srr.reservation_id = r.id
         left join "users" u on r.user_id = u.id
         left join agents aa on u.agent_id = aa.id

         left join sale_railway_station depst on srr.departure_station_id = depst.id
         left join sale_railway_station arrst on srr.arrival_station_id = arrst.id
         left join sale_railway_passengers passenger on ticket.id = passenger.ticket_id


where 1=1
EOL;
        $agent = $this->getAgent();
        if ($agent != null){
            $query .= ' and aa.id = '.$agent->id;
        }

        $export = false;
        $showFilter = '0';
        if($request->isMethod($request::METHOD_POST)){
            if($filterModel->getOrderNumber() != ''){
                $query .= ' and r.id = '.$filterModel->getOrderNumber();
            }
            if($filterModel->getDepartureStationCode() != ''){
                $query .= ' and depst.station_code = \''.$filterModel->getDepartureStationCode().'\'';
            }

            if($filterModel->getArrivalStationCode() != ''){
                $query .= ' and arrst.station_code = \''.$filterModel->getArrivalStationCode().'\'';
            }

            if($filterModel->getTicketNumber() != ''){
                $query .= ' and ticket.express_id = \''.$filterModel->getTicketNumber().'\'';
            }

            if($filterModel->getIin() != ''){
                $query .= ' and passenger.document like \'%'.$filterModel->getIin().'%\'';
            }

            if($filterModel->getDocumentNumber() != ''){
                $query .= ' and passenger.document like \'%'.$filterModel->getDocumentNumber().'%\'';
            }

            if($filterModel->getPassengerFirstName() != ''){
                $query .= ' and passenger.name like \'%'.mb_strtoupper($filterModel->getPassengerFirstName()).'%\'';
            }

            if($filterModel->getPassengerName() != ''){
                $query .= ' and passenger.name like \'%'.mb_strtoupper($filterModel->getPassengerName()).'%\'';
            }

            if($filterModel->getDepartureDateFrom() != null){
                $query .= ' and \''.$filterModel->getDepartureDateFrom()->format('Y-m-d').'\' <= srr.departure_time ';
            }

            if($filterModel->getDepartureDateTo() != null){
                $dd = $filterModel->getDepartureDateTo()->modify('+1 day');

                $query .= ' and srr.departure_time <= \''.$dd->format('Y-m-d').'\'';
            }

            if($filterModel->getOrderDateFrom() != null){
                $query .= ' and \''.$filterModel->getOrderDateFrom()->format('Y-m-d').'\' <= srr.created_at ';
            }

            if($filterModel->getOrderDateTo() != null){
                $dd = $filterModel->getOrderDateTo()->modify('+1 day');
                $query .= ' and srr.created_at <= \''.$dd->format('Y-m-d').'\'';
            }

            if($filterModel->getUserName() != ''){
                $query .= ' and u.name = \''.$filterModel->getUserName().'\'';
            }

            if($filterModel->getStatus() != ''){
                $query .= ' and ticket.status_id = '.$filterModel->getStatus();
            }

            if($filterModel->getAgentId() > 0){
                $query .= ' and aa.id = '.$filterModel->getAgentId();
            }

            $export = $request->get('export', false);
            $showFilter = '1';
        }

        $query .='
group by ticket.id, r.id, u.name, r.id, direction, order_status, /*paymentStatus,*/ departureDate, aa.id, r.created_at, depst.station_name_full, arrst.station_name_full
       , srr.departure_train, car_number, service_class, payment_type, user_email, srr.arrival_time, depst.station_code, arrst.station_code

order by ticket.id desc';


        $count = DB::selectOne( DB::raw('select count(*) from ('.$query.') a'), [], true );

        if($export != false){
            $orders = DB::select( DB::raw($query) );

            return Excel::download(new OrdersExport($orders, $filterModel->getDataTypes()), 'orders.xlsx');
        }else{
            $orders = DB::select( DB::raw($query. ' limit '.$limit.' offset '.$offset) );
        }

        return view('orders.railway.ordersList', [
        //return view('orders.railway.export.ordersList', [
            'orders'=>$orders,
            'count'=>$count,
            'limit'=>$limit,
            'offset'=>$offset,
            'page'=>$page,
            'route'=>'orders',
            'filterModel'=>$filterModel,
            'statuses'=>$this->getStatuses(),
            'showFilter'=>$showFilter,
            'agents'=>Agent::all(),

        ]);
    }

    public function exportOrders(ExportOrderFilterRequest $request)
    {
        //$orders = Reservation::all();
        $filterModel = $request->getData();



        if($request->isMethod($request::METHOD_POST)){

            $query = "";
            if($filterModel->getExportReturn() == true && $filterModel->getExportBuy() == true){

                $query = "select * from ( ";

                $buyExportTo1CQuery = $this->prepareOrderBuyExportTo1CQuery($filterModel);

                $query = $query." ".$buyExportTo1CQuery;

                $returnExportTo1CQuery = $this->prepareOrderReturnExportTo1CQuery($filterModel);

                $query = $query." union ".$returnExportTo1CQuery." ) as tt order by tt.tickets, tt.operation_type";

            }else if($filterModel->getExportBuy() == true && $filterModel->getExportReturn() == false){
                $query = $this->prepareOrderBuyExportTo1CQuery($filterModel)." order by ticket.id";
            } else if($filterModel->getExportReturn() == true && $filterModel->getExportBuy() == false){
                $query = $this->prepareOrderReturnExportTo1CQuery($filterModel)." order by ticket_return.id";
            }else{
                return Excel::download(new Orders1CExport([]), 'orders1c.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }

            $orders = DB::select( DB::raw($query) );

            return Excel::download(new Orders1CExport($orders), 'orders1c.xlsx', \Maatwebsite\Excel\Excel::XLSX);

            /*return view('orders.railway.export.orders1c', [
                'route'=>'orders',
                'filterModel'=>$filterModel,
                'agents'=>Agent::all(),
                'orders' => $orders
            ]);*/
        }

        return view('orders.railway.exportOrdersForm', [
            'route'=>'orders',
            'filterModel'=>$filterModel,
            'agents'=>Agent::all(),

        ]);
    }

    /**
     * @param ExportFilterOrderForm $filterModel
     * @return string
     */
    protected function prepareOrderBuyExportTo1CQuery(ExportFilterOrderForm $filterModel) : string{
        $query = <<<EOL
select r.id as id, u.name as username, r.id as order_number
     , concat(depst.station_name_full, '------>', arrst.station_name_full) as direction
     , count(passenger.id) as passengersCount
     , string_agg(passenger.name, ' ') as passengers_name
     , ticket.cost as cost
     , ticket.status_id as order_status
     -- , srr.payment_status as paymentStatus
     , srr.departure_time as departureDate
     , srr.arrival_time as arrivalDate
     , aa.id as agent_id
     , aa.company_name as agent_name
     , r.created_at as created_at
     , ticket.express_id as tickets
     , ticket.agents_own_commission as agents_own_commission
     , ticket.system_commission as system_commission
     , depst.station_name_full direction_from
     , depst.station_code station_from_code
     , arrst.station_name_full direction_to
     , arrst.station_code station_to_code
     , aa.bin bin
     , aa.contract_number contract_number
     , srr.departure_train train_number
     , srr.service_class service_class
     , srr.car car_number
     , ticket.seats seat
     , string_agg(passenger.document, ',') document_number
     , bool_or(passenger.sex) sex
     , string_agg(passenger.document, ',') iin
     , srr.payment_type payment_type
     , ticket.tariff_type tariff_type
     , u.email user_email
     , prfl.external_id external_id
     , prfl.note note
     , 'buy' as operation_type
     , null as return_date
from sale_railway_ticket ticket

         left join sale_railway_reservation srr on srr.id = ticket.reservation_id
         left join reservation r on srr.reservation_id = r.id
         left join "users" u on r.user_id = u.id
         left join agents aa on u.agent_id = aa.id

         left join sale_railway_station depst on srr.departure_station_id = depst.id
         left join sale_railway_station arrst on srr.arrival_station_id = arrst.id
         left join sale_railway_passengers passenger on ticket.id = passenger.ticket_id
         left join profiles prfl on passenger.document like concat('%', prfl.document) and passenger.birthday = prfl.birthday and prfl.agent_id = aa.id and (prfl.external_id is not null and LENGTH(trim(prfl.external_id)) > 0)

where ticket.status_id in (3, 5, 51, -2)
EOL;
        $agent = $this->getAgent();
        if ($agent != null){
            $query .= ' and aa.id = '.$agent->id;
        }

        if($filterModel->getDateFrom() != null){
            $query .= ' and \''.$filterModel->getDateFrom()->format('Y-m-d').'\' <= srr.reserved_at ';
        }

        if($filterModel->getDateTo() != null){
            $dd = $filterModel->getDateTo()->modify('+1 day');
            $query .= ' and srr.reserved_at <= \''.$dd->format('Y-m-d').'\'';
        }

        if($filterModel->getAgentId() > 0){
            $query .= ' and aa.id = '.$filterModel->getAgentId();
        }

        $query .='
group by ticket.id, r.id, u.name, r.id, direction, order_status, /*paymentStatus,*/ departureDate, aa.id, r.created_at, depst.station_name_full, arrst.station_name_full
       , srr.departure_train, car_number, service_class, payment_type, user_email, srr.arrival_time, depst.station_code, arrst.station_code, external_id, note
       ';


        return $query;
    }

    /**
     * @param ExportFilterOrderForm $filterModel
     * @return string
     */
    protected function prepareOrderReturnExportTo1CQuery(ExportFilterOrderForm $filterModel) : string{
        $query = <<<EOL
select r.id as id, u.name as username, r.id as order_number
     , concat(depst.station_name_full, '------>', arrst.station_name_full) as direction
     , count(passenger.id) as passengersCount
     , string_agg(passenger.name, ' ') as passengers_name
     , ticket_return.amount as cost
     , ticket.status_id as order_status
     -- , srr.payment_status as paymentStatus
     , srr.departure_time as departureDate
     , srr.arrival_time as arrivalDate
     , aa.id as agent_id
     , aa.company_name as agent_name
     , r.created_at as created_at
     , ticket.express_id as tickets
     , ticket.agents_own_commission as agents_own_commission
     , ticket.system_commission as system_commission
     , depst.station_name_full direction_from
     , depst.station_code station_from_code
     , arrst.station_name_full direction_to
     , arrst.station_code station_to_code
     , aa.bin bin
     , aa.contract_number contract_number
     , srr.departure_train train_number
     , srr.service_class service_class
     , srr.car car_number
     , ticket.seats seat
     , string_agg(passenger.document, ',') document_number
     , bool_or(passenger.sex) sex
     , string_agg(passenger.document, ',') iin
     , srr.payment_type payment_type
     , ticket.tariff_type tariff_type
     , u.email user_email
     , prfl.external_id external_id
     , prfl.note note
     , 'return' as operation_type
     , coalesce(ticket_return.manual_return_our_date, ticket_return.returned_at) as return_date
from
     sale_railway_ticket_return as ticket_return

         left join sale_railway_ticket ticket on ticket_return.ticket_id = ticket.id
         left join sale_railway_reservation srr on srr.id = ticket.reservation_id
         left join reservation r on srr.reservation_id = r.id
         left join "users" u on ticket_return.author_id = u.id
         left join agents aa on u.agent_id = aa.id

         left join sale_railway_station depst on srr.departure_station_id = depst.id
         left join sale_railway_station arrst on srr.arrival_station_id = arrst.id
         left join sale_railway_passengers passenger on ticket.id = passenger.ticket_id
         left join profiles prfl on passenger.document like concat('%', prfl.document) and passenger.birthday = prfl.birthday and prfl.agent_id = aa.id and (prfl.external_id is not null and LENGTH(trim(prfl.external_id)) > 0)

where ticket.status_id in (5, 51)
EOL;
        $agent = $this->getAgent();
        if ($agent != null){
            $query .= ' and aa.id = '.$agent->id;
        }

        if($filterModel->getDateFrom() != null){
            $query .= ' and \''.$filterModel->getDateFrom()->format('Y-m-d').'\' <= coalesce(ticket_return.manual_return_our_date, ticket_return.returned_at) ';
        }

        if($filterModel->getDateTo() != null){
            $dd = $filterModel->getDateTo()->modify('+1 day');
            $query .= ' and coalesce(ticket_return.manual_return_our_date, ticket_return.returned_at) <= \''.$dd->format('Y-m-d').'\'';
        }

        if($filterModel->getAgentId() > 0){
            $query .= ' and aa.id = '.$filterModel->getAgentId();
        }

        $query .='
group by ticket.id, r.id, u.name, r.id, direction, order_status, /*paymentStatus,*/ departureDate, aa.id, r.created_at, depst.station_name_full, arrst.station_name_full
       , srr.departure_train, car_number, service_class, payment_type, user_email, srr.arrival_time, depst.station_code, arrst.station_code, external_id, note, ticket_return.amount,
       ticket_return.id
       ';


        return $query;
    }




    public function returnsOrders(Request $request)
    {
        $limit = 10;
        $page = $request->get('page', 1);
        $offset = ($page - 1) * $limit;

        $query = <<<EOL
select ticket.id as id, u.name as username, r.id as order_number
     , concat(depst.station_name_full, '------>', arrst.station_name_full) as direction
     , count(passenger.id) as passengersCount
     , ticket.tariff_total + coalesce(ticket.commission, 0) + coalesce(ticket.agents_own_commission, 0) as cost
     , ticket.status_id as order_status
     -- , srr.payment_status as paymentStatus
     , srr.departure_time as departureDate
     , aa.id as agent_id
     , r.created_at as created_at
     , string_agg(ticket.express_id, ', ') as tickets
from sale_railway_ticket_return ticket_return
         left join sale_railway_ticket ticket on ticket_return.ticket_id = ticket.id
         left join sale_railway_reservation srr on ticket.reservation_id = srr.id
         left join reservation r on r.id = srr.reservation_id
         left join "users" u on r.user_id = u.id
         left join agents aa on u.agent_id = aa.id
         left join sale_railway_station depst on srr.departure_station_id = depst.id
         left join sale_railway_station arrst on srr.arrival_station_id = arrst.id
         left join sale_railway_passengers passenger on ticket.id = passenger.ticket_id
EOL;
        $agent = $this->getAgent();
        if ($agent != null){
            $query .= ' where aa.id = '.$agent->id;
        }

        $query .='
group by ticket.id, r.id, u.name, r.id, direction, order_status, /*paymentStatus,*/ departureDate, aa.id, r.created_at, depst.station_name_full, arrst.station_name_full
order by ticket.id desc';


        $count = DB::selectOne( DB::raw('select count(*) from ('.$query.') a'), [], true );
        $orders = DB::select( DB::raw($query. ' limit '.$limit.' offset '.$offset) );


        return view('orders.railway.ordersList', [
            'orders'=>$orders,
            'count'=>$count,
            'limit'=>$limit,
            'offset'=>$offset,
            'page'=>$page,
            'route'=>'returnList'
        ]);
    }

    protected function getStatuses(){
        $ret = [];
        $ret[ReservationStatus::RESERVATION_NEW] = trans('reservation.status.new');
        $ret[ReservationStatus::RESERVATION_CONFIRMING] = trans('reservation.status.confirming');
        $ret[ReservationStatus::RESERVATION_CONFIRMED] = trans('reservation.status.confirmed');
        $ret[ReservationStatus::RESERVATION_CONFIRM_ERROR] = trans('reservation.status.confirm error');
        $ret[ReservationStatus::RESERVATION_RETURNING] = trans('reservation.status.returning');
        $ret[ReservationStatus::RESERVATION_RETURNED] = trans('reservation.status.returned');
        $ret[ReservationStatus::RESERVATION_RETURNED_MANUAL] = trans('reservation.status.returned manual');
        $ret[ReservationStatus::RESERVATION_RETURN_ERROR] = trans('reservation.status.return error');


        return $ret;
    }


    /**
     * @return Agent
     */
    protected function getAgent(){
        $agentId = Auth::user()->agent_id;
        $agent = Agent::find($agentId);

        return $agent;
    }


    public function ordersInfo(Request $request){
        $orderId = $request->get('reservationId');

        $order = Reservation::find($orderId);

        return view('orders.railway.info', [
            'order'=>$order
        ]);
    }

    public function getTicketsForOrder(Request $request){
        $orderId = $request->get('reservationId');

        $order = Reservation::find($orderId);

        return view('orders.railway.tickets.tickets', [
            'order'=>$order
        ]);
    }
}
