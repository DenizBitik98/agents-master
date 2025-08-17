<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 12:09
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class StatusRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status
 */
class StatusRequest implements IRequest {
	/**
	 * @JMS\SerializedName("ReturnOperationTransactionId")
	 * @JMS\Type("string")
	 * @var null|string $ReturnOperationTransactionId
	 */
	protected $ReturnOperationTransactionId;

	/**
	 * StatusRequest constructor.
	 *
	 * @param null|string $ReturnOperationTransactionId
	 */
	public function __construct( ?string $ReturnOperationTransactionId = null ) {
		$this->setReturnOperationTransactionId( $ReturnOperationTransactionId );
	}

	/**
	 * @return null|string
	 */
	public function getReturnOperationTransactionId(): ?string {
		return $this->ReturnOperationTransactionId;
	}

	/**
	 * @param null|string $ReturnOperationTransactionId
	 *
	 * @return StatusRequest
	 */
	public function setReturnOperationTransactionId( ?string $ReturnOperationTransactionId ): StatusRequest {
		$this->ReturnOperationTransactionId = $ReturnOperationTransactionId;

		return $this;
	}
}
