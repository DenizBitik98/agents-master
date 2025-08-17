<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.09.2018
 * Time: 16:21
 */

namespace App\KTJ\Klabs\KTJBundle\Log;

use Monolog\Handler\StreamHandler as BaseClass;
use Monolog\Logger;

/**
 * Class RotatingDirectoryHandler
 * @package Klabs\KTJBundle\Log
 */
class RotatingDirectoryHandler extends BaseClass {
	const DIR_PER_DAY = 'Y-m-d';
	const DIR_PER_YEAR_MONTH_DAY = 'Y/m/d';
	const DIR_PER_MONTH = 'Y-m';
	const DIR_PER_YEAR = 'Y';
	/**
	 * File name
	 * @var null|string $filename
	 */
	protected $filename;
	/**
	 * Format of the date
	 * @var null|string $dateFormat
	 */
	protected $dateFormat = self::DIR_PER_YEAR_MONTH_DAY;

	/**
	 * RotatingDirectoryHandler constructor.
	 *
	 * @param string    $filename
	 * @param int       $level          The minimum logging level at which this handler will be triggered
	 * @param bool      $bubble         Whether the messages that are handled can bubble up the stack or not
	 * @param  int|null $filePermission Optional file permissions (default (0644) are only for owner read/write)
	 * @param bool      $useLocking     Try to lock log file before doing any writes
	 *
	 * @throws \Exception
	 */
	public function __construct( $filename, $level = Logger::DEBUG, $bubble = true, $filePermission = null, $useLocking = false ) {
		$this->filename = $filename;
		parent::__construct( $this->getNewFileName(), $level, $bubble, $filePermission, $useLocking );
	}


	/**
	 * Set date format
	 *
	 * @param null|string $dateFormat
	 *
	 * @return $this
	 */
	public function setDateFormat( ?string $dateFormat ) {
		if ( ! preg_match( '{^Y(([/_.-]?m)([/_.-]?d)?)?$}', $dateFormat ) )
		{
			trigger_error(
				'Invalid date format - format must be one of ' .
				'RotatingDirectoryHandler::DIR_PER_DAY ("Y-m-d"), RotatingDirectoryHandler::DIR_PER_MONTH ("Y-m") ' .
				'or RotatingDirectoryHandler::DIR_PER_YEAR ("Y"), RotatingDirectoryHandler::DIR_PER_YEAR_MONTH_DAY ("Y/m/d") ' .
				'or you can set one of the date formats using slashes, underscores and/or dots instead of dashes.',
				E_USER_DEPRECATED
			);
		}
		$this->dateFormat = $dateFormat;

		return $this;
	}

	/**
	 * @return mixed|string
	 */
	protected function getNewFileName() {
		$fileInfo = pathinfo( $this->filename );

		return $fileInfo['dirname'] . '/' . date( $this->dateFormat ) . '/' . $fileInfo['basename'];
	}
}
