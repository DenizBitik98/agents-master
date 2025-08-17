<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 16:34
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Session\Close;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware\MachineKeyAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\MachineKeyAware\MachineKeyAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class CloseRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Auth\Session\Close
 */
class CloseRequest implements IRequest, MachineKeyAwareInterface {
	use MachineKeyAwareTrait;
}
