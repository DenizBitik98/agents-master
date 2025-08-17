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
 * Interface IReservationConfirmController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Reservation
 */
interface IConfirmController extends IController
{
    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function reservationConfirmAuthorized(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function reservationConfirm(IRequest $request): ?IResponse;

    /**
     * @return IResponse|null
     */
    function reservationRetryConfirm(): ?IResponse;
}
