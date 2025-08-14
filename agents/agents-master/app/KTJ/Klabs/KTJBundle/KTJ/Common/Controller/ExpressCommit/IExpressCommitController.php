<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ExpressCommit;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IExpressCommitController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\ExpressCommit
 */
interface IExpressCommitController
{
    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function Commit(IRequest $request): ?IResponse;
}
