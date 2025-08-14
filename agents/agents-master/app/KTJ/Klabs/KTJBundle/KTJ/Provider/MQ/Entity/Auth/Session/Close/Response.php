<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close
 */
class Response implements IResponse
{
    /**
     * @var null|Report $Report
     */
    protected $Report;

    /**
     * @return Report|null
     */
    public function getReport(): ?Report
    {
        return $this->Report;
    }

    /**
     * @param Report|null $Report
     * @return Response
     */
    public function setReport(?Report $Report): Response
    {
        $this->Report = $Report;

        return $this;
    }
}
