<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.05.2018
 * Time: 12:30
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common;

use App\KTJ\Klabs\KTJBundle\Aware\ClientAware\IHttpClientAware;
use App\KTJ\Klabs\KTJBundle\Aware\KTJAware\IKTJAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Auth\AuthAware\IAuthAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Auth\SessionAware\ISessionAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationAware\IReservationAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportAware\IReportAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ReturnControllerAware\IReturnControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchAware\ISearchAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\TicketAware\ITicketAware;

/**
 * Interface IProvider
 * @package Klabs\KTJBundle\KTJ\Common
 */
interface IProvider extends IKTJAware, IAuthAware, ISessionAware, ISearchAware, IReservationAware, ITicketAware, IReportAware, IReturnControllerAware, IHttpClientAware {
}
