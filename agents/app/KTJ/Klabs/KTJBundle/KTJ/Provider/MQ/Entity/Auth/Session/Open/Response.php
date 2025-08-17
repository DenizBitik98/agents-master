<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open
 */
class Response implements IResponse
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
     * @return WorkSessionContext|null
     */
    public function getWorkSessionContext(): ?WorkSessionContext
    {
        return $this->WorkSessionContext;
    }

    /**
     * @param WorkSessionContext|null $WorkSessionContext
     * @return Response
     */
    public function setWorkSessionContext(?WorkSessionContext $WorkSessionContext): Response
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
     * @return Response
     */
    public function setInitialReport(?InitialReport $InitialReport): Response
    {
        $this->InitialReport = $InitialReport;

        return $this;
    }
}
