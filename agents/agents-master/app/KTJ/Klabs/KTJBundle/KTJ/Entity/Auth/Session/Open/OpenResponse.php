<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 16:36
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Session\Open;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class OpenResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Auth\Session\Open
 */
class OpenResponse implements IResponse {
	/**
	 * @JMS\SerializedName("Id")
	 * @JMS\Type("string")
	 * @var null|string $Id
	 */
	protected $Id;
	/**
	 * @JMS\SerializedName("BeginTimestamp")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s.uO'>")
	 * @var null|string $BeginTimestamp
	 */
	protected $BeginTimestamp;
	/**
	 * @JMS\SerializedName("EndTimestamp")
	 * @JMS\Type("DateTime<'Y-m-dTH:i:s.uO'>")
	 * @var null|string $EndTimestamp
	 */
	protected $EndTimestamp;
	/**
	 * @JMS\SerializedName("UserId")
	 * @JMS\Type("string")
	 * @var null|string $UserId
	 */
	protected $UserId;
	/**
	 * @JMS\SerializedName("TerminalId")
	 * @JMS\Type("string")
	 * @var null|string $TerminalId
	 */
	protected $TerminalId;

	/**
	 * @return null|string
	 */
	public function getId(): ?string {
		return $this->Id;
	}

	/**
	 * @param null|string $Id
	 *
	 * @return OpenResponse
	 */
	public function setId( ?string $Id ): OpenResponse {
		$this->Id = $Id;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getBeginTimestamp(): ?string {
		return $this->BeginTimestamp;
	}

	/**
	 * @param null|string $BeginTimestamp
	 *
	 * @return OpenResponse
	 */
	public function setBeginTimestamp( ?string $BeginTimestamp ): OpenResponse {
		$this->BeginTimestamp = $BeginTimestamp;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getEndTimestamp(): ?string {
		return $this->EndTimestamp;
	}

	/**
	 * @param null|string $EndTimestamp
	 *
	 * @return OpenResponse
	 */
	public function setEndTimestamp( ?string $EndTimestamp ): OpenResponse {
		$this->EndTimestamp = $EndTimestamp;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getUserId(): ?string {
		return $this->UserId;
	}

	/**
	 * @param null|string $UserId
	 *
	 * @return OpenResponse
	 */
	public function setUserId( ?string $UserId ): OpenResponse {
		$this->UserId = $UserId;

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
	 * @return OpenResponse
	 */
	public function setTerminalId( ?string $TerminalId ): OpenResponse {
		$this->TerminalId = $TerminalId;

		return $this;
	}
}
