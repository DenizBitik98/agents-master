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
 * Interface IBoardAware
 * @package Klabs\KTJBundle\KTJ\Aware\Controller\Report\BoardAware
 */
interface IBoardAware
{
    /**
     * @return IBoardController|null
     */
    public function getReportBoardController(): ?IBoardController;

    /**
     * @param IBoardController|null $reportBoardController
     * @return $this
     */
    public function setReportBoardController(?IBoardController $reportBoardController);
}
