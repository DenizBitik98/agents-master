<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 0:39
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Order
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class Order {
	/**
	 * @JMS\SerializedName("Id")
	 * @JMS\Type("string")
	 * @var null|string $Id
	 */
	protected $Id;
	/**
	 * @JMS\SerializedName("ExpressID")
	 * @JMS\Type("string")
	 * @var null|string $ExpressID
	 */
	protected $ExpressID;
	/**
	 * @JMS\SerializedName("CreateDate")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $CreateDate
	 */
	protected $CreateDate;
	/**
	 * @JMS\SerializedName("PaymentType")
	 * @JMS\Type("int")
	 * @var null|int $PaymentType
	 */
	protected $PaymentType;
	/**
	 * @JMS\SerializedName("IsInternational")
	 * @JMS\Type("bool")
	 * @var null|bool $IsInternational
	 */
	protected $IsInternational;
	/**
	 * @JMS\SerializedName("StopDateTime")
	 * @JMS\Type("DateTime")
	 * @var null|DateTime $StopDateTime
	 */
	protected $StopDateTime;

	/**
	 * @return null|string
	 */
	public function getId(): ?string {
		return $this->Id;
	}

	/**
	 * @param null|string $Id
	 *
	 * @return Order
	 */
	public function setId( ?string $Id ): Order {
		$this->Id = $Id;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getExpressID(): ?string {
		return $this->ExpressID;
	}

	/**
	 * @param null|string $ExpressID
	 *
	 * @return Order
	 */
	public function setExpressID( ?string $ExpressID ): Order {
		$this->ExpressID = $ExpressID;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getCreateDate(): ?DateTime {
		return $this->CreateDate;
	}

	/**
	 * @param DateTime|null $CreateDate
	 *
	 * @return Order
	 */
	public function setCreateDate( ?DateTime $CreateDate ): Order {
		$this->CreateDate = $CreateDate;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getPaymentType(): ?int {
		return $this->PaymentType;
	}

	/**
	 * @param int|null $PaymentType
	 *
	 * @return Order
	 */
	public function setPaymentType( ?int $PaymentType ): Order {
		$this->PaymentType = $PaymentType;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getisInternational(): ?bool {
		return $this->IsInternational;
	}

	/**
	 * @param bool|null $IsInternational
	 *
	 * @return Order
	 */
	public function setIsInternational( ?bool $IsInternational ): Order {
		$this->IsInternational = $IsInternational;

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
	 * @return Order
	 */
	public function setStopDateTime( ?DateTime $StopDateTime ): Order {
		$this->StopDateTime = $StopDateTime;

		return $this;
	}
}
