<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions;


use Exception;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message\ErrorData;

/**
 * Class DefaultException
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions
 */
class DefaultException extends Exception
{
    /**
     * @var null|ErrorData
     */
    protected $error;

    /**
     * @return ErrorData|null
     */
    public function getError(): ?ErrorData
    {
        return $this->error;
    }

    /**
     * @param ErrorData|null $error
     * @return DefaultException
     */
    public function setError(?ErrorData $error): DefaultException
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @param string|null $message
     * @return DefaultException
     */
    public function setMessage(?string $message): DefaultException
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param mixed $code
     * @return DefaultException
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}
