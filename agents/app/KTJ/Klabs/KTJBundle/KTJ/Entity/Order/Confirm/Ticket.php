<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 16:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\PaymentInfo;

/**
 * Class Ticket
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Confirm
 */
class Ticket {
	/**
	 * @JMS\SerializedName("TicketId")
	 * @JMS\Type("string")
	 * @var null|string $TicketId
	 */
	protected $TicketId;
	/**
	 * @JMS\SerializedName("Payment")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\Payment")
	 * @var null|Payment $Payment
	 */
	protected $Payment;
	/**
	 * @JMS\SerializedName("PaymentInfo")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\PaymentInfo")
	 * @var null|PaymentInfo $PaymentInfo
	 */
	protected $PaymentInfo;
	/**
	 * @JMS\SerializedName("ElRegStatus")
	 * @JMS\Type("bool")
	 * @var null|bool $ElRegStatus
	 */
	protected $ElRegStatus;
	/**
	 * @JMS\SerializedName("StopDateTime")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $StopDateTime
	 */
	protected $StopDateTime;

	/**
	 * @return null|string
	 */
	public function getTicketId(): ?string {
		return $this->TicketId;
	}

	/**
	 * @param null|string $TicketId
	 *
	 * @return Ticket
	 */
	public function setTicketId( ?string $TicketId ): Ticket {
		$this->TicketId = $TicketId;

		return $this;
	}

	/**
	 * @return Payment|null
	 */
	public function getPayment(): ?Payment {
		return $this->Payment;
	}

	/**
	 * @param Payment|null $Payment
	 *
	 * @return Ticket
	 */
	public function setPayment( ?Payment $Payment ): Ticket {
		$this->Payment = $Payment;

		return $this;
	}

	/**
	 * @return PaymentInfo|null
	 */
	public function getPaymentInfo(): ?PaymentInfo {
		return $this->PaymentInfo;
	}

	/**
	 * @param PaymentInfo|null $PaymentInfo
	 *
	 * @return Ticket
	 */
	public function setPaymentInfo( ?PaymentInfo $PaymentInfo ): Ticket {
		$this->PaymentInfo = $PaymentInfo;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getElRegStatus(): ?bool {
		return $this->ElRegStatus;
	}

	/**
	 * @param bool|null $ElRegStatus
	 *
	 * @return Ticket
	 */
	public function setElRegStatus( ?bool $ElRegStatus ): Ticket {
		$this->ElRegStatus = $ElRegStatus;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getStopDateTime(): ?DateTime {
		return $this->StopDateTime;
	}

	/**
	 * @param DateTime|null $StopDateTime
	 *
	 * @return Ticket
	 */
	public function setStopDateTime( ?DateTime $StopDateTime ): Ticket {
		$this->StopDateTime = $StopDateTime;

		return $this;
	}
}
