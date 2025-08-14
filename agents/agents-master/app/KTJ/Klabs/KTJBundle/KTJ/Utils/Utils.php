<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 23:12
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Utils;
/**
 * Class Utils
 * @package Klabs\KTJBundle\KTJ\Helper
 */
class Utils
{
    /**
     * @var null|CarUtils $carUtils
     */
    protected $carUtils;
    /**
     * @var null|TicketUtils $ticketUtils
     */
    protected $ticketUtils;
    /**
     * @var null|OrderUtils $orderUtils
     */
    protected $orderUtils;

    /**
     * @return CarUtils|null
     */
    public function getCarUtils(): ?CarUtils
    {
        return $this->carUtils;
    }

    /**
     * @param CarUtils|null $carUtils
     *
     * @return Utils
     */
    public function setCarUtils(?CarUtils $carUtils): Utils
    {
        $this->carUtils = $carUtils;

        return $this;
    }

    /**
     * @return TicketUtils|null
     */
    public function getTicketUtils(): ?TicketUtils
    {
        return $this->ticketUtils;
    }

    /**
     * @param TicketUtils|null $ticketUtils
     *
     * @return Utils
     */
    public function setTicketUtils(?TicketUtils $ticketUtils): Utils
    {
        $this->ticketUtils = $ticketUtils;

        return $this;
    }

    /**
     * @return OrderUtils|null
     */
    public function getOrderUtils(): ?OrderUtils
    {
        return $this->orderUtils;
    }

    /**
     * @param OrderUtils|null $orderUtils
     * @return Utils
     */
    public function setOrderUtils(?OrderUtils $orderUtils): Utils
    {
        $this->orderUtils = $orderUtils;
        return $this;
    }
}
