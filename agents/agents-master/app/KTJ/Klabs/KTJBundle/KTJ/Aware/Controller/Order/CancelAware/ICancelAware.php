<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\CancelAware;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\ICancelController;

/**
 * Interface ICancelAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\CancelAware
 */
interface ICancelAware
{
    /**
     * @return ICancelController|null
     */
    public function getCancelController(): ?ICancelController;
}
