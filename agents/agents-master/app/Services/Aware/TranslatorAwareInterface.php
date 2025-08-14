<?php


namespace App\Services\Aware;


interface TranslatorAwareInterface
{
    public function setTranslatorService( ?TranslatorInterface $translator_service );

}
