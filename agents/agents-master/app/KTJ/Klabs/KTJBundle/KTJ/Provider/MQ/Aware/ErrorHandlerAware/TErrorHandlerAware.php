<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\IErrorHandler;

/**
 * Trait TErrorHandler
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware
 */
trait TErrorHandlerAware
{
    /**
     * @var null|IErrorHandler $errorHandler
     */
    protected $errorHandler;

    /**
     * @return IErrorHandler|null
     */
    public function getErrorHandler(): ?IErrorHandler
    {
        return $this->errorHandler;
    }

    /**
     * @param IErrorHandler|null $errorHandler
     * @return $this
     */
    public function setErrorHandler(?IErrorHandler $errorHandler)
    {
        $this->errorHandler = $errorHandler;

        return $this;
    }
}
