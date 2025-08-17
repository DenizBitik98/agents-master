<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 18.05.2018
 * Time: 13:11
 */

namespace App\Services\KTJ\CarriageGenerator\Entity;

use App\Services\KTJ\CarriageGenerator\Painter\Enum\Position;

/**
 * Class Seat
 * @package App\Services\KTJ\CarriageGenerator\Entity
 */
class Seat {
	/**
	 * @var null|bool $isActive
	 */
	protected $isActive;
	/**
	 * @var null|Position $position
	 */
	protected $position;
	/**
	 * @var null|int $place
	 */
	protected $place;
	/**
	 * @var null|array $painterConfig
	 */
	protected $painterConfig;

	/**
	 * Seat constructor.
	 *
	 * @param int|null $place
	 * @param Position $position
	 * @param bool|null $isActive
	 * @param array|null $painterConfig
	 */
	public function __construct(?int $place, Position $position, ?bool $isActive = true, ?array $painterConfig = []) {
		$this->setIsActive($isActive);
		$this->setPlace($place);
		$this->setPosition($position);
		$this->setPainterConfig($painterConfig);
	}

	/**
	 * @return int|null
	 */
	public function getPlace(): ?int {
		return $this->place;
	}

	/**
	 * @param int|null $place
	 *
	 * @return Seat
	 */
	public function setPlace(?int $place): Seat {
		$this->place = $place;

		return $this;
	}

	/**
	 * @return null|Position
	 */
	public function getPosition(): ?Position {
		return $this->position;
	}

	/**
	 * @param null|Position $position
	 *
	 * @return Seat
	 */
	public function setPosition(?Position $position): Seat {
		$this->position = $position;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getPainterConfig(): array {
		return $this->painterConfig;
	}

	/**
	 * @param array $painterConfig
	 *
	 * @return Seat
	 */
	public function setPainterConfig(array $painterConfig): Seat {
		if ($this->getisActive() == false) {
			$painterConfig['input']['disabled'] = 'disabled';
		}
		$this->painterConfig = $painterConfig;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getisActive(): ?bool {
		return $this->isActive;
	}

	/**
	 * @param bool|null $isActive
	 *
	 * @return Seat
	 */
	public function setIsActive(?bool $isActive): Seat {
		$this->isActive = $isActive;

		return $this;
	}
}
