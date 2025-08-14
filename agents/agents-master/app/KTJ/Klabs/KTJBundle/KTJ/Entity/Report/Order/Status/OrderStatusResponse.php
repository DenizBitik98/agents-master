<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 12:05
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Order\Status;

use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use JMS\Serializer\Annotation as JMS;
/**
 * Class OrderStatusResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Order\Status
 */
class OrderStatusResponse implements IResponse {
	/**
	 * @JMS\SerializedName("OrderInfo")
	 * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Report\Order\Status\OrderInfo")
	 * @var null|OrderInfo $OrderInfo
	 */
	protected $OrderInfo;
	/**
	 * @JMS\SerializedName("TicketsStatuses")
	 * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Entity\Report\Order\Status\TicketsStatus>")
	 * @var null|Collection $ticketsStatuses
	 */
	protected $ticketsStatuses;

	/**
	 * @return OrderInfo|null
	 */
	public function getOrderInfo(): ?OrderInfo {
		return $this->OrderInfo;
	}

	/**
	 * @param OrderInfo|null $OrderInfo
	 *
	 * @return OrderStatusResponse
	 */
	public function setOrderInfo( ?OrderInfo $OrderInfo ): OrderStatusResponse {
		$this->OrderInfo = $OrderInfo;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getTicketsStatuses(): ?Collection {
		return $this->ticketsStatuses;
	}

	/**
	 * @param Collection|null $ticketsStatuses
	 *
	 * @return OrderStatusResponse
	 */
	public function setTicketsStatuses( ?Collection $ticketsStatuses ): OrderStatusResponse {
		$this->ticketsStatuses = $ticketsStatuses;

		return $this;
	}
}
