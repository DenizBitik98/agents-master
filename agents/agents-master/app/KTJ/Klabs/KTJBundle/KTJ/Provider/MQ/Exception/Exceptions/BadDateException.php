<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions;

/**
 * Class BadDateException
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions
 */
class BadDateException extends DefaultException
{
    protected $message = 'ktj.mq.error.bd';
}
