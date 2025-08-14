<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FiscalizeAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IFiscalizeController;

/**
 * Interface IFiscalizeAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\FiscalizeAware
 */
interface IFiscalizeAware
{
    /**
     * @return IFiscalizeController|null
     */
    public function getFiscalizeController(): ?IFiscalizeController;
}
