<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\FinalizeAware;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IFinalizeController;

interface IFinalizeControllerAware
{
    /**
     * @return IFinalizeController|null
     */
    function getFinalizeController(): ?IFinalizeController;

    /**
     * @param IFinalizeController|null $finalizeController
     * @return $this
     */
    function setFinalizeController(?IFinalizeController $finalizeController);
}
