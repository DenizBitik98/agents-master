<?php


namespace App\Services\KTJ\Provider\DCTS\Aware;


use App\Services\KTJ\KTJService;

trait KTJServiceTrait
{
    /**
     * @var null | KTJService
     */
    protected $KTJService = null;

    /**
     * @return KTJService|null
     */
    public function getKTJService(): ?KTJService
    {
        return $this->KTJService;
    }

    /**
     * @param KTJService|null $KTJService
     */
    public function setKTJService(?KTJService $KTJService): void
    {
        $this->KTJService = $KTJService;
    }
}
