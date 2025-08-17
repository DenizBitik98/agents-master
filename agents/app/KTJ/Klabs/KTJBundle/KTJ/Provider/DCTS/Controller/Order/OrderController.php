<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:26
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Order;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ConfirmAware\TConfirmAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FinalizeAware\TFinalizeAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FiscalizeAware\TFiscalizeAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReserveAware\TReserveAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReturnAware\TReturnAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\ICancelController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IFinalizeController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IFiscalizeController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IOrderController;
use App\KTJ\Klabs\KTJBundle\KTJ\Exception\MethodNotImplementedException;

/**
 * Class ReservationController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Order
 */
class OrderController implements IOrderController
{
    use TReserveAware;
    use TConfirmAware;
    use TProviderAware;
    use TReturnAware;
    use TFiscalizeAware;
    use TFinalizeAware;

    /**
     * @return IFinalizeController|null
     * @throws MethodNotImplementedException
     */
    function getFinalizeController(): ?IFinalizeController
    {
        throw new MethodNotImplementedException('');
    }

    /**
     * @return IFiscalizeController|null
     * @throws MethodNotImplementedException
     */
    function getFiscalizeController(): ?IFiscalizeController
    {
        throw new MethodNotImplementedException('');
    }

    /**
     * @return ICancelController|null
     * @throws MethodNotImplementedException
     */
    function getCancelController(): ?ICancelController
    {
        throw new MethodNotImplementedException('');
    }
}
