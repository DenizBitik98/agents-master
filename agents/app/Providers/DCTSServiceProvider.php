<?php

namespace App\Providers;

use App\Common\Utils\DayShiftUtils;
use App\JMS\Serializer\Handler\DateTimeHandler;
use App\KTJ\Klabs\KTJBundle\KTJ\Utils\CarUtils;
use App\KTJ\Klabs\KTJBundle\Signature\Provider\OpenSSL;
use App\KTJ\Klabs\KTJBundle\Signature\Signature;
use App\Services\KTJ\CarriageGenerator\Builder\BuilderGuesser;
use App\Services\KTJ\CarriageGenerator\CarriageGenerator;
use App\Services\KTJ\CarriageGenerator\Painter\Painter\Html\Painter;
use App\Services\KTJ\KTJService;
use App\Services\KTJ\Provider\DCTS\CashierService;
use App\Services\KTJ\Provider\DCTS\ETicketService;
use App\Services\KTJ\Provider\DCTS\LoginService;
use App\Services\KTJ\Provider\DCTS\ReturnETicketService;
use App\Services\KTJ\Provider\DCTS\SearchPlacesService;
use App\Services\Utils\BalanceUtils;
use App\Services\Utils\Railway\ReservationConfirmService;
use App\Services\Utils\Railway\ReservationUtils;
use App\Services\Utils\TranslatorService;
use App\Services\Utils\Utils;
use Carbon\TranslatorImmutable;
use Dropelikeit\LaravelJmsSerializer\Config\Config;
use Dropelikeit\LaravelJmsSerializer\Serializer\Factory;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Illuminate\Config\Repository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use JMS\Serializer\SerializerInterface;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class DCTSServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /** @var Repository $configRepository */
        /*$configRepository = $this->app->get('config');

        var_dump($configRepository->get('services.dcts'));*/

        $this->app->singleton(Signature::class, function (Application $app){

            $configRepository = $this->app->get('config');
            $config = $configRepository->get('services.ssl');

            $ssl = new OpenSSL();
            $ssl->setPrivateKeyFile($config['private_key_file']);
            $ssl->setPrivateKeyPassword($config['private_key_password']);

            $ret = new Signature();
            $ret->setSigner($ssl);

            return $ret;
        });

        $this->app->singleton(SerializerInterface::class, function (Application $app){

            $jmsConfig = Config::fromConfig([
                'serialize_null' => true,
                'cache_dir' => $this->app->storagePath(),
                'serialize_type' => 'json',
                'debug' => true,
                'add_default_handlers' => true,
                'custom_handlers' => [DateTimeHandler::class],
            ]);


            $serializer = (new Factory())->getSerializer($jmsConfig);

            return $serializer;
        });



        $this->app->singleton(CarriageGenerator::class, function (Application $app){

            $ret = new CarriageGenerator();

            $guesser = new BuilderGuesser();
            $painter = new Painter();

            $ret->setBuilderGuesser($guesser);
            $ret->setPainter($painter);
            $ret->setTranslatorService(new TranslatorService());


            return $ret;
        });

        $this->app->singleton(CarUtils::class, function (Application $app){

            $ret = new CarUtils();


            $ret->setTranslator(TranslatorImmutable::get('en'));


            return $ret;
        });

        $this->app->singleton(BalanceUtils::class, function (Application $app){

            $ret = new BalanceUtils();


            return $ret;
        });

        $this->app->singleton(ReservationUtils::class, function (Application $app){

            $ret = new ReservationUtils($this->app->get(BalanceUtils::class));

            return $ret;
        });

        $this->app->singleton(KTJService::class, function (Application $app) /*use($config)*/ {
            $configRepository = $this->app->get('config');
            $config = $configRepository->get('services.dcts');

            $ret = new KTJService();

            $messageFormats = [
                //'REQUEST: {method} - {uri} - HTTP/{version} - {req_headers} - {req_body} - {req_header_cookie}',
                //'{req_header_Cookie}',
                //'RESPONSE: {code} - {req_body} - {req_headers}',
                //'RESPONSE: {query} - {res_body} - {req_headers}',
                MessageFormatter::DEBUG
            ];

            $stack = HandlerStack::create();

            collect($messageFormats)->each(function ($messageFormat) use ($stack) {
                // We'll use unshift instead of push, to add the middleware to the bottom of the stack, not the top
                $stack->unshift(
                    Middleware::log(
                        with(new Logger('guzzle-log'))->pushHandler(
                            new RotatingFileHandler(storage_path('logs/guzzle-log.log'))
                        ),
                        new MessageFormatter($messageFormat)
                    )
                );
            });

            $idpClient = new Client([
                'base_uri'=> $config['idp_server_url'],
                'timeout'=>0,
                'allow_redirects'=>false,
                'proxy'=>'',
                'cookies'=>true,
                'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type'     => 'application/json',
                ],
                'handler' => $stack
            ]);

            $ret->setIdpClient($idpClient);




            $dctsClient = new Client([
                'base_uri'=>$config['dcts_server_url'],
                'timeout'=>0,
                'allow_redirects'=>false,
                'proxy'=>'',
                'cookies'=>true,
                'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type'     => 'application/json',
                ],
                'handler' => $stack
            ]);

            $ret->setDctsClient($dctsClient);

            $ret->setTokenUrl($config['idp_get_token_url']);
            $ret->setLogin($config['idp_login']);
            $ret->setPassword($config['idp_password']);
            $ret->setIdpCookieStorageKey($config['idp_cookie_storage_name']);

            $ret->setAuthUri($config['dcts_uri_auth']);
            $ret->setDctsCookieStorageKey($config['dcts_cookie_storage_name']);
            $ret->setMachineKey($config['dcts_machine_key']);
            $ret->setKtjTerminal($config['dcts_terminal']);


            $jmsConfig = Config::fromConfig([
                'serialize_null' => true,
                'cache_dir' => $this->app->storagePath(),
                'serialize_type' => 'json',
                'debug' => true,
                'add_default_handlers' => true,
                'custom_handlers' => [DateTimeHandler::class],
            ]);


            /*----------------------------------------------------*/
            $serializer = (new Factory())->getSerializer($jmsConfig);

            /*----------------------------------------------------*/
            $cashierService = new CashierService();

            $cashierService->setKTJService($ret);
            $cashierService->setDataUri($config['dcts_uri_station_data']);
            $cashierService->setSerializer($serializer);

            $ret->setCashierService($cashierService);

            /*----------------------------------------------------*/

            $searchPlacesService = new SearchPlacesService();

            $searchPlacesService->setKTJService($ret);
            $searchPlacesService->setSearchUri($config['dcts_uri_search_trains']);
            $searchPlacesService->setSearchCarsUri($config['dcts_uri_search_cars']);
            $searchPlacesService->setRouteUri($config['dcts_uri_trains_route']);
            $searchPlacesService->setSerializer($serializer);

            $ret->setSearchPlacesService($searchPlacesService);

            /*----------------------------------------------------*/

            $eTicketService = new ETicketService();

            $eTicketService->setKTJService($ret);
            $eTicketService->setReserveUri($config['dcts_uri_ticket_reserve']);
            $eTicketService->setConfirmUri($config['dcts_uri_ticket_confirmation']);
            $eTicketService->setSignatureUrl($config['dcts_uri_confirm_signature']);
            $eTicketService->setSerializer($serializer);

            $ret->setETicketService($eTicketService);

            /*----------------------------------------------------*/

            $returnETicketService = new ReturnETicketService();

            $returnETicketService->setKTJService($ret);
            $returnETicketService->setSerializer($serializer);

            $returnETicketService->setTicketInfoUri($config['dcts_uri_ticket_inquiry']);
            $returnETicketService->setReturnTicketUri($config['dcts_uri_ticket_cancel']);
            $returnETicketService->setStatusUri($config['dcts_uri_order_return_status']);
            $returnETicketService->setSuccessUri($config['dcts_uri_apply_success_return']);
            $returnETicketService->setFailUri($config['dcts_uri_apply_fail_return']);

            $ret->setReturnETicketService($returnETicketService);


            /*----------------------------------------------------*/

            $loginService = new LoginService();

            $loginService->setKTJService($ret);
            $loginService->setOpenUri($config['dcts_uri_session_open']);
            $loginService->setCloseUri($config['dcts_uri_session_close']);
            $loginService->setSerializer($serializer);

            $ret->setLoginService($loginService);


            return $ret;
        });

        $this->app->singleton(Utils::class, function (Application $app){
            $configRepository = $app->get('config');
            $config = $configRepository->get('services.dcts');

            $ret = new Utils($config['dcts_machine_key']);
            $ret->setKtjTerminal(env('dcts_terminal'));
            $ret->setKtjService($app->make(KTJService::class));

            return $ret;
        });

        $this->app->singleton(ReservationConfirmService::class, function (Application $app){

            return new ReservationConfirmService($app->make(KTJService::class), $app->make(Utils::class));
        });

        $this->app->singleton(DayShiftUtils::class, function (Application $app){

            return new DayShiftUtils();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
