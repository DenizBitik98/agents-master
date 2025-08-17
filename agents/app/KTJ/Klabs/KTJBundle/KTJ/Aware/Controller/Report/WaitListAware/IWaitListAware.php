<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\WaitListAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IWaitListController;

/**
 * Interface IWaitListAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\WaitListAware
 */
interface IWaitListAware
{
    /**
     * @return IWaitListController|null
     */
    public function getWaitListController(): ?IWaitListController;
}
