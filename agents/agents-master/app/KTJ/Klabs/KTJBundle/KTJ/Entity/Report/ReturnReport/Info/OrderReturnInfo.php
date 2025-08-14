<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.09.2018
 * Time: 12:35
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderReturnInfo
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info
 */
class OrderReturnInfo {
	/**
	 * @JMS\SerializedName("ExpressId")
	 * @JMS\Type("string")
	 * @var null|string $ExpressId
	 */
	protected $ExpressId;
	/**
	 * @JMS\SerializedName("Status")
	 * @JMS\Type("int")
	 * @var null|int $Status
	 */
	protected $Status;

	/**
	 * @return null|string
	 */
	public function getExpressId(): ?string {
		return $this->ExpressId;
	}

	/**
	 * @param null|string $ExpressId
	 *
	 * @return OrderReturnInfo
	 */
	public function setExpressId( ?string $ExpressId ): OrderReturnInfo {
		$this->ExpressId = $ExpressId;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getStatus(): ?int {
		return $this->Status;
	}

	/**
	 * @param int|null $Status
	 *
	 * @return OrderReturnInfo
	 */
	public function setStatus( ?int $Status ): OrderReturnInfo {
		$this->Status = $Status;

		return $this;
	}
}
