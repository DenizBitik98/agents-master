<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\ExpressCommit\Commit;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class Request
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\ExpressCommit\Commit
 */
class Request implements IRequest
{
    /**
     * @var null|string $TransactionId
     */
    protected $TransactionId;

    /**
     * Request constructor.
     * @param string|null $TransactionId
     */
    public function __construct(?string $TransactionId)
    {
        $this->setTransactionId($TransactionId);
    }

    /**
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->TransactionId;
    }

    /**
     * @param string|null $TransactionId
     * @return Request
     */
    public function setTransactionId(?string $TransactionId): Request
    {
        $this->TransactionId = $TransactionId;

        return $this;
    }
}
