<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.08.2018
 * Time: 12:25
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Search;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\CarAware\TCarAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Search\TrainAware\TTrainAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Search\ISearchController;

/**
 * Class Search
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Search
 */
class SearchController implements ISearchController {
	use TCarAware;
	use TTrainAware;
	use TProviderAware;
}
