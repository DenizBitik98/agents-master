<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 18.05.2018
 * Time: 13:06
 */

namespace App\Services\KTJ\CarriageGenerator\Painter;

use App\Services\KTJ\CarriageGenerator\Entity\PainterElement;

/**
 * Interface IPainter
 * @package App\Services\KTJ\CarriageGenerator\Painter
 */
interface IPainter {
	/**
	 * Draw the result
	 *
	 * @return string
	 */
	function paint(): string;

	/**
	 * Set root elements
	 *
	 * @param PainterElement $root
	 *
	 * @return IPainter
	 */
	function setRoot( PainterElement $root ): IPainter;

	/**
	 * Get carriage
	 * @return PainterElement
	 */
	function getRoot(): ?PainterElement;
}
