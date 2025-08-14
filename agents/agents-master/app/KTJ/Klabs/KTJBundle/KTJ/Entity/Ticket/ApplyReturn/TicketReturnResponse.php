<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 10:52
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class ITicketReturnResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn
 */
class TicketReturnResponse implements IResponse {
	/**
	 * @JMS\SerializedName("ReturnOperationTransactionId")
	 * @JMS\Type("string")
	 * @var null|string $ReturnOperationTransactionId
	 */
	protected $ReturnOperationTransactionId;

	/**
	 * @return null|string
	 */
	public function getReturnOperationTransactionId(): ?string {
		return $this->ReturnOperationTransactionId;
	}

	/**
	 * @param null|string $ReturnOperationTransactionId
	 *
	 * @return TicketReturnResponse
	 */
	public function setReturnOperationTransactionId( ?string $ReturnOperationTransactionId ): TicketReturnResponse {
		$this->ReturnOperationTransactionId = $ReturnOperationTransactionId;

		return $this;
	}
}
