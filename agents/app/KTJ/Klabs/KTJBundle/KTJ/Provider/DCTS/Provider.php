<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.05.2018
 * Time: 12:31
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS;

use App\KTJ\Klabs\KTJBundle\Aware\ClientAware\THttpClientAware;
use App\KTJ\Klabs\KTJBundle\Aware\KTJAware\TKTJAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Auth\AuthAware\TAuthAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Auth\SessionAware\TSessionAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportAware\TReportAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationAware\TReservationAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ReturnControllerAware\TReturnControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchAware\TSearchAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\TicketAware\TTicketAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware\MachineKeyAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware\MachineKeyAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\IProvider;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware\IDCTSCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware\TDCTSCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Auth\AuthController;

/**
 * Class Provider
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS
 * @method AuthController getAuthController(): ?IAuthController
 */
class Provider implements IProvider, IDCTSCookieAware, MachineKeyAwareInterface {
    use TKTJAware;
    use MachineKeyAwareTrait;
    use TDCTSCookieAware;
    use TCacheAdapterAware;
    use TSearchAware;
    use TReportAware;
    use TAuthAware;
    use TReservationAware;
    use THttpClientAware;
    use TSessionAware;
    use TTicketAware;
    use TReturnControllerAware;
}
