<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\DefiscaleAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IDefiscaleController;

/**
 * Interface IDefiscaleControllerAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\DefiscaleAware
 */
interface IDefiscaleControllerAware
{
    /**
     * @return IDefiscaleController |null
     */
    public function getDefiscaleController(): ?IDefiscaleController;

    /**
     * @param IDefiscaleController|null $signatureController
     *
     * @return $this
     */
    public function setDefiscaleController(?IDefiscaleController $defiscaleController);
}
