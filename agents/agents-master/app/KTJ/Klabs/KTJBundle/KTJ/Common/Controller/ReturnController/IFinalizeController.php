<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;


/**
 * Interface IFinalizeController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\ReturnController
 */
interface IFinalizeController extends IController
{
    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function finalize(IRequest $request): ?IResponse;
}
