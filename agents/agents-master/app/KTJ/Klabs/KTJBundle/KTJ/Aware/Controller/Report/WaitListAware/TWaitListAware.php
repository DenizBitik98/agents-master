<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\WaitListAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IWaitListController;

/**
 * Trait TWaitListAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\WaitListAware
 */
trait TWaitListAware
{
    /**
     * @var null|IWaitListController $waitListController
     */
    protected $waitListController;

    /**
     * @return IWaitListController|null
     */
    public function getWaitListController(): ?IWaitListController
    {
        return $this->waitListController;
    }

    /**
     * @param IWaitListController|null $waitListController
     * @return $this
     */
    public function setWaitListController(?IWaitListController $waitListController)
    {
        $this->waitListController = $waitListController;

        return $this;
    }
}
