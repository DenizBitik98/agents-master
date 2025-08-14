<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions;

/**
 * Class InvalidWaitListStatusException
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions
 */
class InvalidWaitListStatusException extends DefaultException
{
    /**
     * @var null|string $message
     */
    protected $message = 'ktj.mq.error.1500002';
}
