<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.08.2018
 * Time: 16:10
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Ticket\Status;

use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class GetTicketsStatuses
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Ticket\Status
 */
class GetTicketsStatusesRequest implements IRequest {
	/**
	 * @JMS\SerializedName("Identities")
	 * @JMS\Type("ArrayCollection<string>")
	 * @var null|Collection $Identities
	 */
	protected $Identities;

	/**
	 * @return Collection|null
	 */
	public function getIdentities(): ?Collection {
		return $this->Identities;
	}

	/**
	 * @param Collection|null $Identities
	 *
	 * @return GetTicketsStatusesRequest
	 */
	public function setIdentities( ?Collection $Identities ): GetTicketsStatusesRequest {
		$this->Identities = $Identities;

		return $this;
	}
}
