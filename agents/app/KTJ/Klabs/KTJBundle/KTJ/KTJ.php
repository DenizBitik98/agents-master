<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.05.2018
 * Time: 12:20
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ;

use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdPAware\IIdPAware;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdPAware\TIdPAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\IProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\KTJUtilsAware\IKTJUtilsAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\KTJUtilsAware\TKTJUtilsAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\IProvider;

/**
 * Class KTJ
 * @package Klabs\KTJBundle\KTJ
 */
class KTJ implements IIdPAware, IProviderAware, IKTJUtilsAware {
	use TIdPAware;
	use TKTJUtilsAware;
	use TProviderAware
	{
		setProvider as setProviderTrait;
	}

	/**
	 * @param IProvider|null $provider
	 *
	 * @return KTJ
	 */
	public function setProvider( ?IProvider $provider ): KTJ {
		$provider->setKtj( $this );

		return $this->setProviderTrait( $provider );
	}
}
