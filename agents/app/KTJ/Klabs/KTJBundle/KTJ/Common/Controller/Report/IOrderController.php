<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 10:56
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IOrderController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Report
 */
interface IOrderController extends IController
{
    /**
     * Get order status authorized
     *
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function getExpressStatusAuthorized(IRequest $request): ?IResponse;

    /**
     * Get status of Express
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function getExpressStatus(IRequest $request): ?IResponse;

    /**
     * Get provider status
     * @param IRequest $request
     * @return IResponse|null
     */
    function getStatusAuthorized(IRequest $request): ?IResponse;

    /**
     * Get provider status
     * @param IRequest $request
     * @return IResponse|null
     */
    function getStatus(IRequest $request): ?IResponse;

    /**
     * Get order status authorized
     *
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function getExpressStatusByTicketNumberAuthorized(IRequest $request): ?IResponse;

    /**
     * Get status of Express
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function getExpressByTicketNumberStatus(IRequest $request): ?IResponse;
}
