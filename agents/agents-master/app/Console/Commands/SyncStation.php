<?php

namespace App\Console\Commands;

use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data\Item;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data\Next;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data\StationDataRequest;
use App\Models\SaleRailwayStation;
use App\Services\KTJ\KTJService;
use Illuminate\Console\Command;
use \DateTime;

class SyncStation extends Command
{
    /**
     * @var null |  KtjService
     */
    protected $ktjService = null;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'railway:syncStation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * SyncStation constructor.
     * @param KTJService $ktjService
     */
    public function __construct(KtjService $ktjService){
        parent::__construct();

        $this->ktjService = $ktjService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$ktjService = new KTJService();

        //$this->ktjService->refreshProviderCookies();

        $next = $this->getLastNext();
        while ($next != null){
            $ktjRequest = new StationDataRequest(
                $next->getTimeStamp(),
                $next->getId()
            );

            try{
                $ktjResponse = $this
                    ->ktjService
                    ->getCashierService()
                    ->dataAuthorized(
                        $ktjRequest
                    );

                /**
                 * @var $item Item
                 */
                foreach ($ktjResponse->getItems() as $key => $item) {
                    /** @var SaleRailwayStation $station */
                    if(($station = SaleRailwayStation::where('station_code', "'".$item->getStationCode()."'")->first()) == null){
                        $station = new SaleRailwayStation();
                    }

                    $station->station_code = $item->getStationCode();
                    $station->station_name_short = $item->getStationNameShort();
                    $station->station_name_full = $item->getStationNameFull();
                    $station->railway_code = $item->getRailwayCode();
                    $station->railway_tlf = $item->getRailwayTlf();
                    $station->railway_name = $item->getRailwayName();
                    $station->country_code = $item->getCountryCode();
                    $station->country_tlf = $item->getCountryTlf();
                    $station->country_name = $item->getCountryName();
                    $station->base_code = $item->getBaseCode();
                    $station->sep_number = $item->getSepNumber();
                    $station->sf = $item->getSf();
                    $station->okato = $item->getOkato();
                    $station->base_station = $item->getBaseStation();
                    $station->date_modified = new DateTime();
                    $station->station_type = $item->getStationType();

                    $station->setCreatedAt(new DateTime());
                    $station->setUpdatedAt(new DateTime());

                    $station->save();
                }

            }catch (\Exception $e){
                throw  $e;
            }

            $next = $ktjResponse->getNext();

        }


        return 0;
    }


    /**
     * @return Next|null
     * @throws \Exception
     */
    protected function getLastNext(): ?Next
    {
        #@TODO: Should get last station
        return new Next(
            new \DateTime("1753-01-01T00:00:00"),
            0
        );
    }
}
