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
 * Class ReturnTicketRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info
 */
class ReturnTicketRequest implements IRequest {
	/**
	 * @var null|string $orderId
	 */
	protected $orderId;
	/**
	 * @var null|string $ticketId
	 */
	protected $ticketId;

	/**
	 * ReturnTicketRequest constructor.
	 *
	 * @param null|string $orderId
	 * @param null|string $ticketId
	 */
	public function __construct( ?string $orderId = null, ?string $ticketId = null ) {
		$this->setOrderId( $orderId );
		$this->setTicketId( $ticketId );
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
	 * @return ReturnTicketRequest
	 */
	public function setOrderId( ?string $orderId ): ReturnTicketRequest {
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
	 * @return ReturnTicketRequest
	 */
	public function setTicketId( ?string $ticketId ): ReturnTicketRequest {
		$this->ticketId = $ticketId;

		return $this;
	}

}
