<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Order\CancelAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Order\ICancelController;

/**
 * Trait TCancelAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Order\CancelAware
 */
trait TCancelAware
{
    /**
     * @var null|ICancelController $cancelController
     */
    protected $cancelController;

    /**
     * @return ICancelController|null
     */
    public function getCancelController(): ?ICancelController
    {
        return $this->cancelController;
    }

    /**
     * @param ICancelController|null $cancelController
     * @return $this
     */
    public function setCancelController(?ICancelController $cancelController)
    {
        $this->cancelController = $cancelController;

        return $this;
    }
}
