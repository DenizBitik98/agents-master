<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 23:13
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Utils;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator\ITranslatorAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator\TTranslatorAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Car;
use App\Services\Helpers\ArrayHelper;


/**
 * Class CarUtils
 * @package Klabs\KTJBundle\KTJ\Utils
 */
class CarUtils implements ITranslatorAware
{
    use TTranslatorAware;

    /**
     * Get Car type id by name
     * @param string|null $label
     * @return mixed
     */
    function getCarTypeIdWithLabel(?string $label)
    {
        return ArrayHelper::getValue([
            Car::TYPE_COMMON => 1,
            Car::TYPE_SEDENTARY => 2,
            Car::TYPE_BERTH => 3,
            Car::TYPE_COUPE => 4,
            Car::TYPE_SOFT => 5,
            Car::TYPE_LUX => 6,
        ], $label, false);
    }

    /**
     * @param int $type
     * @param mixed $onMissing Whether should be returned on missing
     * @return mixed
     */
    function getCarNameById(int $type, $onMissing = false)
    {
        return ArrayHelper::getValue([
            Car::TYPE_COMMON_ID => $this->getTranslator()->trans('ktj.car.type.common'),
            Car::TYPE_SEDENTARY_ID => $this->getTranslator()->trans('ktj.car.type.sedentary'),
            Car::TYPE_BERTH_ID => $this->getTranslator()->trans('ktj.car.type.berth'),
            Car::TYPE_COUPE_ID => $this->getTranslator()->trans('ktj.car.type.coupe'),
            Car::TYPE_SOFT_ID => $this->getTranslator()->trans('ktj.car.type.soft'),
            Car::TYPE_LUX_ID => $this->getTranslator()->trans('ktj.car.type.lux'),
        ], $type, $onMissing);
    }

    /**
     * Get car description
     * @param Car $car
     * @param mixed $onMissing Whether should be returned on missing result
     * @return string:mixed
     */
    function getCarDescription(Car $car, $onMissing = false)
    {
        $data = [
            Car::SPECIAL_CAR_DETAIL_TALGO_SEDENTARY_36_SEATS => $this->getTranslator()->trans('ktj.car.description.10'),
            Car::SPECIAL_CAR_TALGO_SEDENTARY_25_SEATS => $this->getTranslator()->trans('ktj.car.description.11'),
            Car::SPECIAL_CAR_TALGO_TOURIST_18_SEATS => $this->getTranslator()->trans('ktj.car.description.12'),
            Car::SPECIAL_CAR_TALGO_TOURIST_20_SEATS => $this->getTranslator()->trans('ktj.car.description.13'),
            Car::SPECIAL_CAR_TALGO_BUSINESS => $this->getTranslator()->trans('ktj.car.description.14'),
            Car::SPECIAL_CAR_TALGO_GRANT_LUX => $this->getTranslator()->trans('ktj.car.description.15'),
            Car::SPECIAL_CAR_TALGO_GRANT_LUX_PMR => $this->getTranslator()->trans('ktj.car.description.16'),
        ];
        foreach ($car->getSpecialCarDetails() as $specialCarDetail) {
            if (array_key_exists($specialCarDetail, $data)) {
                return $data[$specialCarDetail];
            }
        }

        return $onMissing;
    }

    /**
     * @param string|null $classService
     * @param false $onMissing
     * @return false|mixed
     */
    function getCarDescriptionByClassService(Car $car, ?string $classService, $onMissing = false)
    {

        $talgoCarTypes = [
            Car::CAR_DETAIL_TALGO_SEDENTARY_36_SEATS_BY_CAR_TYPE,
            Car::CAR_TALGO_SEDENTARY_25_SEATS_BY_CAR_TYPE,
            Car::CAR_TALGO_TOURIST_18_SEATS_BY_CAR_TYPE,
            Car::CAR_TALGO_TOURIST_20_SEATS_BY_CAR_TYPE,
            Car::CAR_TALGO_BUSINESS_L31_BY_CAR_TYPE,
            Car::CAR_TALGO_BUSINESS_L41_BY_CAR_TYPE,
            Car::CAR_TALGO_BUSINESS_L27_BY_CAR_TYPE,
            Car::CAR_TALGO_BUSINESS_L37_BY_CAR_TYPE,
            Car::CAR_TALGO_GRANT_LUX_PMR_BY_CAR_TYPE,
        ];

        $carSubType = null;
        $carSubType = $car->getSubType();

        $dataNew = [
            Car::CLASS_SERVICE_TYPE_1E => $this->getTranslator()->trans('ktj.car.description.1E'),
            Car::CLASS_SERVICE_TYPE_1B => $this->getTranslator()->trans('ktj.car.description.1B'),
            Car::CLASS_SERVICE_TYPE_2B => $this->getTranslator()->trans('ktj.car.description.2B'),
            Car::CLASS_SERVICE_TYPE_2D => $this->getTranslator()->trans('ktj.car.description.2D'),
            Car::CLASS_SERVICE_TYPE_2C => $this->getTranslator()->trans('ktj.car.description.2C'),
            Car::CLASS_SERVICE_TYPE_2K => $this->getTranslator()->trans('ktj.car.description.2K'),
            Car::CLASS_SERVICE_TYPE_2U => $this->getTranslator()->trans('ktj.car.description.2U'),
            Car::CLASS_SERVICE_TYPE_2L => $this->getTranslator()->trans('ktj.car.description.2L'),
            Car::CLASS_SERVICE_TYPE_2N => $this->getTranslator()->trans('ktj.car.description.2N'),
            Car::CLASS_SERVICE_TYPE_3P => $this->getTranslator()->trans('ktj.car.description.3P'),
            Car::CLASS_SERVICE_TYPE_3D => $this->getTranslator()->trans('ktj.car.description.3D'),
            Car::CLASS_SERVICE_TYPE_3L => $this->getTranslator()->trans('ktj.car.description.3L'),
            Car::CLASS_SERVICE_TYPE_3M => $this->getTranslator()->trans('ktj.car.description.3M'),
            Car::CLASS_SERVICE_TYPE_3Y => $this->getTranslator()->trans('ktj.car.description.3Y'),
            Car::CLASS_SERVICE_TYPE_3O => $this->getTranslator()->trans('ktj.car.description.3O'),
        ];

        if (in_array($carSubType, $talgoCarTypes) && array_key_exists($classService, $dataNew)) {
            return $dataNew[$classService];
        }

        return $onMissing;
    }
}
