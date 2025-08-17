<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 14:38
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ReturnRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success
 */
class ReturnRequest {
	/**
	 * @JMS\SerializedName("ReturnOperationTransactionId")
	 * @JMS\Type("string")
	 * @var null|string $ReturnOperationTransactionId
	 */
	protected $ReturnOperationTransactionId;

	/**
	 * ReturnRequest constructor.
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
	 * @return ReturnRequest
	 */
	public function setReturnOperationTransactionId( ?string $ReturnOperationTransactionId ): ReturnRequest {
		$this->ReturnOperationTransactionId = $ReturnOperationTransactionId;

		return $this;
	}

}
