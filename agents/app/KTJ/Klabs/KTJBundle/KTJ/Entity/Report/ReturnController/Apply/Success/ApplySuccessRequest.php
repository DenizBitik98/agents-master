<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 14:36
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class ApplySuccessRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success
 */
class ApplySuccessRequest implements IRequest {
	/**
	 * @JMS\SerializedName("ReturnRequest")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\ReturnRequest")
	 * @var null|ReturnRequest $ReturnRequest
	 */
	protected $ReturnRequest;
	/**
	 * @JMS\SerializedName("Refunds")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\Refund>")
	 * @var null|Refund[]|Collection $Refunds
	 */
	protected $Refunds;

	/**
	 * @return ReturnRequest|null
	 */
	public function getReturnRequest(): ?ReturnRequest {
		return $this->ReturnRequest;
	}

	/**
	 * @param ReturnRequest|null $ReturnRequest
	 *
	 * @return ApplySuccessRequest
	 */
	public function setReturnRequest( ?ReturnRequest $ReturnRequest ): ApplySuccessRequest {
		$this->ReturnRequest = $ReturnRequest;

		return $this;
	}

	/**
	 * @return Collection|Refund[]|null
	 */
	public function getRefunds() {
		return $this->Refunds;
	}

	/**
	 * @param Collection|Refund[]|null $Refunds
	 *
	 * @return ApplySuccessRequest
	 */
	public function setRefunds( $Refunds ) {
		$this->Refunds = $Refunds;

		return $this;
	}
}
