<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.05.2018
 * Time: 12:32
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ;

use App\KTJ\Klabs\KTJBundle\Aware\ClientAware\THttpClientAware;
use App\KTJ\Klabs\KTJBundle\Aware\KTJAware\TKTJAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Auth\AuthAware\TAuthAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Auth\SessionAware\TSessionAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\ReservationAware\TReservationAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\ReportAware\TReportAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ReturnControllerAware\TReturnControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\SearchAware\TSearchAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\TicketAware\TTicketAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware\MachineKeyAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware\MachineKeyAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ExpressCommit\IExpressCommitController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Queue\IQueueController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\IProvider;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware\IMQCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware\TMQCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Auth\SessionController;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\SeatReserve\SeatReserveController;

/**
 * Class Provider
 * @package Klabs\KTJBundle\KTJ\Provider\MQ
 * @method SessionController getSessionController() : ?ISessionController
 */
class Provider implements IProvider, IMQCookieAware, MachineKeyAwareInterface
{
    use TKTJAware;
    use MachineKeyAwareTrait;
    use TMQCookieAware;
    use TCacheAdapterAware;
    use TSearchAware;
    use TReportAware;
    use TAuthAware;
    use TReservationAware;
    use THttpClientAware;
    use TSessionAware;
    use TTicketAware;
    use TReturnControllerAware;
    /**
     * @var null|IQueueController $queueController
     */
    protected $queueController;
    /**
     * @var null|IExpressCommitController $expressCommitController
     */
    protected $expressCommitController;
    /**
     * @var null|SeatReserveController $seatReserveController
     */
    protected $seatReserveController;
    /**
     * @var null|string $queueId
     */
    protected $queueId='';
    /**
     * @return IQueueController|null
     */
    public function getQueueController(): ?IQueueController
    {
        return $this->queueController;
    }

    /**
     * @param IQueueController|null $queueController
     * @return Provider
     */
    public function setQueueController(?IQueueController $queueController): Provider
    {
        $this->queueController = $queueController;

        return $this;
    }

    /**
     * @return IExpressCommitController|null
     */
    public function getExpressCommitController(): ?IExpressCommitController
    {
        return $this->expressCommitController;
    }

    /**
     * @param IExpressCommitController|null $expressCommitController
     * @return Provider
     */
    public function setExpressCommitController(?IExpressCommitController $expressCommitController): Provider
    {
        $this->expressCommitController = $expressCommitController;

        return $this;
    }

    /**
     * @return SeatReserveController|null
     */
    public function getSeatReserveController(): ?SeatReserveController
    {
        return $this->seatReserveController;
    }

    /**
     * @param SeatReserveController|null $seatReserveController
     * @return Provider
     */
    public function setSeatReserveController(?SeatReserveController $seatReserveController): Provider
    {
        $this->seatReserveController = $seatReserveController;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQueueId(): ?string
    {
        return $this->queueId;
    }

    /**
     * @param string|null $queueId
     * @return Provider
     */
    public function setQueueId(?string $queueId): Provider
    {
        $this->queueId = $queueId;

        return $this;
    }
}
