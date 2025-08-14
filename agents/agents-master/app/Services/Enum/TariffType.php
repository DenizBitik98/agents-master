<?php


namespace App\Services\Enum;


use MyCLabs\Enum\Enum;

/**
 * Class TariffType
 * @package Sale\CommonBundle\Enum
 * @method static TariffType ADULT()
 * @method static TariffType KID()
 * @method static TariffType DISCOUNT()
 */
final class TariffType extends Enum
{
    private const ADULT = 'adult';
    private const KID = 'kid';
    private const DISCOUNT = 'discount';

    /**
     * Get Tariff type to DCTS value
     * @param mixed $onEmpty Whether should be returned on missing result
     * @return bool|mixed
     */
    public function getDCTSValue($onEmpty = false)
    {
        $data = [
            static::DISCOUNT()->getKey() => 2,
            static::KID()->getKey() => 1,
            static::ADULT()->getKey() => 0,
        ];

        return array_key_exists($this->getKey(), $data) ? $data[$this->getKey()] : $onEmpty;
    }
}
