<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking;

/**
 * Class OrderConfirmation
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking
 */
class OrderConfirmation
{
    /**
     * @var null|int $TransactionId
     */
    protected $TransactionId;
    /**
     * @var null|Response $IssueOrderResponse
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
     * @return OrderConfirmation
     */
    public function setTransactionId(?int $TransactionId): OrderConfirmation
    {
        $this->TransactionId = $TransactionId;

        return $this;
    }

    /**
     * @return Response|null
     */
    public function getIssueOrderResponse(): ?Response
    {
        return $this->IssueOrderResponse;
    }

    /**
     * @param Response|null $IssueOrderResponse
     * @return OrderConfirmation
     */
    public function setIssueOrderResponse(?Response $IssueOrderResponse): OrderConfirmation
    {
        $this->IssueOrderResponse = $IssueOrderResponse;

        return $this;
    }
}
