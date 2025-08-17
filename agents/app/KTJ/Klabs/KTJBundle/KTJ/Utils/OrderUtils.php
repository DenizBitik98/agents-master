<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 17.01.19
 * Time: 12:08
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Utils;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator\ITranslatorAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator\TTranslatorAware;
use TicketBundle\Helpers\ArrayHelper;

/**
 * Class OrderUtils
 * @package Klabs\KTJBundle\KTJ\Utils
 */
class OrderUtils implements ITranslatorAware
{
    use TTranslatorAware;

    CONST STATUS_DONE = 0;
    CONST STATUS_ORDER_NOT_FOUND = 1;
    CONST STATUS_ORDER_CANCELLED = 2;
    CONST STATUS_ORDER_NOT_CONFIRMED = 4;
    CONST STATUS_ORDER_IN_PROCESS = 10;
    CONST STATUS_ORDER_BLOCKED = 11;

    /**
     * Get ticket state text description
     *
     * @param mixed $state The state of ticket
     * @param mixed $onMissing Whether should be returned on missing result
     *
     * @return mixed
     */
    function getOrderStatusText($state, $onMissing = false)
    {
        return ArrayHelper::getValue([
            static::STATUS_DONE => $this->getTranslator()->trans('ktj.dcts.order.status.done'),
            static::STATUS_ORDER_NOT_FOUND => $this->getTranslator()->trans('ktj.dcts.order.status.not found'),
            static::STATUS_ORDER_CANCELLED => $this->getTranslator()->trans('ktj.dcts.order.status.cancelled'),
            static::STATUS_ORDER_NOT_CONFIRMED => $this->getTranslator()->trans('ktj.dcts.order.status.not confirmed'),
            static::STATUS_ORDER_IN_PROCESS => $this->getTranslator()->trans('ktj.dcts.order.status.in process'),
            static::STATUS_ORDER_BLOCKED => $this->getTranslator()->trans('ktj.dcts.order.status.blocked'),
        ], $state, $onMissing);
    }
}
