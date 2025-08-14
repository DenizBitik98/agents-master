<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ExporttoFtp;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use DOMDocument;
use \DateTime;
use Illuminate\Support\Facades\DB;
use App\Services\Utils\ViewUtils;
use phpseclib3\Net\SFTP;

class FtpSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ftp:sender';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
	   $user = ExporttoFtp::all();
	   
 	   $ymd = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
	   $ymd2 = DateTime::createFromFormat('Y-m-d', date('Y-m-d'))->modify('-1 day');	    	   
	   //$ymd = DateTime::createFromFormat('Y-m-d', '2024-07-12');
	   //$ymd2 = DateTime::createFromFormat('Y-m-d', '2024-07-12')->modify('-1 day');
	   
       foreach ($user as $a)
       {
		 if ($a->is_active) {
			 
			$query = "";
			$buyExportTo1CQuery = $this->prepareOrderBuyExportTo1CQuery($a->agent_id, $ymd)." order by ticket.id";
			$query = $query." ".$buyExportTo1CQuery;
			$orders = DB::select( DB::raw($query) );			 

			$queryr = "";
			$returnExportTo1CQuery = $this->prepareOrderReturnExportTo1CQuery($a->agent_id, $ymd)." order by ticket.id";
			$queryr = $queryr." ".$returnExportTo1CQuery;
			$ordersr = DB::select( DB::raw($queryr) );				   
			   
			$ftp_type=$a->ftp_type;			   
			$ftp_server=$a->ftpadd;
			$ftp_user_name=$a->ftplog;
			$ftp_user_pass=$a->ftppass;
			
			$file = $this->prepareOrder($orders);
			$remote_file = "ecobravo_buy_".$ymd2->format('Y-m-d').".xml";
			
			$filer = $this->prepareOrder($ordersr);
			$remote_filer = "ecobravo_return_".$ymd2->format('Y-m-d').".xml";			
			 
			if ($a->ftp_type == "sftp") {
				
				$sftp = new SFTP($ftp_server);
				$sftp->login($ftp_user_name, $ftp_user_pass);				
				
				if ($sftp->put($remote_file, $file, SFTP::SOURCE_STRING) ) {
					$sftp->put($remote_filer, $filer, SFTP::SOURCE_STRING);
					Mail::raw("Уважаемые клиент по вашей организации '".$a->agent->company_name."' выгружены файлы за ".$ymd2->format('Y-m-d'), function($message) use ($a)
					{
					   $message->to($a->company_name)->subject('EcoBravo');
					});
					$this->info('XML has been send successfully');			
				} else {
					$this->info("There was a problem while uploading XML");
				}
			
			}
			
			if ($a->ftp_type == "ftp") {
	
				if (file_put_contents("ftp://".$ftp_user_name.":".$ftp_user_pass."@".$ftp_server."/".$remote_file, $file, FILE_APPEND)) {
					file_put_contents("ftp://".$ftp_user_name.":".$ftp_user_pass."@".$ftp_server."/".$remote_filer, $filer, FILE_APPEND);
					Mail::raw("Уважаемые клиент по вашей организации '".$a->agent->company_name."' выгружены файлы за ".$ymd2->format('Y-m-d'), function($message) use ($a)
					{
					   $message->to($a->company_name)->subject('EcoBravo');
					});
					$this->info('XML has been send successfully');			
				} else {
					$this->info("There was a problem while uploading XML");
				}
			
			}				   
			   
		 }
	   }
        return 0;
    }
	
    protected function prepareOrderBuyExportTo1CQuery($agent1, $date1) : string{
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
            $query .= ' and aa.id = '.$agent1;
			$dd1 = $date1->modify('-1 day');
            $query .= ' and \''.$dd1->format('Y-m-d').'\' <= srr.reserved_at ';
            $dd = $date1->modify('+1 day');
            $query .= ' and srr.reserved_at <= \''.$dd->format('Y-m-d').'\'';

        $query .='
group by ticket.id, r.id, u.name, r.id, direction, order_status, /*paymentStatus,*/ departureDate, aa.id, r.created_at, depst.station_name_full, arrst.station_name_full
       , srr.departure_train, car_number, service_class, payment_type, user_email, srr.arrival_time, depst.station_code, arrst.station_code, external_id, note
       ';


        return $query;
    }
	
    protected function prepareOrderReturnExportTo1CQuery($agent1, $date1) : string{
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
            $query .= ' and aa.id = '.$agent1;
			$dd1 = $date1->modify('-1 day');
            $query .= ' and \''.$dd1->format('Y-m-d').'\' <= coalesce(ticket_return.manual_return_our_date, ticket_return.returned_at) ';		
            $dd = $date1->modify('+1 day');
            $query .= ' and coalesce(ticket_return.manual_return_our_date, ticket_return.returned_at) <= \''.$dd->format('Y-m-d').'\'';		

        $query .='
group by ticket.id, r.id, u.name, r.id, direction, order_status, /*paymentStatus,*/ departureDate, aa.id, r.created_at, depst.station_name_full, arrst.station_name_full
       , srr.departure_train, car_number, service_class, payment_type, user_email, srr.arrival_time, depst.station_code, arrst.station_code, external_id, note, ticket_return.amount,
       ticket_return.id
       ';


        return $query;
    }	
	
    protected function prepareOrder($orders) {	
	
			$dom = new DOMDocument('1.0', 'utf-8');
			$dom->formatOutput = true;

			$root = $dom->createElement('orders');
			$root = $dom->appendChild($root);			
			
			foreach ($orders as $order) {
				
				$subroot = $dom->createElement('order');
				$root->appendChild($subroot);
				
				$order1 = $dom->createElement('НомерЗаказа');
				$order1->nodeValue=$order->id;
				$subroot->appendChild($order1);		
				
				$order2 = $dom->createElement('Билет');
				$order2->nodeValue=$order->tickets;
				$subroot->appendChild($order2);	

				$order3 = $dom->createElement('ДатаЗаказа');
				$order3->nodeValue=$order->created_at;
				$subroot->appendChild($order3);		
				
				$order4 = $dom->createElement('НазваниеАгентства');
				$order4->nodeValue=htmlspecialchars($order->agent_name);
				$subroot->appendChild($order4);	

				$order5 = $dom->createElement('Емэил');
				$order5->nodeValue=$order->user_email;
				$subroot->appendChild($order5);		
				
				$order6 = $dom->createElement('БИН');
				$order6->nodeValue=$order->bin;
				$subroot->appendChild($order6);	

				$order7 = $dom->createElement('НомерДоговора');
				$order7->nodeValue=$order->contract_number;
				$subroot->appendChild($order7);		
				
				$order8 = $dom->createElement('Логин');
				$order8->nodeValue=$order->username;
				$subroot->appendChild($order8);	

				$order9 = $dom->createElement('Откуда');
				$order9->nodeValue=$order->direction_from;
				$subroot->appendChild($order9);		
				
				$order10 = $dom->createElement('Куда');
				$order10->nodeValue=$order->direction_to;
				$subroot->appendChild($order10);

				$order11 = $dom->createElement('Тариф');
                if($order->tariff_type == 0){
                    $order11->nodeValue=__('ticket.order.tariff types.adult');
				}
                elseif ($order->tariff_type == 5){
                    $order11->nodeValue=__('ticket.order.tariff types.discount');
				}
                elseif ($order->tariff_type == 7){
                    $order11->nodeValue=__('ticket.order.tariff types.inv');
				}
                else{
                    $order11->nodeValue=__('ticket.order.tariff types.kid');
				}					
				$subroot->appendChild($order11);
				
				$order12 = $dom->createElement('КоличествоПассажиров');
				$order12->nodeValue=$order->passengerscount;
				$subroot->appendChild($order12);	

				$order13 = $dom->createElement('НомерПоезда');
				$order13->nodeValue=$order->train_number;
				$subroot->appendChild($order13);		
				
				$order14 = $dom->createElement('НомерВагона');
				$order14->nodeValue=$order->car_number;
				$subroot->appendChild($order14);	

				$order15 = $dom->createElement('Место');
				$order15->nodeValue=$order->seat;
				$subroot->appendChild($order15);		
				
				$order16 = $dom->createElement('КлассОбслуживания');
				$order16->nodeValue=$order->service_class;
				$subroot->appendChild($order16);	

				$order17 = $dom->createElement('НомерДокумента');
				$order17->nodeValue=$order->document_number;
				$subroot->appendChild($order17);		
				
				$order18 = $dom->createElement('Пол');
                if($order->sex === true){
                    $order18->nodeValue="Ж";
				}
                else{
                    $order18->nodeValue="М";
				}
				$subroot->appendChild($order18);	

				$order19 = $dom->createElement('ТипРасчёта');
                if($order->payment_type == 1){
                    $order19->nodeValue==__('ticket.order.payment types.cash');
				}
                else{
                    $order19->nodeValue=__('ticket.order.payment types.non cash');
				}			
				$subroot->appendChild($order19);		
				
				$order20 = $dom->createElement('ИИН');
				$viewUtils = new viewUtils();
				$order20->nodeValue=$viewUtils->getIinFromDocNumber($order->document_number);
				$subroot->appendChild($order20);	

                if($order->operation_type === 'buy'){
					$order21 = $dom->createElement('Стоимость');
					$order21->nodeValue=$order->cost;
					$subroot->appendChild($order21);		
					
					$order22 = $dom->createElement('Сбор');
					$order22->nodeValue=$order->system_commission;
					$subroot->appendChild($order22);	

					$order23 = $dom->createElement('СборАгента');
					$order23->nodeValue=$order->agents_own_commission;
					$subroot->appendChild($order23);		
					
					$order24 = $dom->createElement('Итого');
					$order24->nodeValue=$order->cost + $order->system_commission + $order->agents_own_commission;
					$subroot->appendChild($order24);	
				}
                else{
					$order21 = $dom->createElement('Стоимость');
					$order21->nodeValue=$order->cost;
					$subroot->appendChild($order21);		
					
					$order22 = $dom->createElement('Сбор');
					$order22->nodeValue='';
					$subroot->appendChild($order22);	

					$order23 = $dom->createElement('СборАгента');
					$order23->nodeValue='';
					$subroot->appendChild($order23);		
					
					$order24 = $dom->createElement('Итого');
					$order24->nodeValue=$order->cost;
					$subroot->appendChild($order24);	
				}

				$order25 = $dom->createElement('КодВалюты');
				$order25->nodeValue='KZT';
				$subroot->appendChild($order25);		
				
				$order26 = $dom->createElement('ФИО');
				$order26->nodeValue=$order->passengers_name;
				$subroot->appendChild($order26);

				$order27 = $dom->createElement('Статус');
                if($order->operation_type === 'buy'){
                    $order27->nodeValue=__('reservation.status.confirmed');
				}
                else{
                    $order27->nodeValue=__('reservation.status.returned');
				}
				$subroot->appendChild($order27);
				
				$order28 = $dom->createElement('ДатаОтправления');
				$order28->nodeValue=$order->departuredate;
				$subroot->appendChild($order28);	

				$order29 = $dom->createElement('Курс');
				$order29->nodeValue='1';
				$subroot->appendChild($order29);		
				
				$order30 = $dom->createElement('Код_станции_отправления');
				$order30->nodeValue=$order->station_from_code;
				$subroot->appendChild($order30);	

				$order31 = $dom->createElement('Код_станции_назначения');
				$order31->nodeValue=$order->station_to_code;
				$subroot->appendChild($order31);		
				
				$order32 = $dom->createElement('ДатаПрибытия');
				$order32->nodeValue=$order->arrivaldate;
				$subroot->appendChild($order32);			

				$order33 = $dom->createElement('Внешний_Идентификатор');
				$order33->nodeValue=$order->external_id;
				$subroot->appendChild($order33);		
				
				$order34 = $dom->createElement('Детали');
				$order34->nodeValue=$order->note;
				$subroot->appendChild($order34);	

				$order35 = $dom->createElement('ДатаВозврата');
				$order35->nodeValue=$order->return_date;
				$subroot->appendChild($order35);		
				
				$order36 = $dom->createElement('Поставщик');
				$order36->nodeValue='Мобильный портал';
				$subroot->appendChild($order36);					
			}
			

			$la =  $dom->saveXML();		
			return $la;		
	}
}
