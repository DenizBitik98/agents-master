<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 10:52
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class TicketReturnRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn
 */
class TicketReturnRequest implements IRequest {
	/**
	 * @var null|string $orderId
	 */
	protected $orderId;
	/**
	 * @var null|string $ticketId
	 */
	protected $ticketId;

	/**
	 * TicketReturnRequest constructor.
	 *
	 * @param null|string $orderId
	 * @param null|string $ticketId
	 */
	public function __construct( ?string $orderId = null, ?string $ticketId = null ) {
		$this->setOrderId( $orderId );
		$this->setTicketId( $ticketId );
	}

	/**
	 * @param null|string $orderId
	 * @param null|string $ticketId
	 *
	 * @return static
	 */
	static function getInstance( ?string $orderId = null, ?string $ticketId = null ) {
		return new static( $orderId, $ticketId );
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
	 * @return TicketReturnRequest
	 */
	public function setOrderId( ?string $orderId ): TicketReturnRequest {
		$this->orderId = $orderId;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTicketId(): ?string {
		return $this->ticketId;
	}

	/**
	 * @param null|string $ticketId
	 *
	 * @return TicketReturnRequest
	 */
	public function setTicketId( ?string $ticketId ): TicketReturnRequest {
		$this->ticketId = $ticketId;

		return $this;
	}
}
