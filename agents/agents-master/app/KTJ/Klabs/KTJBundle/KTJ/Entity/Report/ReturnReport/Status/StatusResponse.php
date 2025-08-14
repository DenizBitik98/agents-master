<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 12:09
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Error\ReturnError;

/**
 * Class StatusResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status
 */
class StatusResponse implements IResponse {
	const STATUS_QUEUED = 1;
	const STATUS_PROCESSING = 2;
	const STATUS_REJECTED = 3;
	const STATUS_SUCCEEDED = 4;
	const STATUS_APPLIED = 5;
	const STATUS_ERROR = 6;

	/**
	 * @JMS\SerializedName("ReturnRequestStatus")
	 * @JMS\Type("int")
	 * @var null|int $ReturnRequestStatus
	 */
	protected $ReturnRequestStatus;
	/**
	 * @JMS\SerializedName("ReturnResult")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\ReturnResult")
	 * @var null|ReturnResult $ReturnResult
	 */
	protected $ReturnResult;
	/**
	 * @JMS\SerializedName("ReturnError")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Error\ReturnError")
	 * @var null|ReturnError $ReturnError
	 */
	protected $ReturnError;
	/**
	 * @JMS\SerializedName("RejectInfo")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\RejectInfo")
	 * @var null|RejectInfo $RejectInfo
	 */
	protected $RejectInfo;

	/**
	 * @return int|null
	 */
	public function getReturnRequestStatus(): ?int {
		return $this->ReturnRequestStatus;
	}

	/**
	 * @param int|null $ReturnRequestStatus
	 *
	 * @return StatusResponse
	 */
	public function setReturnRequestStatus( ?int $ReturnRequestStatus ): StatusResponse {
		$this->ReturnRequestStatus = $ReturnRequestStatus;

		return $this;
	}

	/**
	 * @return ReturnResult|null
	 */
	public function getReturnResult(): ?ReturnResult {
		return $this->ReturnResult;
	}

	/**
	 * @param ReturnResult|null $ReturnResult
	 *
	 * @return StatusResponse
	 */
	public function setReturnResult( ?ReturnResult $ReturnResult ): StatusResponse {
		$this->ReturnResult = $ReturnResult;

		return $this;
	}

	/**
	 * @return null|ReturnError
	 */
	public function getReturnError(): ?ReturnError {
		return $this->ReturnError;
	}

	/**
	 * @param null|ReturnError $ReturnError
	 *
	 * @return StatusResponse
	 */
	public function setReturnError( ?ReturnError $ReturnError ): StatusResponse {
		$this->ReturnError = $ReturnError;

		return $this;
	}

	/**
	 * @return RejectInfo|null
	 */
	public function getRejectInfo(): ?RejectInfo {
		return $this->RejectInfo;
	}

	/**
	 * @param RejectInfo|null $RejectInfo
	 *
	 * @return StatusResponse
	 */
	public function setRejectInfo( ?RejectInfo $RejectInfo ): StatusResponse {
		$this->RejectInfo = $RejectInfo;

		return $this;
	}
}
