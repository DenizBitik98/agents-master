<?php


namespace App\ViewModels\Sale\Order;

use \DateTime;

class ExportFilterOrderForm
{
    /**
     * @var DateTime | null
     */
    protected $dateFrom = '';
    /**
     * @var DateTime | null
     */
    protected $dateTo = '';
    /**
     * @var int  | null
     */
    protected $agentId = null;
    /**
     * @var boolean | null
     */
    protected $exportBuy = false;
    /**
     * @var boolean | null
     */
    protected $exportReturn = false;
    /**
     * @return DateTime|null
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * @param DateTime|null $dateFrom
     */
    public function setDateFrom($dateFrom): void
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * @param DateTime|null $dateTo
     */
    public function setDateTo($dateTo): void
    {
        $this->dateTo = $dateTo;
    }

    /**
     * @return int|null
     */
    public function getAgentId(): ?int
    {
        return $this->agentId;
    }

    /**
     * @param int|null $agentId
     */
    public function setAgentId(?int $agentId): void
    {
        $this->agentId = $agentId;
    }

    /**
     * @return bool|null
     */
    public function getExportBuy(): ?bool
    {
        return $this->exportBuy;
    }

    /**
     * @param bool|null $exportBuy
     */
    public function setExportBuy(?bool $exportBuy): void
    {
        $this->exportBuy = $exportBuy;
    }

    /**
     * @return bool|null
     */
    public function getExportReturn(): ?bool
    {
        return $this->exportReturn;
    }

    /**
     * @param bool|null $exportReturn
     */
    public function setExportReturn(?bool $exportReturn): void
    {
        $this->exportReturn = $exportReturn;
    }
}
