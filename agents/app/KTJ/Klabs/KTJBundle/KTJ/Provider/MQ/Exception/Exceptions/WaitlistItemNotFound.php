<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions;

/**
 * Class WaitlistItemNotFound
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions
 */
class WaitlistItemNotFound extends DefaultException
{
    /**
     * @var null|string $message
     */
    protected $message = 'ktj.mq.error.1500000';
}
