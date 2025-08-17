<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve;

/**
 * Class OrderConfirmation
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve
 */
class OrderConfirmation
{
    /**
     * @var null|int $TransactionId
     */
    protected $TransactionId;
    /**
     * @var Response $IssueOrderResponse
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
     * @return Response
     */
    public function getIssueOrderResponse(): Response
    {
        return $this->IssueOrderResponse;
    }

    /**
     * @param Response $IssueOrderResponse
     * @return OrderConfirmation
     */
    public function setIssueOrderResponse(Response $IssueOrderResponse): OrderConfirmation
    {
        $this->IssueOrderResponse = $IssueOrderResponse;

        return $this;
    }
}
