<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close;

use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open\BlankIdentity;

/**
 * Class Report
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close
 */
class Report
{
    /**
     * @var null|WorkSessionContext $WorkSessionContext
     */
    protected $WorkSessionContext;
    /**
     * @var null|InitialReport $InitialReport
     */
    protected $InitialReport;
    /**
     * @var null|FinalReport $FinalReport
     */
    protected $FinalReport;
    /**
     * @var null|WorkSessionReport $WorkSessionReport
     */
    protected $WorkSessionReport;
    /**
     * @var null|Collection $WorkSessionCarrierReports
     */
    protected $WorkSessionCarrierReports;
    /**
     * @var null|BlankIdentity $ExpectedFirstOnBalanceBlankIdentity
     */
    protected $ExpectedFirstOnBalanceBlankIdentity;

    /**
     * @return WorkSessionContext|null
     */
    public function getWorkSessionContext(): ?WorkSessionContext
    {
        return $this->WorkSessionContext;
    }

    /**
     * @param WorkSessionContext|null $WorkSessionContext
     * @return Report
     */
    public function setWorkSessionContext(?WorkSessionContext $WorkSessionContext): Report
    {
        $this->WorkSessionContext = $WorkSessionContext;

        return $this;
    }

    /**
     * @return InitialReport|null
     */
    public function getInitialReport(): ?InitialReport
    {
        return $this->InitialReport;
    }

    /**
     * @param InitialReport|null $InitialReport
     * @return Report
     */
    public function setInitialReport(?InitialReport $InitialReport): Report
    {
        $this->InitialReport = $InitialReport;

        return $this;
    }

    /**
     * @return FinalReport|null
     */
    public function getFinalReport(): ?FinalReport
    {
        return $this->FinalReport;
    }

    /**
     * @param FinalReport|null $FinalReport
     * @return Report
     */
    public function setFinalReport(?FinalReport $FinalReport): Report
    {
        $this->FinalReport = $FinalReport;

        return $this;
    }

    /**
     * @return WorkSessionReport|null
     */
    public function getWorkSessionReport(): ?WorkSessionReport
    {
        return $this->WorkSessionReport;
    }

    /**
     * @param WorkSessionReport|null $WorkSessionReport
     * @return Report
     */
    public function setWorkSessionReport(?WorkSessionReport $WorkSessionReport): Report
    {
        $this->WorkSessionReport = $WorkSessionReport;

        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getWorkSessionCarrierReports(): ?Collection
    {
        return $this->WorkSessionCarrierReports;
    }

    /**
     * @param Collection|null $WorkSessionCarrierReports
     * @return Report
     */
    public function setWorkSessionCarrierReports(?Collection $WorkSessionCarrierReports): Report
    {
        $this->WorkSessionCarrierReports = $WorkSessionCarrierReports;

        return $this;
    }

    /**
     * @return BlankIdentity|null
     */
    public function getExpectedFirstOnBalanceBlankIdentity(): ?BlankIdentity
    {
        return $this->ExpectedFirstOnBalanceBlankIdentity;
    }

    /**
     * @param BlankIdentity|null $ExpectedFirstOnBalanceBlankIdentity
     * @return Report
     */
    public function setExpectedFirstOnBalanceBlankIdentity(?BlankIdentity $ExpectedFirstOnBalanceBlankIdentity): Report
    {
        $this->ExpectedFirstOnBalanceBlankIdentity = $ExpectedFirstOnBalanceBlankIdentity;

        return $this;
    }
}
