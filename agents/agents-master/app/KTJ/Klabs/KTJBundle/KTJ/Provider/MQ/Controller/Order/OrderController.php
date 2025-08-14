<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Order;


use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\CancelAware\TCancelAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ConfirmAware\TConfirmAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FinalizeAware\TFinalizeAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FiscalizeAware\TFiscalizeAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReserveAware\TReserveAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReturnAware\TReturnAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IOrderController;

/**
 * Class OrderController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Order
 */
class OrderController implements IOrderController
{
    use TReserveAware;
    use TConfirmAware;
    use TProviderAware;
    use TReturnAware;
    use TFiscalizeAware;
    use TFinalizeAware;
    use TCancelAware;
}
