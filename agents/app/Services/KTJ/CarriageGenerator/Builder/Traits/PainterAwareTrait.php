<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 18.05.2018
 * Time: 16:21
 */

namespace App\Services\KTJ\CarriageGenerator\Builder\Traits;

use App\Services\KTJ\CarriageGenerator\Painter\IPainter;

/**
 * Trait PainterAwareTrait
 * @package App\Services\KTJ\CarriageGenerator\Painter\Traits\PainterAware
 */
trait PainterAwareTrait {
	/**
	 * @var null|IPainter $painter
	 */
	protected $painter;

	/**
	 * @param null|IPainter $painter
	 *
	 * @return $this
	 */
	public function setPainter( ?IPainter $painter ) {
		$this->painter = $painter;

		return $this;
	}

	/**
	 * Get painter
	 * @inheritDoc
	 */
	public function getPainter(): IPainter {
		return $this->painter;
	}
}
