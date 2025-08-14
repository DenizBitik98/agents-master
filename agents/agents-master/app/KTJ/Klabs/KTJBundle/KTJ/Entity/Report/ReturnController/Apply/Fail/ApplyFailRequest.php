<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 14:36
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Fail;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class ApplyFailRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Fail
 *
 */
class ApplyFailRequest implements IRequest {
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
	 * @return ApplyFailRequest
	 */
	public function setReturnOperationTransactionId( ?string $ReturnOperationTransactionId ): ApplyFailRequest {
		$this->ReturnOperationTransactionId = $ReturnOperationTransactionId;

		return $this;
	}
}
