<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class ConfirmOrder
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class ConfirmOrder
{
    /**
     * @var null|int $TransactionId
     */
    protected $TransactionId;
    /**
     * @var null|ConfirmOrder $IssueOrderResponse
     */
    protected $IssueOrderResponse;

    /**
     * @return int|null
     */
    public function getTransactionId(): ?int
    {
        return $this->TransactionId;
    }

    /**
     * @param int|null $TransactionId
     * @return ConfirmOrder
     */
    public function setTransactionId(?int $TransactionId): ConfirmOrder
    {
        $this->TransactionId = $TransactionId;

        return $this;
    }

    /**
     * @return ConfirmOrder|null
     */
    public function getIssueOrderResponse(): ?ConfirmOrder
    {
        return $this->IssueOrderResponse;
    }

    /**
     * @param ConfirmOrder|null $IssueOrderResponse
     * @return ConfirmOrder
     */
    public function setIssueOrderResponse(?ConfirmOrder $IssueOrderResponse): ConfirmOrder
    {
        $this->IssueOrderResponse = $IssueOrderResponse;

        return $this;
    }
}
