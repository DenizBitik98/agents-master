<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 11/25/18
 * Time: 12:04 PM
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator;

use Symfony\Component\Translation\TranslatorInterface;

/**
 * Trait TTranslatorAware
 * @package Klabs\KTJBundle\KTJ\Aware\TTranslator
 */
trait TTranslatorAware {
	/**
	 * @var null|TranslatorInterface $translator
	 */
	protected $translator;

	/**
	 * @return TranslatorInterface|null
	 */
	public function getTranslator(): ?TranslatorInterface {
		return $this->translator;
	}

	/**
	 * @param TranslatorInterface|null $translator
	 * @return $this
	 */
	public function setTranslator(?TranslatorInterface $translator) {
		$this->translator = $translator;
		return $this;
	}
}
