<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.09.2018
 * Time: 12:20
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info;

use App\KTJ\Klabs\KTJBundle\KTJ\Utils\TimeSpan;
use DateInterval;
use DateTime;
use Doctrine\Common\Collections\Collection;
use Exception;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class ReturnTicketResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info
 */
class ReturnTicketResponse implements IResponse
{
    /**
     * @JMS\SerializedName("OrderReturnInfo")
     * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\OrderReturnInfo")
     * @var null|OrderReturnInfo $OrderReturnInfo
     */
    protected $OrderReturnInfo;
    /**
     * @JMS\SerializedName("PaymentType")
     * @JMS\Type("int")
     * @var null|int $PaymentType
     */
    protected $PaymentType;
    /**
     * @JMS\SerializedName("RetTariff")
     * @JMS\Type("float")
     * @var null|float $RetTariff
     */
    protected $RetTariff;
    /**
     * @JMS\SerializedName("RetTypeInfo")
     * @JMS\Type("string")
     * @var null|string $RetTypeInfo
     */
    protected $RetTypeInfo;
    /**
     * @JMS\SerializedName("Info")
     * @JMS\Type("string")
     * @var null|string $Info
     */
    protected $Info;
    /**
     * @JMS\SerializedName("TimeBeforeDep")
     * @JMS\Type("string")
     * @var null|string $TimeBeforeDep
     */
    protected $TimeBeforeDep;
    /**
     * @JMS\SerializedName("OperationTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $OperationTimeStamp
     */
    protected $OperationTimeStamp;
    /**
     * @JMS\SerializedName("Tickets")
     * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\Ticket>")
     * @var null|Ticket[]|Collection $Tickets
     */
    protected $Tickets;

    /**
     * @return OrderReturnInfo|null
     */
    public function getOrderReturnInfo(): ?OrderReturnInfo
    {
        return $this->OrderReturnInfo;
    }

    /**
     * @param OrderReturnInfo|null $OrderReturnInfo
     *
     * @return ReturnTicketResponse
     */
    public function setOrderReturnInfo(?OrderReturnInfo $OrderReturnInfo): ReturnTicketResponse
    {
        $this->OrderReturnInfo = $OrderReturnInfo;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaymentType(): ?int
    {
        return $this->PaymentType;
    }

    /**
     * @param int|null $PaymentType
     *
     * @return ReturnTicketResponse
     */
    public function setPaymentType(?int $PaymentType): ReturnTicketResponse
    {
        $this->PaymentType = $PaymentType;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getRetTariff(): ?float
    {
        return $this->RetTariff;
    }

    /**
     * @param float|null $RetTariff
     *
     * @return ReturnTicketResponse
     */
    public function setRetTariff(?float $RetTariff): ReturnTicketResponse
    {
        $this->RetTariff = $RetTariff;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRetTypeInfo(): ?string
    {
        return $this->RetTypeInfo;
    }

    /**
     * @param null|string $RetTypeInfo
     *
     * @return ReturnTicketResponse
     */
    public function setRetTypeInfo(?string $RetTypeInfo): ReturnTicketResponse
    {
        $this->RetTypeInfo = $RetTypeInfo;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getInfo(): ?string
    {
        return $this->Info;
    }

    /**
     * @param null|string $Info
     *
     * @return ReturnTicketResponse
     */
    public function setInfo(?string $Info): ReturnTicketResponse
    {
        $this->Info = $Info;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTimeBeforeDep(): ?string
    {
        return $this->TimeBeforeDep;
    }

    /**
     * @return DateInterval|null
     * @throws Exception
     */
    public function getTimeBeforeDepAsDateInterval(): ?DateInterval
    {
        $TimeBeforeDep = TimeSpan::fromTimeSpan($this->getTimeBeforeDep())->getInterval();
        $TimeBeforeDep->invert = true;

        return $TimeBeforeDep;
    }

    /**
     * @param null|string $TimeBeforeDep
     *
     * @return ReturnTicketResponse
     */
    public function setTimeBeforeDep(?string $TimeBeforeDep): ReturnTicketResponse
    {
        $this->TimeBeforeDep = $TimeBeforeDep;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getOperationTimeStamp(): ?DateTime
    {
        return $this->OperationTimeStamp;
    }

    /**
     * @param DateTime|null $OperationTimeStamp
     *
     * @return ReturnTicketResponse
     */
    public function setOperationTimeStamp(?DateTime $OperationTimeStamp): ReturnTicketResponse
    {
        $this->OperationTimeStamp = $OperationTimeStamp;

        return $this;
    }

    /**
     * @return Collection|Ticket[]|null
     */
    public function getTickets()
    {
        return $this->Tickets;
    }

    /**
     * @param Collection|Ticket[]|null $Tickets
     *
     * @return ReturnTicketResponse
     */
    public function setTickets($Tickets)
    {
        $this->Tickets = $Tickets;

        return $this;
    }
}
