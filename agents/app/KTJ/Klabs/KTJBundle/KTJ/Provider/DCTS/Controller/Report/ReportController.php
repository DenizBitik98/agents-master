<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 15:22
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\BoardAware\TBoardAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\OrderAware\TOrderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\PaymentAware\TPaymentAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReturnAware\TReturnAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\StationAware\TStationAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\TicketAware\TTicketAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\TrainAware\TTrainAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IReportController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IWaitListController;
use App\KTJ\Klabs\KTJBundle\KTJ\Exception\MethodNotImplementedException;

/**
 * Class ReportController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report
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

    /**
     * @inheritDoc
     * @throws MethodNotImplementedException
     */
    public function getWaitListController(): ?IWaitListController
    {
        throw new MethodNotImplementedException();
    }
}
