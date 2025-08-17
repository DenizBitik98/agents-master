<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class Request
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open
 */
class Request implements IRequest
{
    /**
     * @var null|BlankIdentity $BlankIdentity
     */
    protected $BlankIdentity;

    /**
     * @return BlankIdentity|null
     */
    public function getBlankIdentity(): ?BlankIdentity
    {
        return $this->BlankIdentity;
    }

    /**
     * @param BlankIdentity|null $BlankIdentity
     * @return Request
     */
    public function setBlankIdentity(?BlankIdentity $BlankIdentity): Request
    {
        $this->BlankIdentity = $BlankIdentity;

        return $this;
    }
}
