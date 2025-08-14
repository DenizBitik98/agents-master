<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface WaitListController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Report
 */
interface IWaitListController extends IController
{
    /**
     * @return IResponse|null
     */
    function GetWaitlistDisplayTerminals(): ?IResponse;
}
