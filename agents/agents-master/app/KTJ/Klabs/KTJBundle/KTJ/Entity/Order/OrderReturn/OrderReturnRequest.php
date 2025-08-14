<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 12:20
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\OrderReturn;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class OrderReturnRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Order\OrderReturn
 */
class OrderReturnRequest implements IRequest {
	/**
	 * @var null|string $orderId
	 */
	protected $orderId;

	/**
	 * OrderReturnRequest constructor.
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
	 * @return OrderReturnRequest
	 */
	public function setOrderId( ?string $orderId ): OrderReturnRequest {
		$this->orderId = $orderId;

		return $this;
	}

}
