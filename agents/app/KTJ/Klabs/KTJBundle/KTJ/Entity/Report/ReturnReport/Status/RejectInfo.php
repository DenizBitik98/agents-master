<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 12:40
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status;

use JMS\Serializer\Annotation as JMS;

/**
 * Class RejectInfo
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status
 */
class RejectInfo {
	/**
     * @JMS\SerializedName("Reject")
     * @JMS\Type("string")
	 * @var null|string $Reject
	 */
	protected $Reject;
	/**
     * @JMS\SerializedName("error")
     * @JMS\Type("int")
	 * @var null|string $Error
	 */
	protected $Error;

	/**
	 * @return null|string
	 */
	public function getReject(): ?string {
		return $this->Reject;
	}

	/**
	 * @param null|string $Reject
	 *
	 * @return RejectInfo
	 */
	public function setReject( ?string $Reject ): RejectInfo {
		$this->Reject = $Reject;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getError(): ?string {
		return $this->Error;
	}

	/**
	 * @param null|string $Error
	 *
	 * @return RejectInfo
	 */
	public function setError( ?string $Error ): RejectInfo {
		$this->Error = $Error;

		return $this;
	}
}
