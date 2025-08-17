<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:13
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\CancelAware\ICancelAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ConfirmAware\IConfirmAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FinalizeAware\IFinalizeAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FiscalizeAware\IFiscalizeAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReserveAware\IReserveAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReturnAware\IReturnAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;

/**
 * Interface IReservationController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Order
 */
interface IOrderController extends IController, IReserveAware, IConfirmAware, IReturnAware, IFiscalizeAware, IFinalizeAware, ICancelAware
{
}
