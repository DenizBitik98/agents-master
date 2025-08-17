<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:21
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\CarAware\ICarAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\TrainAware\ITrainAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;

/**
 * Interface ISearch
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Search
 */
interface ISearchController extends IController, ITrainAware, ICarAware {
}
