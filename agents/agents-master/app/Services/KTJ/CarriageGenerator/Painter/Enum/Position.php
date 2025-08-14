<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 30.05.2018
 * Time: 1:36
 */

namespace App\Services\KTJ\CarriageGenerator\Painter\Enum;



use MyCLabs\Enum\Enum;

/**
 * Class Position
 * @package App\Services\KTJ\CarriageGenerator\Painter\Enum
 *
 * @method static Position VERTICALLY_SORTED()
 *
 * @method static Position TOP_LEFT()
 * @method static Position MIDDLE_LEFT()
 * @method static Position BOTTOM_LEFT()
 *
 * @method static Position TOP_MIDDLE()
 * @method static Position MIDDLE_MIDDLE()
 * @method static Position BOTTOM_MIDDLE()
 *
 * @method static Position TOP_RIGHT()
 * @method static Position MIDDLE_RIGHT()
 * @method static Position BOTTOM_RIGHT()
 */
final class Position extends Enum {
	private const VERTICALLY_SORTED = 'vl';

	private const TOP_LEFT = 'tl';
	private const MIDDLE_LEFT = 'ml';
	private const BOTTOM_LEFT = 'bl';

	private const TOP_MIDDLE = 'tm';
	private const MIDDLE_MIDDLE = 'mm';
	private const BOTTOM_MIDDLE = 'bm';

	private const TOP_RIGHT = 'tr';
	private const MIDDLE_RIGHT = 'mr';
	private const BOTTOM_RIGHT = 'br';
}
