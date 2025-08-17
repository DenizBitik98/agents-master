<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 19:12
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\TerminalAware;
/**
 * Trait TTerminalAware
 * @package Klabs\KTJBundle\KTJ\Aware\TerminalAware
 */
trait TTerminalAware {
	/**
	 * @var null|string $ktjTerminal
	 */
	protected $ktjTerminal;

	/**
	 * @return null|string
	 */
	public function getKtjTerminal(): ?string {
		return $this->ktjTerminal;
	}

	/**
	 * @param null|string $ktjTerminal
	 *
	 * @return $this
	 */
	public function setKtjTerminal( ?string $ktjTerminal ) {
		$this->ktjTerminal = $ktjTerminal;

		return $this;
	}
}
