<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\FinalizeAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\IFinalizeController;

/**
 * Trait TFinalizeAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\FinalizeAware
 */
trait TFinalizeAware
{
    /**
     * @var null|IFinalizeController $finalizeController
     */
    protected $finalizeController;

    /**
     * @return IFinalizeController|null
     */
    public function getFinalizeController(): ?IFinalizeController
    {
        return $this->finalizeController;
    }

    /**
     * @param IFinalizeController|null $finalizeController
     * @return $this
     */
    public function setFinalizeController(?IFinalizeController $finalizeController)
    {
        $this->finalizeController = $finalizeController;

        return $this;
    }
}
