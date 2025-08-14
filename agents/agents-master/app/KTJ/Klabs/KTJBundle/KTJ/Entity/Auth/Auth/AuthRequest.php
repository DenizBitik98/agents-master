<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 01.10.2018
 * Time: 16:32
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Auth;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class AuthRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Auth\Auth
 */
class AuthRequest implements IRequest
{
    /**
     * @var null|string $token
     */
    protected $token;
    /**
     * @var null|string $machineKey
     */
    protected $machineKey;

    /**
     * AuthRequest constructor.
     * @param string|null $token
     * @param string|null $machineKey
     */
    public function __construct(?string $token = null, ?string $machineKey)
    {
        $this->setToken($token);
        $this->setMachineKey($machineKey);
    }

    /**
     * @return null|string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param null|string $token
     *
     * @return AuthRequest
     */
    public function setToken(?string $token): AuthRequest
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMachineKey(): ?string
    {
        return $this->machineKey;
    }

    /**
     * @param string|null $machineKey
     * @return AuthRequest
     */
    public function setMachineKey(?string $machineKey): AuthRequest
    {
        $this->machineKey = $machineKey;

        return $this;
    }
}
