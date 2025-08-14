<?php


namespace App\AppModels\Balance;


interface TransactionInterface
{
    public const ACTION_ADD = 'add';
    public const ACTION_SUB = 'sub';

    /**
     * @return string
     */
    public function getActionType(): string;

    /**
     * @return float
     */
    public function getActionSum(): float;

    /**
     * @return string
     */
    public function getOrderNumber(): string;
}
