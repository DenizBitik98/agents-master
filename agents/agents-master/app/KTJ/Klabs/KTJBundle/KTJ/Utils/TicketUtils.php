<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 15:06
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Utils;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator\ITranslatorAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator\TTranslatorAware;
use TicketBundle\Helpers\ArrayHelper;

/**
 * Class TicketUtils
 * @package Klabs\KTJBundle\KTJ\Utils
 */
class TicketUtils implements ITranslatorAware
{
    use TTranslatorAware;

    CONST STATUS_PAYMENT_CONFIRMED = 0;
    CONST STATUS_PAYMENT_CONFIRMED_EL_REG = 1;
    CONST STATUS_PAYMENT_UNCONFIRMED = 2;
    CONST STATUS_CANCELLED = 3;
    CONST STATUS_RETURNED = 4;
    CONST STATUS_CLAIM_RETURNED = 5;
    CONST STATUS_BOARDING_PASS = 6;
    CONST STATUS_DEFERRED_PAYMENT = 7;

    /**
     * Get ticket state text description
     *
     * @param mixed $state The state of ticket
     * @param mixed $onMissing Whether should be returned on missing result
     *
     * @return mixed
     */
    function getTicketStateText($state, $onMissing = false)
    {
        return ArrayHelper::getValue([
            static::STATUS_PAYMENT_CONFIRMED => $this->getTranslator()->trans('ktj.dcts.ticket.state.payment confirmed'),
            static::STATUS_PAYMENT_CONFIRMED_EL_REG => $this->getTranslator()->trans('ktj.dcts.ticket.state.payment confirmed el reg'),
            static::STATUS_PAYMENT_UNCONFIRMED => $this->getTranslator()->trans('ktj.dcts.ticket.state.payment unconfirmed'),
            static::STATUS_CANCELLED => $this->getTranslator()->trans('ktj.dcts.ticket.state.cancelled'),
            static::STATUS_RETURNED => $this->getTranslator()->trans('ktj.dcts.ticket.state.returned'),
            static::STATUS_CLAIM_RETURNED => $this->getTranslator()->trans('ktj.dcts.ticket.state.claim returned'),
            static::STATUS_BOARDING_PASS => $this->getTranslator()->trans('ktj.dcts.ticket.state.boarding pass'),
            static::STATUS_DEFERRED_PAYMENT => $this->getTranslator()->trans('ktj.dcts.ticket.state.deferred payment'),
        ], $state, $onMissing);
    }
}
