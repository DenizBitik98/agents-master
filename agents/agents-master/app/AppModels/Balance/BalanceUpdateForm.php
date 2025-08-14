<?php


namespace App\AppModels\Balance;


class BalanceUpdateForm implements TransactionInterface
{
    /**
     * @var string $actionType
     */
    private $actionType;

    /**
     * @var float|null $actionSum
     */
    private $actionSum;
    /**
     * @var string $orderNumber
     */
    private $orderNumber;
    /**
     * @var string | null $comment
     */
    private $comment;

    /**
     * TransactionForm constructor.
     *
     * @param string $actionType
     */
    public function __construct(string $actionType = null)
    {
        $this->actionType = $actionType;
        $this->actionSum  = 0;
    }

    /**
     * @return string
     */
    public function getActionType(): string
    {
        return $this->actionType;
    }

    /**
     * @param string $actionType
     */
    public function setActionType(string $actionType): void
    {
        $this->actionType = $actionType;
    }

    /**
     * @return float|null
     */
    public function getActionSum(): float
    {
        return $this->actionSum;
    }

    /**
     * @param float $actionSum
     */
    public function setActionSum(float $actionSum): void
    {
        $this->actionSum = $actionSum;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     */
    public function setOrderNumber(string $orderNumber): void
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }
}
