<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve;

/**
 * Class OrderCancellation
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve
 */
class OrderCancellation
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
     * @return OrderCancellation
     */
    public function setTransactionId(?int $TransactionId): OrderCancellation
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
     * @return OrderCancellation
     */
    public function setIssueOrderResponse(Response $IssueOrderResponse): OrderCancellation
    {
        $this->IssueOrderResponse = $IssueOrderResponse;

        return $this;
    }
}
