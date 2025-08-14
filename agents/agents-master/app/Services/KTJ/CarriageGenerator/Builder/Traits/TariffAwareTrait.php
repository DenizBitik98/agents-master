<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 29.05.2018
 * Time: 12:26
 */

namespace App\Services\KTJ\CarriageGenerator\Builder\Traits;

use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Tariff;

/**
 * Trait TariffAwareTrait
 * @package App\Services\KTJ\CarriageGenerator\Builder\Traits
 */
trait TariffAwareTrait {
	/**
	 * @var null|Tariff $tariff
	 */
	protected $tariff;

	/**
	 * @return Tariff|null
	 */
	public function getTariff(): ?Tariff {
		return $this->tariff;
	}

	/**
	 * @param Tariff|null $tariff
	 *
	 * @return $this
	 */
	public function setTariff( ?Tariff $tariff ) {
		$this->tariff = $tariff;

		return $this;
	}
}
