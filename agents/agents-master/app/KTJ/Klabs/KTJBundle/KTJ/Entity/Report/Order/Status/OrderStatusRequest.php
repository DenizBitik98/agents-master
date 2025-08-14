<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 11:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Order\Status;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class OrderStatusRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Order\Status
 */
class OrderStatusRequest implements IRequest {
	/**
	 * @var null|string $orderId
	 */
	protected $orderId;
    /**
     * @var null|string $orderId
     */
    protected $ticketNumber;

	/**
	 * OrderStatusRequest constructor.
	 *
	 * @param null|string $orderId
	 */
	public function __construct( ?string $orderId = null ) {
		$this->setOrderId( $orderId );
	}

	/**
	 * @param null|string $orderId
	 *
	 * @return static
	 */
	static function getInstance( ?string $orderId = null ) {
		return new static( $orderId );
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
	 * @return OrderStatusRequest
	 */
	public function setOrderId( ?string $orderId = null ): OrderStatusRequest {
		$this->orderId = $orderId;

		return $this;
	}

    /**
     * @return null|string
     */
    public function getTicketNumber(): ?string {
        return $this->ticketNumber;
    }

    /**
     * @param null|string $ticketNumber
     *
     * @return OrderStatusRequest
     */
    public function setTicketNumber( ?string $ticketNumber = null ): OrderStatusRequest {
        $this->ticketNumber = $ticketNumber;

        return $this;
    }
}
