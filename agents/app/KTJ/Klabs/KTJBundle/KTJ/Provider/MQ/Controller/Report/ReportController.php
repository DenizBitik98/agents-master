<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 26.09.2018
 * Time: 10:18
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\BoardAware\TBoardAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\OrderAware\TOrderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\PaymentAware\TPaymentAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReturnAware\TReturnAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\StationAware\TStationAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\TicketAware\TTicketAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\TrainAware\TTrainAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\WaitListAware\TWaitListAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IReportController;

/**
 * Class ReportController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report
 */
class ReportController implements IReportController
{
    use TProviderAware;
    use TTicketAware;
    use TOrderAware;
    use TTrainAware;
    use TStationAware;
    use TPaymentAware;
    use TReturnAware;
    use TBoardAware;
    use TWaitListAware;
}
