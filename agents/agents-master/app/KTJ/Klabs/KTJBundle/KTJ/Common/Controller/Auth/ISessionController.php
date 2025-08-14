<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 23:57
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Auth;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface ISessionController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Auth
 */
interface ISessionController extends IController
{
    /**
     * @param IRequest|null $request
     * @return IResponse
     */
    function openAuthorized(IRequest $request = null): IResponse;

    /**
     * @param IRequest|null $request
     * @return IResponse|null
     */
    function open(IRequest $request = null): ?IResponse;

    /**
     * @param IRequest|null $request
     * @return IResponse
     */
    function closeAuthorized(IRequest $request = null): IResponse;

    /**
     * @param IRequest|null $request
     * @return IResponse|null
     */
    function close(IRequest $request = null): ?IResponse;
}
