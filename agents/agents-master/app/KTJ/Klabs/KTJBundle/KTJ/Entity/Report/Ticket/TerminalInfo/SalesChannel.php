<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 15:47
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Ticket\TerminalInfo;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SalesChannel
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Ticket\TerminalInfo
 */
class SalesChannel {
	/**
	 * @JMS\SerializedName("Id")
	 * @JMS\Type("string")
	 * @var null|string $Id
	 */
	protected $Id;
	/**
	 * @JMS\SerializedName("Code")
	 * @JMS\Type("string")
	 * @var null|string $Code
	 */
	protected $Code;
	/**
	 * @JMS\SerializedName("Name")
	 * @JMS\Type("string")
	 * @var null|string $Name
	 */
	protected $Name;

	/**
	 * @return null|string
	 */
	public function getId(): ?string {
		return $this->Id;
	}

	/**
	 * @param null|string $Id
	 *
	 * @return SalesChannel
	 */
	public function setId( ?string $Id ): SalesChannel {
		$this->Id = $Id;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCode(): ?string {
		return $this->Code;
	}

	/**
	 * @param null|string $Code
	 *
	 * @return SalesChannel
	 */
	public function setCode( ?string $Code ): SalesChannel {
		$this->Code = $Code;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getName(): ?string {
		return $this->Name;
	}

	/**
	 * @param null|string $Name
	 *
	 * @return SalesChannel
	 */
	public function setName( ?string $Name ): SalesChannel {
		$this->Name = $Name;

		return $this;
	}
}
