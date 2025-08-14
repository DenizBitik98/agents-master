<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 23.05.2018
 * Time: 17:00
 */

namespace App\KTJ\Klabs\KTJBundle\IdP\Client\DefaultClient;
/**
 * Class IdPEvents
 * @package Klabs\KTJBundle\IdP\Client\DefaultClient
 */
class IdPEvents {
	/**
	 * Event occurs before making idp call
	 * @Event("Klabs\KTJBundle\IdP\Client\DefaultClient\Event\IdPCallBeforeEvent")
	 */
	const BEFORE_CALL = 'idp.call.before';
	/**
	 * Event occurs after making idp call
	 * @Event("Klabs\KTJBundle\IdP\Client\DefaultClient\Event\IdPCallAfterEvent")
	 */
	const AFTER_CALL = 'idp.call.after';
}
