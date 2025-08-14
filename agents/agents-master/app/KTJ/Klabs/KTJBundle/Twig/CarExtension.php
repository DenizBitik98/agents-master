<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 11/25/18
 * Time: 12:11 PM
 */

namespace App\KTJ\Klabs\KTJBundle\Twig;


use App\KTJ\Klabs\KTJBundle\KTJ\Aware\KTJUtilsAware\IKTJUtilsAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\KTJUtilsAware\TKTJUtilsAware;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Class CarExtension
 * @package Klabs\KTJBundle\Twig
 */
class CarExtension extends AbstractExtension implements IKTJUtilsAware
{
    use TKTJUtilsAware;

    /** @inheritdoc */
    function getFunctions()
    {
        return [
            new TwigFunction(
                'car_description', [
                $this->getKtjUtils()->getCarUtils(),
                'getCarDescription',
            ]
            ),
            new TwigFunction(
                'car_name_by_id', [
                $this->getKtjUtils()->getCarUtils(),
                'getCarNameById',
            ]
            ),
            new TwigFunction(
                'car_description_by_class_service', [
                    $this->getKtjUtils()->getCarUtils(),
                    'getCarDescriptionByClassService',
                ]
            ),
        ];
    }

    /** @inheritdoc */
    function getFilters()
    {
        return [
            new TwigFilter(
                'car_description', [
                $this->getKtjUtils()->getCarUtils(),
                'getCarDescription',
            ]
            ),
            new TwigFilter(
                'car_name_by_id', [
                $this->getKtjUtils()->getCarUtils(),
                'getCarNameById',
            ]
            ),
        ];
    }
}
