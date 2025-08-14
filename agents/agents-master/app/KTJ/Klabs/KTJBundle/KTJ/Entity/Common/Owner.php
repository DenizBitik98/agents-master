<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 26.05.2018
 * Time: 22:17
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Owner
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class Owner {
	/**
	 * @JMS\SerializedName("Type")
	 * @JMS\Type("string")
	 * @var null|string $Type
	 */
	protected $Type;
	/**
	 * @JMS\SerializedName("Country")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Country")
	 * @var null|Country $Country
	 */
	protected $Country;
	/**
	 * @JMS\SerializedName("Railway")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Railway")
	 * @var null|Railway $Railway
	 */
	protected $Railway;

	/**
	 * @return null|string
	 */
	public function getType(): ?string {
		return $this->Type;
	}

	/**
	 * @param null|string $Type
	 *
	 * @return Owner
	 */
	public function setType( ?string $Type ): Owner {
		$this->Type = $Type;

		return $this;
	}

	/**
	 * @return Country|null
	 */
	public function getCountry(): ?Country {
		return $this->Country;
	}

	/**
	 * @param Country|null $Country
	 *
	 * @return Owner
	 */
	public function setCountry( ?Country $Country ): Owner {
		$this->Country = $Country;

		return $this;
	}

	/**
	 * @return Railway|null
	 */
	public function getRailway(): ?Railway {
		return $this->Railway;
	}

	/**
	 * @param Railway|null $Railway
	 *
	 * @return Owner
	 */
	public function setRailway( ?Railway $Railway ): Owner {
		$this->Railway = $Railway;

		return $this;
	}
}
