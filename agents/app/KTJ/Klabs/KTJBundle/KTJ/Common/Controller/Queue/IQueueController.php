<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Queue;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class QueueController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Queue
 */
interface IQueueController extends IController
{
    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function RequestItem(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function ConfirmItem(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function GetRequestedItems(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function GetItem(IRequest $request): ?IResponse;

    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function ConfirmBooking(IRequest $request): ?IResponse;
}
