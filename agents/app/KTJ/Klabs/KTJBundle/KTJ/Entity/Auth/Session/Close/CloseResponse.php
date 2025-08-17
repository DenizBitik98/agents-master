<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 16:35
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Session\Close;

use DateTime;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class CloseResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Auth\Session\Close
 */
class CloseResponse implements IResponse {
	/**
	 * @var null|DateTime $dateTime
	 */
	protected $dateTime;

	/**
	 * CloseResponse constructor.
	 *
	 * @param DateTime|null $dateTime
	 */
	public function __construct( ?DateTime $dateTime = null ) {
		$this->setDateTime( $dateTime );
	}

	/**
	 * @return DateTime|null
	 */
	public function getDateTime(): ?DateTime {
		return $this->dateTime;
	}

	/**
	 * @param DateTime|null $dateTime
	 *
	 * @return CloseResponse
	 */
	public function setDateTime( ?DateTime $dateTime ): CloseResponse {
		$this->dateTime = $dateTime;

		return $this;
	}
}
