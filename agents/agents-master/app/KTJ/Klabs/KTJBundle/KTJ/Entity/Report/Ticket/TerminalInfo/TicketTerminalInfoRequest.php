<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 15:45
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Ticket\TerminalInfo;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class TicketTerminalInfoRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Ticket\TerminalInfo
 */
class TicketTerminalInfoRequest implements IRequest {
	/**
	 * @JMS\SerializedName("Value")
	 * @JMS\Type("string")
	 * @var null|string $Value
	 */
	protected $Value;

	/**
	 * TicketTerminalInfoRequest constructor.
	 *
	 * @param null|string $Value
	 */
	public function __construct( ?string $Value = null ) {
		$this->setValue( $Value );
	}

	/**
	 * @param null|string $Value
	 *
	 * @return static
	 */
	static function getInstance( ?string $Value = null ) {
		return new static( $Value );
	}

	/**
	 * @return null|string
	 */
	public function getValue(): ?string {
		return $this->Value;
	}

	/**
	 * @param null|string $Value
	 *
	 * @return TicketTerminalInfoRequest
	 */
	public function setValue( ?string $Value ): TicketTerminalInfoRequest {
		$this->Value = $Value;

		return $this;
	}
}
