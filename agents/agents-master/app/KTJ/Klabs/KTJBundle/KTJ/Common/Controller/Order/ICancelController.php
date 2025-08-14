<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface ICancelController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Order
 */
interface ICancelController extends IController
{
    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function cancel(IRequest $request): ?IResponse;

    /**
     * @return IResponse|null
     */
    function retryCancel(): ?IResponse;
}
