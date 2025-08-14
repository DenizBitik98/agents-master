<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 13:45
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ApplyControllerAware\IApplyControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\DefiscaleAware\IDefiscaleControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\FinalizeAware\IFinalizeControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\SignatureAware\ISignatureControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;

/**
 * Interface IReturnController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\ReturnController
 */
interface IReturnController extends IController, IApplyControllerAware, ISignatureControllerAware, IDefiscaleControllerAware, IFinalizeControllerAware {

}
