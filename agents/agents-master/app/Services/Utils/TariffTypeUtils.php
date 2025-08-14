<?php


namespace App\Services\Utils;


use App\Services\Enum\TariffType;

class TariffTypeUtils
{
    function convertToDCTS(TariffType $tariffType, $onEmpty = false)
    {
        $data = [
            $tariffType::DISCOUNT()->getKey() => 2,
            $tariffType::KID()->getKey() => 1,
            $tariffType::ADULT()->getKey() => 0,
        ];

        return array_key_exists($tariffType->getKey(), $data) ? $data[$tariffType->getKey()] : $onEmpty;
    }
}
