<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 10:40
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Ticket;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\ReturnAware\IReturnAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;

/**
 * Interface ITicketController
 * @package Klabs\KTJBundle\KTJ\Common\Controller\Ticket
 */
interface ITicketController extends IController, IReturnAware {

}
