<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message;

/**
 * Class CustomErrorData
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message
 */
class CustomErrorData
{
    /**
     * @var null|string $TransactionId
     */
    protected $TransactionId;
    /**
     * @var null|int $ExpressRequestType
     */
    protected $ExpressRequestType;
    /**
     * @var null|int $WaitlistIdentity
     */
    protected $WaitlistIdentity;
    /**
     * @var null|int $WaitlistStatus
     */
    protected $WaitlistStatus;
    /**
     * @var null|int $ReferenceId
     */
    protected $ReferenceId;
    /**
     * @var null|string $StateValue
     */
    protected $StateValue;
    /**
     * @var null|string $StateFlowName
     */
    protected $StateFlowName;
    /**
     * @var null|string $Message
     */
    protected $Message;

    /**
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->TransactionId;
    }

    /**
     * @param string|null $TransactionId
     * @return CustomErrorData
     */
    public function setTransactionId(?string $TransactionId): CustomErrorData
    {
        $this->TransactionId = $TransactionId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getExpressRequestType(): ?int
    {
        return $this->ExpressRequestType;
    }

    /**
     * @param int|null $ExpressRequestType
     * @return CustomErrorData
     */
    public function setExpressRequestType(?int $ExpressRequestType): CustomErrorData
    {
        $this->ExpressRequestType = $ExpressRequestType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWaitlistIdentity(): ?int
    {
        return $this->WaitlistIdentity;
    }

    /**
     * @param int|null $WaitlistIdentity
     * @return CustomErrorData
     */
    public function setWaitlistIdentity(?int $WaitlistIdentity): CustomErrorData
    {
        $this->WaitlistIdentity = $WaitlistIdentity;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWaitlistStatus(): ?int
    {
        return $this->WaitlistStatus;
    }

    /**
     * @param int|null $WaitlistStatus
     * @return CustomErrorData
     */
    public function setWaitlistStatus(?int $WaitlistStatus): CustomErrorData
    {
        $this->WaitlistStatus = $WaitlistStatus;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReferenceId(): ?int
    {
        return $this->ReferenceId;
    }

    /**
     * @param int|null $ReferenceId
     * @return CustomErrorData
     */
    public function setReferenceId(?int $ReferenceId): CustomErrorData
    {
        $this->ReferenceId = $ReferenceId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStateValue(): ?string
    {
        return $this->StateValue;
    }

    /**
     * @param string|null $StateValue
     * @return CustomErrorData
     */
    public function setStateValue(?string $StateValue): CustomErrorData
    {
        $this->StateValue = $StateValue;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStateFlowName(): ?string
    {
        return $this->StateFlowName;
    }

    /**
     * @param string|null $StateFlowName
     * @return CustomErrorData
     */
    public function setStateFlowName(?string $StateFlowName): CustomErrorData
    {
        $this->StateFlowName = $StateFlowName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->Message;
    }

    /**
     * @param string|null $Message
     * @return CustomErrorData
     */
    public function setMessage(?string $Message): CustomErrorData
    {
        $this->Message = $Message;
        return $this;
    }
}
