<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm;


use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve\Response;

/**
 * Class OrderCancellation
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm
 */
class OrderCancellation
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
     * @return OrderCancellation
     */
    public function setTransactionId(?int $TransactionId): OrderCancellation
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
     * @return OrderCancellation
     */
    public function setIssueOrderResponse(?Response $IssueOrderResponse): OrderCancellation
    {
        $this->IssueOrderResponse = $IssueOrderResponse;

        return $this;
    }
}
