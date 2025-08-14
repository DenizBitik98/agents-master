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
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware\MachineKeyAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware\MachineKeyAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class ConfirmRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Confirm
 */
class ConfirmRequest implements IRequest, MachineKeyAwareInterface {
	use MachineKeyAwareTrait;
	/**
	 * @JMS\SerializedName("MachineKey")
	 * @JMS\Type("string")
	 * @var null|string $machineKey
	 */
	protected $machineKey;
	/**
	 * @JMS\SerializedName("OrderId")
	 * @JMS\Type("string")
	 * @var null|string $OrderId
	 */
	protected $OrderId;
	/**
	 * @JMS\SerializedName("Tickets")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\Ticket>")
	 * @var null|Collection|Ticket[] $Tickets
	 */
	protected $Tickets;
	/**
	 * @JMS\SerializedName("Email")
	 * @JMS\Type("string")
	 * @var null|string $Email
	 */
	protected $Email;

	/**
	 * @return null|string
	 */
	public function getOrderId(): ?string {
		return $this->OrderId;
	}

	/**
	 * @param null|string $OrderId
	 *
	 * @return ConfirmRequest
	 */
	public function setOrderId( ?string $OrderId ): ConfirmRequest {
		$this->OrderId = $OrderId;

		return $this;
	}

	/**
	 * @return Collection|Ticket[]|null
	 */
	public function getTickets() {
		return $this->Tickets;
	}

	/**
	 * @param Collection|Ticket[]|null $Tickets
	 *
	 * @return ConfirmRequest
	 */
	public function setTickets( $Tickets ) {
		$this->Tickets = $Tickets;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getEmail(): ?string {
		return $this->Email;
	}

	/**
	 * @param null|string $Email
	 *
	 * @return ConfirmRequest
	 */
	public function setEmail( ?string $Email ): ConfirmRequest {
		$this->Email = $Email;

		return $this;
	}
}
