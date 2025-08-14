<?php


namespace App\Services\Enum;


use MyCLabs\Enum\Enum;

/**
 * Class Sex
 * @package Sale\CommonBundle\Enum
 * @method static Sex M()
 * @method static Sex W()
 */
final class Sex extends Enum {
    private const M = 'm';
    private const W = 'w';

    /**
     * Get Sex type to DCTS value
     * @param bool $onEmpty
     * @return bool|mixed
     */
    public function getDCTSValue($onEmpty = false)
    {
        $data = [
            static::M()->getKey() => 0,
            static::W()->getKey() => 1
        ];

        return array_key_exists($this->getKey(), $data) ? $data[$this->getKey()] : $onEmpty;
    }

    /**
     * @param bool $onEmpty
     * @return bool|mixed
     */
    public function getFormValue($onEmpty = false)
    {
        $data = [
            static::M()->getKey() => 1,
            static::W()->getKey() => 0
        ];

        return array_key_exists($this->getKey(), $data) ? $data[$this->getKey()] : $onEmpty;
    }
}
