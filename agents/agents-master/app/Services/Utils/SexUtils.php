<?php


namespace App\Services\Utils;


use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Passenger;
use App\Services\Enum\Sex;
use App\Services\Helpers\ArrayHelper;

class SexUtils
{
    /**
     * @param Sex $sex
     * @param mixed $onMissing Whether should be returned on missing
     *
     * @return mixed|string
     */
    function getDCTSValue(Sex $sex, $onMissing = false)
    {
        return ArrayHelper::getValue([
            Sex::M()->getValue() => Passenger::SEX_M,
            Sex::W()->getValue() => Passenger::SEX_W,
        ], $sex->getValue(), $onMissing);
    }

    /**
     * @return string[]
     */
    function getForForm()
    {
        return [
          0=>'Мужской',
          1=>'Женский',
        ];
    }
}
