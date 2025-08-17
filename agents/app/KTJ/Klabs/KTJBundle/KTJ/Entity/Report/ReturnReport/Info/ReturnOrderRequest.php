<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.09.2018
 * Time: 12:19
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class ReturnOrderRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info
 */
class ReturnOrderRequest implements IRequest {
	/**
	 * @var null|string $orderId
	 */
	protected $orderId;

	/**
	 * ReturnOrderRequest constructor.
	 *
	 * @param null|string $orderId
	 */
	public function __construct( ?string $orderId = null ) {
		$this->setOrderId( $orderId );
	}

	/**
	 * @return null|string
	 */
	public function getOrderId(): ?string {
		return $this->orderId;
	}

	/**
	 * @param null|string $orderId
	 *
	 * @return ReturnOrderRequest
	 */
	public function setOrderId( ?string $orderId ): ReturnOrderRequest {
		$this->orderId = $orderId;

		return $this;
	}
}
