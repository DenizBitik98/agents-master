<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 14:55
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IStationController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Report
 */
interface IStationController extends IController
{
    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function scheduleAuthorized(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function schedule(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function dataAuthorized(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function data(IRequest $request): ?IResponse;
}
