<?php


namespace App\ViewModels\Sale\Railway\Buy;


class BuyForm
{
    /**
     * @var null | BuyDirectionForm
     */
    protected $forwardDirection = null;
    /**
     * @var null | BuyDirectionForm
     */
    protected $backwardDirection = null;
    /**
     * @var null | array
     */
    protected $blanks = null;

    /**
     * @return BuyDirectionForm|null
     */
    public function getForwardDirection(): ?BuyDirectionForm
    {
        return $this->forwardDirection;
    }

    /**
     * @param BuyDirectionForm|null $forwardDirection
     */
    public function setForwardDirection(?BuyDirectionForm $forwardDirection): void
    {
        $this->forwardDirection = $forwardDirection;
    }

    /**
     * @return BuyDirectionForm|null
     */
    public function getBackwardDirection(): ?BuyDirectionForm
    {
        return $this->backwardDirection;
    }

    /**
     * @param BuyDirectionForm|null $backwardDirection
     */
    public function setBackwardDirection(?BuyDirectionForm $backwardDirection): void
    {
        $this->backwardDirection = $backwardDirection;
    }

    /**
     * @return array|null
     */
    public function getBlanks(): ?array
    {
        return $this->blanks;
    }

    /**
     * @param array|null $blanks
     */
    public function setBlanks(?array $blanks): void
    {
        $this->blanks = $blanks;
    }
}
