<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 15:45
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Ticket\TerminalInfo;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class TicketTerminalInfoResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Ticket\TerminalInfo
 */
class TicketTerminalInfoResponse implements IResponse {
	/**
	 * @JMS\SerializedName("TicketExpressId")
	 * @JMS\Type("string")
	 * @var null|string $TicketExpressId
	 */
	protected $TicketExpressId;
	/**
	 * @JMS\SerializedName("TerminalId")
	 * @JMS\Type("string")
	 * @var null|string $TerminalId
	 */
	protected $TerminalId;
	/**
	 * @JMS\SerializedName("TerminalName")
	 * @JMS\Type("string")
	 * @var null|string $TerminalName
	 */
	protected $TerminalName;
	/**
	 * @JMS\SerializedName("TerminalType")
	 * @JMS\Type("string")
	 * @var null|string $TerminalType
	 */
	protected $TerminalType;
	/**
	 * @JMS\SerializedName("SalesChannel")
	 * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Report\Ticket\TerminalInfo\SalesChannel")
	 * @var null|SalesChannel $SalesChannel
	 */
	protected $SalesChannel;

	/**
	 * @return null|string
	 */
	public function getTicketExpressId(): ?string {
		return $this->TicketExpressId;
	}

	/**
	 * @param null|string $TicketExpressId
	 *
	 * @return TicketTerminalInfoResponse
	 */
	public function setTicketExpressId( ?string $TicketExpressId ): TicketTerminalInfoResponse {
		$this->TicketExpressId = $TicketExpressId;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTerminalId(): ?string {
		return $this->TerminalId;
	}

	/**
	 * @param null|string $TerminalId
	 *
	 * @return TicketTerminalInfoResponse
	 */
	public function setTerminalId( ?string $TerminalId ): TicketTerminalInfoResponse {
		$this->TerminalId = $TerminalId;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTerminalName(): ?string {
		return $this->TerminalName;
	}

	/**
	 * @param null|string $TerminalName
	 *
	 * @return TicketTerminalInfoResponse
	 */
	public function setTerminalName( ?string $TerminalName ): TicketTerminalInfoResponse {
		$this->TerminalName = $TerminalName;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTerminalType(): ?string {
		return $this->TerminalType;
	}

	/**
	 * @param null|string $TerminalType
	 *
	 * @return TicketTerminalInfoResponse
	 */
	public function setTerminalType( ?string $TerminalType ): TicketTerminalInfoResponse {
		$this->TerminalType = $TerminalType;

		return $this;
	}

	/**
	 * @return SalesChannel|null
	 */
	public function getSalesChannel(): ?SalesChannel {
		return $this->SalesChannel;
	}

	/**
	 * @param SalesChannel|null $SalesChannel
	 *
	 * @return TicketTerminalInfoResponse
	 */
	public function setSalesChannel( ?SalesChannel $SalesChannel ): TicketTerminalInfoResponse {
		$this->SalesChannel = $SalesChannel;

		return $this;
	}
}
