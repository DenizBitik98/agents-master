<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:15
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IReservationReserveController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Reservation
 */
interface IReserveController extends IController
{

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function reservationReserveAuthorized(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function reservationReserve(IRequest $request): ?IResponse;

    /**
     * @return IResponse|null
     */
    function retryReservationReserve(): ?IResponse;
}
