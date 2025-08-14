<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;


/**
 * Interface IDefiscaleController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\ReturnController
 */
interface IDefiscaleController extends IController
{
    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function defiscale(IRequest $request): ?IResponse;
}
