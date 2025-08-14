<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 19:13
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\TerminalAware;
/**
 * Interface ITerminalAware
 * @package Klabs\KTJBundle\KTJ\Aware\TerminalAware
 */
interface ITerminalAware {
	/**
	 * @return null|string
	 */
	public function getKtjTerminal(): ?string;

	/**
	 * @param null|string $ktjTerminal
	 *
	 * @return $this
	 */
	public function setKtjTerminal( ?string $ktjTerminal );
}
