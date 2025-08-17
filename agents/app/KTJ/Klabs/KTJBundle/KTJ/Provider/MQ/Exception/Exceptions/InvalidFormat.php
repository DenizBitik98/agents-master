<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions;

/**
 * Class InvalidFormat
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions
 */
class InvalidFormat extends DefaultException
{
    /**
     * @var null|string $message
     */
    protected $message = 'ktj.mq.error.1180006';
}
