<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\IErrorHandler;

/**
 * Interface IErrorHandlerAware
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware
 */
interface IErrorHandlerAware
{
    /**
     * @return IErrorHandler|null
     */
    public function getErrorHandler(): ?IErrorHandler;
}
