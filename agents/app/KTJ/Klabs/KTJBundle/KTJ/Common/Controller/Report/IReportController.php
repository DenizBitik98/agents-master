<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 15:23
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\BoardAware\IBoardAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\OrderAware\IOrderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\PaymentAware\IPaymentAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReturnAware\IReturnAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\StationAware\IStationAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\TicketAware\ITicketAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\TrainAware\ITrainAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\WaitListAware\IWaitListAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;

/**
 * Interface IReportController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Report
 */
interface IReportController extends IController, ITicketAware, IOrderAware, ITrainAware, IStationAware, IPaymentAware, IReturnAware, IBoardAware, IWaitListAware
{

}
