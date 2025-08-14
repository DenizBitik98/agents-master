<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 27.02.19
 * Time: 13:23
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Report\BoardAware;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IBoardController;

/**
 * Trait TBoardAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\BoardAware
 */
trait TBoardAware
{
    /**
     * @var null|IBoardController $reportBoardController
     */
    protected $reportBoardController;

    /**
     * @return IBoardController|null
     */
    public function getReportBoardController(): ?IBoardController
    {
        return $this->reportBoardController;
    }

    /**
     * @param IBoardController|null $reportBoardController
     * @return $this
     */
    public function setReportBoardController(?IBoardController $reportBoardController)
    {
        $this->reportBoardController = $reportBoardController;
        return $this;
    }
}
