<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\FinalizeAware;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IFinalizeController;

/**
 * Trait TFinalizeControllerAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\FinalizeAware
 */
trait TFinalizeControllerAware
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
     */
    public function setFinalizeController(?IFinalizeController $finalizeController)
    {
        $this->finalizeController = $finalizeController;
    }
}
