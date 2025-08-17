<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 23:19
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\KTJUtilsAware;

use App\KTJ\Klabs\KTJBundle\KTJ\Utils\Utils;

/**
 * Interface IKTJUtilsAware
 * @package Klabs\KTJBundle\KTJ\Aware\KTJUtilsAware4
 */
interface IKTJUtilsAware {

	/**
	 * @return Utils|null
	 */
	public function getKtjUtils(): ?Utils;

	/**
	 * @param Utils|null $ktjUtils
	 *
	 * @return TKTJUtilsAware
	 */
	public function setKtjUtils( ?Utils $ktjUtils );
}
