<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 18.05.2018
 * Time: 12:42
 */

namespace App\Services\KTJ\CarriageGenerator\Builder;


use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Car;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Tariff;
use App\Models\SaleRailwayCarType;
use App\Services\KTJ\CarriageGenerator\Builder\Berth\Builder as BerthBuilder;
use App\Services\KTJ\CarriageGenerator\Builder\Berth\TresBuilder;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type01K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type01L;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type04L;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type106C;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type27L;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type31L;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type32K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type37L;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type40K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type41L;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type41P;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type44P;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type61P;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type66K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type67K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type68K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type69K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type71K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type72K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type73K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type77K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type79K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type83K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type83O;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type84K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type85K;
use App\Services\KTJ\CarriageGenerator\Builder\ByCarType\Type97C;
use App\Services\KTJ\CarriageGenerator\Builder\Common\Builder as CommonBuilder;
use App\Services\KTJ\CarriageGenerator\Builder\Coupe\Builder as CoupeBuilder;
use App\Services\KTJ\CarriageGenerator\Builder\DefaultBuilder\Builder as DefaultBuilder;
use App\Services\KTJ\CarriageGenerator\Builder\Lux\Builder as LuxBuilder;
use App\Services\KTJ\CarriageGenerator\Builder\Sedentary\Builder as SedentaryBuilder;
use App\Services\KTJ\CarriageGenerator\Builder\Soft\Builder as SoftBuilder;
use App\Services\KTJ\CarriageGenerator\Builder\Talgo\Talgo1D;
use App\Services\KTJ\CarriageGenerator\Builder\Talgo\Talgo1L;
use App\Services\KTJ\CarriageGenerator\Builder\Talgo\Talgo2C;
use App\Services\KTJ\CarriageGenerator\Builder\Talgo\Talgo2D;
use App\Services\KTJ\CarriageGenerator\Builder\Talgo\Talgo2L;
use Tightenco\Collect\Support\Collection;
use App\Services\Helpers\ArrayHelper;

/**
 * Class BuilderGuesser
 * @package App\Services\KTJ\CarriageGenerator\Builder
 */
class BuilderGuesser
{

    const SUB_TYPE_40K = '40К';
    const SUB_TYPE_66K = '66К';
    const SUB_TYPE_79K = '79К';
    const SUB_TYPE_77K = '77К';
    const SUB_TYPE_67K = '67К';
    const SUB_TYPE_69K = '69К';
    const SUB_TYPE_71K = '71К'; // Talgo
    const SUB_TYPE_72K = '72К'; // Talgo
    const SUB_TYPE_85K = '85К'; // Talgo
    const SUB_TYPE_01K = '01К';
    const SUB_TYPE_44P = '44П';
    const SUB_TYPE_41P = '41П';
    const SUB_TYPE_31L = '31Л'; // Talgo
    const SUB_TYPE_41L = '41Л'; // Talgo
    const SUB_TYPE_27L = '27Л'; // Talgo
    const SUB_TYPE_37L = '37Л'; // Talgo
    const SUB_TYPE_106C = '106С'; // Talgo
    const SUB_TYPE_97C = '97С'; // Talgo
    const SUB_TYPE_61P = '61П';
    const SUB_TYPE_01L = '01Л';
    const SUB_TYPE_07L = '07Л';
    const SUB_TYPE_83O = '83О';
    const SUB_TYPE_84K = '84К';
    const SUB_TYPE_73K = '73К';
    const SUB_TYPE_83K = '83К';
    const SUB_TYPE_32K = '32К';
    const SUB_TYPE_68K = '68К';


    /**
     * Guess builder
     *
     * @param Tariff $tariff
     * @param Collection $cars
     * @param string $trainNumber
     * @param \DateTime $departureDate
     * @return null|IBuilder
     */
    function guessBuilder(Tariff $tariff, Collection $cars, \DateTime $departureDate, string $trainNumber=''): ?IBuilder
    {

        $carSubType = null;
        /**
         * @var Car $car
         */
        foreach ($cars as $car) {
            $carSubType = $car->getSubType();
        }

        $types = [
            self::SUB_TYPE_71K => new Type71K(),
            self::SUB_TYPE_85K => new Type85K(),
            self::SUB_TYPE_31L => new Type31L(),
            self::SUB_TYPE_41L => new Type41L(),
            self::SUB_TYPE_27L => new Type27L(),
            self::SUB_TYPE_37L => new Type37L(),
            self::SUB_TYPE_72K => new Type72K(),
            self::SUB_TYPE_97C => new Type97C(),
            self::SUB_TYPE_106C => new Type106C(),
            self::SUB_TYPE_79K => new Type79K(),
            self::SUB_TYPE_44P => new Type44P(),
            self::SUB_TYPE_77K => new Type77K(),
            self::SUB_TYPE_66K => new Type66K(),
            self::SUB_TYPE_01K => new Type01K(),
            self::SUB_TYPE_67K => new Type67K(),
            self::SUB_TYPE_40K => new Type40K(),
            self::SUB_TYPE_41P => new Type41P(),
            self::SUB_TYPE_61P => new Type61P(),
            self::SUB_TYPE_01L => new Type01L(),
            self::SUB_TYPE_07L => new Type04L(),
            self::SUB_TYPE_83O => new Type83O(),
            self::SUB_TYPE_84K => new Type84K(),
            self::SUB_TYPE_73K => new Type73K(),
            self::SUB_TYPE_83K => new Type83K(),
            self::SUB_TYPE_69K => new Type69K(),
            self::SUB_TYPE_32K => new Type32K(),
            self::SUB_TYPE_68K => new Type68K(),
        ];

        if(array_key_exists($carSubType, $types)){

            return $types[$carSubType];
        }


        $dec12 = new \DateTime('2021-12-12');
        $cDate = new \DateTime($departureDate->format('Y-m-d'));

        if (in_array($trainNumber, ['692Х', '691Х']) && $tariff->getType() == 'Плацкартный' && $cDate >= $dec12 ) {
            return new BerthBuilder();
        }

        if(in_array($trainNumber, ['208Т', '208Р'])){
            return new Talgo2D();
        }

        foreach ($cars as $car) {
            if ($car->isTalgo() && !in_array($trainNumber, ['087Х', '088Х'])) {
                return $this->guessTalgoBuilder($tariff);
            }

            if ($car->isThreeFloorEconomic() && $tariff->getType() == 'Плацкартный') {
                return new TresBuilder();
            }
        }

        return ArrayHelper::getValue([
            SaleRailwayCarType::COMMON => new CommonBuilder(),
            SaleRailwayCarType::SEDENTARY => new SedentaryBuilder(),
            SaleRailwayCarType::BERTH => new BerthBuilder(),
            SaleRailwayCarType::COUPE => new CoupeBuilder(),
            SaleRailwayCarType::SOFT => new SoftBuilder(),
            SaleRailwayCarType::LUX => new LuxBuilder(),
        ], $tariff->getType(), new DefaultBuilder());
    }

    /**
     * @param Tariff $tariff
     *
     * @return null|IBuilder
     */
    protected function guessTalgoBuilder(Tariff $tariff): ?IBuilder
    {
        return ArrayHelper::getValue([
            '1Д' => new Talgo1D(),
            '2Д' => new Talgo2D(),
            '1Л' => new Talgo1L(),
            '2Л' => new Talgo2L(),
            '2С' => new Talgo2C(),
        ], $tariff->getClassService()->getType(), new DefaultBuilder());
    }
}
