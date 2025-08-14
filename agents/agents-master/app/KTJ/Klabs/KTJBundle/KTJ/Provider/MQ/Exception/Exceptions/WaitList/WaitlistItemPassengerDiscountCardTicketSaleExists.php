<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\WaitList;

use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\DefaultException;

/**
 * Class WaitlistItemNotFound
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions
 */
class WaitlistItemPassengerDiscountCardTicketSaleExists extends DefaultException
{
    /**
     * @var null|string $message
     */
    protected $message = 'ktj.mq.error.1500007';
}
