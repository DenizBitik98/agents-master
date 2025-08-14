<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message;

use Doctrine\Common\Collections\Collection;

/**
 * Class ErrorData
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message
 */
class Error
{
    /**
     * @var null|Collection|ErrorData[] $errors
     */
    protected $errors;

    /**
     * @return Collection|ErrorData[]|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param Collection|ErrorData[]|null $errors
     * @return Error
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }
}
