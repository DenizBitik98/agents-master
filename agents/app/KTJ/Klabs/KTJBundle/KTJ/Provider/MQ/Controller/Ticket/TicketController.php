<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Ticket;


use App\KTJ\Klabs\KTJBundle\KTJ\Aware\Controller\Ticket\ReturnAware\TReturnAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Ticket\ITicketController;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class TicketController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Ticket
 *  @method Provider getProvider(): ?IProvider
 */
class TicketController implements ITicketController
{
    use TProviderAware;
    use TReturnAware;
}
