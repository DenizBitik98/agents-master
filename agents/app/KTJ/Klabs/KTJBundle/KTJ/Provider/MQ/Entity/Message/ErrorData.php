<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message;

/**
 * Class ErrorData
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message
 */
class ErrorData
{
    /**
     * @var null|string $ServerStatus
     */
    protected $ServerStatus;
    /**
     * @var null|string $ErrorMessage
     */
    protected $ErrorMessage;
    /**
     * @var null|string $PropertyName
     */
    protected $PropertyName;
    /**
     * @var null|string $AttemptedValue
     */
    protected $AttemptedValue;
    /**
     * @var null|CustomErrorData $CustomErrorData
     */
    protected $CustomErrorData;

    /**
     * @return string|null
     */
    public function getServerStatus(): ?string
    {
        return $this->ServerStatus;
    }

    /**
     * @param string|null $ServerStatus
     * @return ErrorData
     */
    public function setServerStatus(?string $ServerStatus): ErrorData
    {
        $this->ServerStatus = $ServerStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->ErrorMessage;
    }

    /**
     * @param string|null $ErrorMessage
     * @return ErrorData
     */
    public function setErrorMessage(?string $ErrorMessage): ErrorData
    {
        $this->ErrorMessage = $ErrorMessage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPropertyName(): ?string
    {
        return $this->PropertyName;
    }

    /**
     * @param string|null $PropertyName
     * @return ErrorData
     */
    public function setPropertyName(?string $PropertyName): ErrorData
    {
        $this->PropertyName = $PropertyName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAttemptedValue(): ?string
    {
        return $this->AttemptedValue;
    }

    /**
     * @param string|null $AttemptedValue
     * @return ErrorData
     */
    public function setAttemptedValue(?string $AttemptedValue): ErrorData
    {
        $this->AttemptedValue = $AttemptedValue;

        return $this;
    }

    /**
     * @return CustomErrorData|null
     */
    public function getCustomErrorData(): ?CustomErrorData
    {
        return $this->CustomErrorData;
    }

    /**
     * @param CustomErrorData|null $CustomErrorData
     * @return ErrorData
     */
    public function setCustomErrorData(?CustomErrorData $CustomErrorData): ErrorData
    {
        $this->CustomErrorData = $CustomErrorData;

        return $this;
    }
}
