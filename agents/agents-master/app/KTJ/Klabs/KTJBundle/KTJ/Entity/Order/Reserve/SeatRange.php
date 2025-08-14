<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 17:51
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SeatRange
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 *
 */
class SeatRange {
	/**
	 * @JMS\SerializedName("Start")
	 * @JMS\Type("int")
	 * @var null|int $Start
	 */
	protected $Start;
	/**
	 * @JMS\SerializedName("End")
	 * @JMS\Type("int")
	 * @var null|int $End
	 */
	protected $End;

	/**
	 * SeatRange constructor.
	 *
	 * @param int|null $Start
	 * @param int|null $End
	 */
	public function __construct( ?int $Start = null, ?int $End = null ) {
		$this->setStart( $Start );
		$this->setEnd( $End );
	}

	/**
	 * @return int|null
	 */
	public function getStart(): ?int {
		return $this->Start;
	}

	/**
	 * @param int|null $Start
	 *
	 * @return SeatRange
	 */
	public function setStart( ?int $Start ): SeatRange {
		$this->Start = $Start;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getEnd(): ?int {
		return $this->End;
	}

	/**
	 * @param int|null $End
	 *
	 * @return SeatRange
	 */
	public function setEnd( ?int $End ): SeatRange {
		$this->End = $End;

		return $this;
	}
}
