<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Cancel;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm\IssueOrderResponse;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Cancel
 */
class Response implements IResponse
{
    /**
     * @var null|int $TransactionId
     */
    protected $TransactionId;
    /**
     * @var null|IssueOrderResponse $IssueOrderResponse
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
     * @return Response
     */
    public function setTransactionId(?int $TransactionId): Response
    {
        $this->TransactionId = $TransactionId;

        return $this;
    }

    /**
     * @return IssueOrderResponse|null
     */
    public function getIssueOrderResponse(): ?IssueOrderResponse
    {
        return $this->IssueOrderResponse;
    }

    /**
     * @param IssueOrderResponse|null $IssueOrderResponse
     * @return Response
     */
    public function setIssueOrderResponse(?IssueOrderResponse $IssueOrderResponse): Response
    {
        $this->IssueOrderResponse = $IssueOrderResponse;

        return $this;
    }

}
