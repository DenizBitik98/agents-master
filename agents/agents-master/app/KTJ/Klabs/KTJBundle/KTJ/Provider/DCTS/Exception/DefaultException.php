<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 31.05.2018
 * Time: 7:01
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception;

use Exception;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message\ErrorData;

/**
 * Class DefaultException
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Exception
 */
class DefaultException extends Exception
{
    /**
     * @var null|ErrorData $error
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
}
