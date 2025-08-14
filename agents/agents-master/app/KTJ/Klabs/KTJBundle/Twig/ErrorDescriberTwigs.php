<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 31.05.2018
 * Time: 16:35
 */

namespace App\KTJ\Klabs\KTJBundle\Twig;

use App\KTJ\Klabs\KTJBundle\Aware\ErrorDescriber\IErrorDescriberAware;
use App\KTJ\Klabs\KTJBundle\Aware\ErrorDescriber\TErrorDescriberAware;
use Twig\Extension\AbstractExtension;

/**
 * Class ErrorDescriberTwigs
 * @package Klabs\KTJBundle\Twig
 */
class ErrorDescriberTwigs extends AbstractExtension implements IErrorDescriberAware {
	use TErrorDescriberAware;

	/** @inheritdoc */
	public function getFilters() {
		return array(
			new \Twig_SimpleFilter( 'describeKtjError', [
				$this->errorDescriber,
				'describeErrorCode'
			] ),
		);
	}

	/** @inheritdoc */
	public function getFunctions() {
		return [
			new \Twig_Function( 'describeKtjError', [
				$this->errorDescriber,
				'describeErrorCode'
			] ),
		];
	}
}
