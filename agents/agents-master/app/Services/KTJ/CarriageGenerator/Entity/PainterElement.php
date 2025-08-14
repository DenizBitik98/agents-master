<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 30.05.2018
 * Time: 1:53
 */

namespace App\Services\KTJ\CarriageGenerator\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Element
 * @package App\Services\KTJ\CarriageGenerator\Entity
 */
class PainterElement {
	/**
	 * @var array $painterConfig
	 */
	protected $painterConfig = [];
	/**
	 * @var null|Collection|PainterElement[] $children
	 */
	protected $children;
	/**
	 * @var null|string $value
	 */
	protected $value;
	/**
	 * @var null|Collection|Seat[] $seats
	 */
	protected $seats;

	/**
	 * PainterElement constructor.
	 *
	 * @param array|null $painterConfig
	 */
	public function __construct( ?array $painterConfig = [] ) {
		$this->children = new ArrayCollection();
		$this->seats    = new ArrayCollection();
		$this->setPainterConfig( $painterConfig );
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
	 * @return PainterElement
	 */
	public function setPainterConfig( array $painterConfig ): PainterElement {
		$this->painterConfig = $painterConfig;

		return $this;
	}

	/**
	 * @param $attributeKey
	 * @param $attributeValue
	 *
	 * @return PainterElement
	 */
	public function addPainterConfig( $attributeKey, $attributeValue ): PainterElement {
		$this->painterConfig[$attributeKey] = $attributeValue;

		return $this;
	}

	/**
	 * @return Collection|PainterElement[]|null
	 */
	public function getChildren(): ?Collection {
		return $this->children;
	}

	/**
	 * @param Collection|null $children
	 *
	 * @return PainterElement
	 */
	public function setChildren( ?Collection $children ): PainterElement {
		$this->children = $children;

		return $this;
	}

	/**
	 * @param PainterElement $element
	 *
	 * @return PainterElement
	 */
	public function addChild( PainterElement $element ): PainterElement {
		$this->children->add( $element );

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getValue(): ?string {
		return $this->value;
	}

	/**
	 * @param null|string $value
	 *
	 * @return PainterElement
	 */
	public function setValue( ?string $value ): PainterElement {
		$this->value = $value;

		return $this;
	}

	/**
	 * @return Collection|Seat[]|null
	 */
	public function getSeats(): ?Collection {
		return $this->seats;
	}

	/**
	 * @param Collection|null $seats
	 *
	 * @return PainterElement
	 */
	public function setSeats( ?Collection $seats ): PainterElement {
		$this->seats = $seats;

		return $this;
	}

	/**
	 * @param Seat $seat
	 *
	 * @return $this
	 */
	public function addSeat( Seat $seat ) {
		$this->seats->add( $seat );

		return $this;
	}
}
