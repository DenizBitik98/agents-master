<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\DefiscaleAware;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IDefiscaleController;

/**
 * Class TDefiscaleControllerAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\DefiscaleAware
 */
trait TDefiscaleControllerAware
{
    /**
     * @var null|IDefiscaleController $defiscaleController
     */
    protected $defiscaleController;

    /**
     * @return IDefiscaleController|null
     */
    public function getDefiscaleController(): ?IDefiscaleController
    {
        return $this->defiscaleController;
    }

    /**
     * @param IDefiscaleController|null $defiscaleController
     */
    public function setDefiscaleController(?IDefiscaleController $defiscaleController): void
    {
        $this->defiscaleController = $defiscaleController;
    }
}
