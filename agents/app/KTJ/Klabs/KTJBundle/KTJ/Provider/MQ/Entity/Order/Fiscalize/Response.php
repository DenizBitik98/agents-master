<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Fiscalize;

use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Fiscalize
 */
class Response implements IResponse
{
    /**
     * @var null|bool $FiscalizedRequested
     */
    protected $FiscalizedRequested;
    /**
     * @var null|Collection|PaymentInfo[] $PaymentsInfo
     */
    protected $PaymentsInfo;

    /**
     * @return bool|null
     */
    public function getFiscalizedRequested(): ?bool
    {
        return $this->FiscalizedRequested;
    }

    /**
     * @param bool|null $FiscalizedRequested
     * @return Response
     */
    public function setFiscalizedRequested(?bool $FiscalizedRequested): Response
    {
        $this->FiscalizedRequested = $FiscalizedRequested;

        return $this;
    }

    /**
     * @return Collection|PaymentInfo[]|null
     */
    public function getPaymentsInfo()
    {
        return $this->PaymentsInfo;
    }

    /**
     * @param Collection|PaymentInfo[]|null $PaymentsInfo
     * @return Response
     */
    public function setPaymentsInfo($PaymentsInfo)
    {
        $this->PaymentsInfo = $PaymentsInfo;

        return $this;
    }
}
