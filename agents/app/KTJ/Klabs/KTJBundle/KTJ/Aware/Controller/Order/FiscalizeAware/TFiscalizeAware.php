<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FiscalizeAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IFiscalizeController;

/**
 * Trait TFiscalizeAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\FiscalizeAware
 */
trait TFiscalizeAware
{
    /**
     * @var null|IFiscalizeController $fiscalizeController
     */
    protected $fiscalizeController;

    /**
     * @return IFiscalizeController|null
     */
    public function getFiscalizeController(): ?IFiscalizeController
    {
        return $this->fiscalizeController;
    }

    /**
     * @param IFiscalizeController|null $fiscalizeController
     * @return $this
     */
    public function setFiscalizeController(?IFiscalizeController $fiscalizeController)
    {
        $this->fiscalizeController = $fiscalizeController;

        return $this;
    }
}
