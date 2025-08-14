<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\WaitList;

/**
 * Class WaitlistItemNotFound
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions
 */
class DiscountCardKidTariffBirthdayDoesNotMatch  extends DefaultException
{
    /**
     * @var null|string $message
     */
    protected $message = 'ktj.mq.error.1330014';
}
