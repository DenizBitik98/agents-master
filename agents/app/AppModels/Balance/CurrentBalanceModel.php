<?php


namespace App\AppModels\Balance;



class CurrentBalanceModel
{
    /**
     * @var float $balance
     */
    public $balance;

    /**
     * @var \DateTime $date
     */
    public $date;

    /**
     * CurrentBalanceModel constructor.
     */
    public function __construct()
    {
        $this->balance = 0;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     *
     * @return CurrentBalanceModel
     */
    public function setBalance(float $balance): CurrentBalanceModel
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     *
     * @return CurrentBalanceModel
     */
    public function setDate(\DateTime $date): CurrentBalanceModel
    {
        $this->date = $date;

        return $this;
    }
}
