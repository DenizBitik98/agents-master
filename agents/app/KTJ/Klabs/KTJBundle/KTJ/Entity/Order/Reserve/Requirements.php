<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 12:07
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Requirements
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class Requirements {
	/**
	 * @JMS\SerializedName("SeatsTop")
	 * @JMS\Type("int")
	 * @var null|int $SeatsTop
	 */
	protected $SeatsTop = null;
	/**
	 * @JMS\SerializedName("SeatsBottom")
	 * @JMS\Type("int")
	 * @var null|int $SeatsBottom
	 */
	protected $SeatsBottom = null;
	/**
	 * @JMS\SerializedName("SeatsRange")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\SeatRange")
	 * @var null|SeatRange $SeatsRange
	 */
	protected $SeatsRange;
	/**
	 * @JMS\SerializedName("SeatsComp")
	 * @JMS\Type("int")
	 * @var null|int $SeatsComp
	 */
	protected $SeatsComp;
	/**
	 * @JMS\SerializedName("WoBedding")
	 * @JMS\Type("bool")
	 * @var null|bool $WoBedding
	 */
	protected $WoBedding;
	/**
	 * @JMS\SerializedName("CompType")
	 * @JMS\Type("int")
	 * @var null|int $CompType
	 */
	protected $CompType = 2;

	/**
	 * @return int|null
	 */
	public function getSeatsTop(): ?int {
		return $this->SeatsTop;
	}

	/**
	 * @param int|null $SeatsTop
	 *
	 * @return Requirements
	 */
	public function setSeatsTop( ?int $SeatsTop ): Requirements {
		$this->SeatsTop = $SeatsTop;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSeatsBottom(): ?int {
		return $this->SeatsBottom;
	}

	/**
	 * @param int|null $SeatsBottom
	 *
	 * @return Requirements
	 */
	public function setSeatsBottom( ?int $SeatsBottom ): Requirements {
		$this->SeatsBottom = $SeatsBottom;

		return $this;
	}

	/**
	 * @return SeatRange|null
	 */
	public function getSeatsRange(): ?SeatRange {
		return $this->SeatsRange;
	}

	/**
	 * @param SeatRange|null $SeatsRange
	 *
	 * @return Requirements
	 */
	public function setSeatsRange( ?SeatRange $SeatsRange ): Requirements {
		$this->SeatsRange = $SeatsRange;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSeatsComp(): ?int {
		return $this->SeatsComp;
	}

	/**
	 * @param int|null $SeatsComp
	 *
	 * @return Requirements
	 */
	public function setSeatsComp( ?int $SeatsComp ): Requirements {
		$this->SeatsComp = $SeatsComp;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getWoBedding(): ?bool {
		return $this->WoBedding;
	}

	/**
	 * @param bool|null $WoBedding
	 *
	 * @return Requirements
	 */
	public function setWoBedding( ?bool $WoBedding ): Requirements {
		$this->WoBedding = $WoBedding;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getCompType(): ?int {
		return $this->CompType;
	}

	/**
	 * @param int|null $CompType
	 *
	 * @return Requirements
	 */
	public function setCompType( ?int $CompType ): Requirements {
		$this->CompType = $CompType;

		return $this;
	}
}
