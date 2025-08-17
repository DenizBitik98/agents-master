<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 14:26
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\ReturnController;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ApplyControllerAware\TApplyControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\DefiscaleAware\TDefiscaleControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\FinalizeAware\TFinalizeControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\SignatureAware\TSignatureControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IReturnController;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class ReturnController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\ReturnController
 * @method Provider getProvider
 */
class ReturnController implements IReturnController {
	use TProviderAware;
	use TApplyControllerAware;
	use TSignatureControllerAware;
	use TDefiscaleControllerAware;
	use TFinalizeControllerAware;

}
