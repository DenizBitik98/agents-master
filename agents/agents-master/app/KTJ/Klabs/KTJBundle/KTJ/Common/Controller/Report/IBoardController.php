<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 27.02.19
 * Time: 13:15
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IBoardController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Report
 */
interface IBoardController extends IController
{
    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function getBoardingPassAuthorized(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function getBoardingPass(IRequest $request): ?IResponse;
}
