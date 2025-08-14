<?php


namespace App\Common\Utils;


use App\Common\DayShift;
use App\Services\Helpers\ArrayHelper;
use \DateTime;

class DayShiftUtils
{
    public function __construct()
    {
    }

    static function getDayShiftChoices() {
        return [
            DayShift::MORNING=>'Утро',
            DayShift::DAY=>'День',
            DayShift::EVENING=>'Вечер',
            DayShift::NIGHT=>'Ночь',
        ];
    }

    /**
     * Date shift ranges
     * @return array
     */
    function getDayShifts() {
        return [
            DayShift::MORNING => range(6, 10),
            DayShift::DAY     => range(11, 16),
            DayShift::EVENING => range(17, 21),
            DayShift::NIGHT   => array_merge(
                range(22, 23),
                range(0, 5)
            ),
        ];
    }


    /**
     * @param DateTime $dateTime
     * @param string $dayShift
     * @return bool
     */
    function isDayShiftValid(DateTime $dateTime, string $dayShift) {
        return in_array($dateTime->format("H"), $this->getDayShiftRange($dayShift));
    }

    /**
     * @param string|null $dayShift
     * @return mixed
     */
    function getDayShiftRange(?string $dayShift) {
        return ArrayHelper::getValue($this->getDayShifts(), $dayShift);
    }
}
