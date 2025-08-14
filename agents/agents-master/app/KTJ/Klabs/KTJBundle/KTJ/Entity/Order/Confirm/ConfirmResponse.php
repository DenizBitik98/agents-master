<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:39
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class ConfirmResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Confirm
 */
class ConfirmResponse implements IResponse {
	/**
	 * @JMS\SerializedName("Tickets")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\Ticket>")
	 * @var null|Collection|Ticket[] $Tickets
	 */
	protected $Tickets;

	/**
	 * @return Collection|Ticket[]|null
	 */
	public function getTickets() {
		return $this->Tickets;
	}

	/**
	 * @param Collection|Ticket[]|null $Tickets
	 *
	 * @return ConfirmResponse
	 */
	public function setTickets( $Tickets ) {
		$this->Tickets = $Tickets;

		return $this;
	}
}
