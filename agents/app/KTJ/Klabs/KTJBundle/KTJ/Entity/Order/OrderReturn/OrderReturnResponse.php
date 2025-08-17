<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 12:20
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\OrderReturn;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class OrderReturnResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Order\OrderReturn
 */
class OrderReturnResponse implements IResponse {
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
	 * @return OrderReturnResponse
	 */
	public function setReturnOperationTransactionId( ?string $ReturnOperationTransactionId ): OrderReturnResponse {
		$this->ReturnOperationTransactionId = $ReturnOperationTransactionId;

		return $this;
	}
}
