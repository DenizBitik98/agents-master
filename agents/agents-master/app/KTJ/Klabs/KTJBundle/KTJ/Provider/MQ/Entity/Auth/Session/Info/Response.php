<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info;

use \DateTime;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info
 */
class Response implements IResponse
{
    /**
     * @JMS\SerializedName("TransactionId")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info\WorkSessionContext")
     * @var null|WorkSessionContext $WorkSessionContext
     */
    protected $WorkSessionContext;
    /**
     * @JMS\SerializedName("TransactionId")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info\InitialReport")
     * @var null|InitialReport $InitialReport
     */
    protected $InitialReport;

    /**
     * @return WorkSessionContext|null
     */
    public function getWorkSessionContext(): ?WorkSessionContext
    {
        return $this->WorkSessionContext;
    }

    /**
     * @param WorkSessionContext|null $WorkSessionContext
     */
    public function setWorkSessionContext(?WorkSessionContext $WorkSessionContext): void
    {
        $this->WorkSessionContext = $WorkSessionContext;
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
     */
    public function setInitialReport(?InitialReport $InitialReport): void
    {
        $this->InitialReport = $InitialReport;
    }
}
