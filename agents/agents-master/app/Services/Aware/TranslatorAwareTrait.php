<?php


namespace App\Services\Aware;


use App\Services\Utils\TranslatorService;

trait TranslatorAwareTrait
{
    /**
     * @var null | TranslatorService
     */
    protected $translator_service = null;

    /**
     * @return TranslatorService|null
     */
    public function getTranslatorService(): ?TranslatorService
    {
        return $this->translator_service;
    }

    /**
     * @param TranslatorService|null $translator_service
     */
    public function setTranslatorService(?TranslatorService $translator_service): void
    {
        $this->translator_service = $translator_service;
    }

}
