<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\ReturnController;


use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\ApplyControllerAware\TApplyControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\DefiscaleAware\TDefiscaleControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\FinalizeAware\TFinalizeControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\ReturnController\SignatureAware\TSignatureControllerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ReturnController\IReturnController;

/**
 * Class ReturnController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\ReturnController
 */
class ReturnController implements IReturnController
{
    use TProviderAware;
    use TApplyControllerAware;
    use TSignatureControllerAware;
    use TDefiscaleControllerAware;
    use TFinalizeControllerAware;
}
