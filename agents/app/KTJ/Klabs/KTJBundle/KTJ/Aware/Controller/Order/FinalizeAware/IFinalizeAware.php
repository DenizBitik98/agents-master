<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FinalizeAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IFinalizeController;

/**
 * Interface IFinalizeAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\FinalizeAware
 */
interface IFinalizeAware
{
    /**
     * @return IFinalizeController|null
     */
    public function getFinalizeController(): ?IFinalizeController;
}
