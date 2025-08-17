<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 11/25/18
 * Time: 12:05 PM
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator;

use Symfony\Component\Translation\TranslatorInterface;

/**
 * Interface ITranslatorAware
 * @package Klabs\KTJBundle\KTJ\Aware\TTranslator
 */
interface ITranslatorAware {
	/**
	 * @return TranslatorInterface|null
	 */
	public function getTranslator(): ?TranslatorInterface;

	/**
	 * @param TranslatorInterface|null $translator
	 * @return $this
	 */
	public function setTranslator(?TranslatorInterface $translator);
}
