<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 13:23
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Auth;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Interface IAuthController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Auth
 */
interface IAuthController extends IController
{
    /**
     * @param string|null $login
     * @param string|null $password
     * @param string|null $machineKey
     * @return mixed
     */
    function refreshProviderCookies(string $login = null, string $password = null, ?string $machineKey = null);

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     */
    function auth(IRequest $request): ?IResponse;
}
