<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 26.09.2018
 * Time: 11:59
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\EventSubscriber\Auth;

use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\IIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Auth\Auth\AuthRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware\IMQCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\MQCookieAware\TMQCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Auth\AuthController;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class AuthSubscriber
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\EventSubscriber\Auth
 */
class AuthSubscriber implements EventSubscriberInterface, IIdpCookieAware, IMQCookieAware
{
    use TIdpCookieAware;
    use TMQCookieAware;
    use TCacheAdapterAware;
    /**
     * @var null|string $defaultMachineKey
     */
    protected $defaultMachineKey;
    /**
     * @var null|string $confirmMachineKey
     */
    protected $confirmMachineKey;
    /**
     * @var null|string $reserveMachineKey
     */
    protected $reserveMachineKey;
    /**
     * @var null|string $defaultCookieStorageName
     */
    protected $defaultCookieStorageName = null;
    /**
     * @var null|string $confirmCookieStorageName
     */
    protected $confirmCookieStorageName = null;
    /**
     * @var null|string $reserveCookieStorageName
     */
    protected $reserveCookieStorageName = null;

    /*claim return*/
    /**
     * @var null|string $claimReturnMachineKey
     */
    protected $claimReturnMachineKey;
    /**
     * @var null|string $claimReturnCookieStorageName
     */
    protected $claimReturnCookieStorageName = null;

    /**
     * @return string|null
     */
    public function getDefaultMachineKey(): ?string
    {
        return $this->defaultMachineKey;
    }

    /**
     * @param string|null $defaultMachineKey
     * @return AuthSubscriber
     */
    public function setDefaultMachineKey(?string $defaultMachineKey): AuthSubscriber
    {
        $this->defaultMachineKey = $defaultMachineKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmMachineKey(): ?string
    {
        return $this->confirmMachineKey;
    }

    /**
     * @param string|null $confirmMachineKey
     * @return AuthSubscriber
     */
    public function setConfirmMachineKey(?string $confirmMachineKey): AuthSubscriber
    {
        $this->confirmMachineKey = $confirmMachineKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefaultCookieStorageName(): ?string
    {
        return $this->defaultCookieStorageName;
    }

    /**
     * @param string|null $defaultCookieStorageName
     * @return AuthSubscriber
     */
    public function setDefaultCookieStorageName(?string $defaultCookieStorageName): AuthSubscriber
    {
        $this->defaultCookieStorageName = $defaultCookieStorageName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmCookieStorageName(): ?string
    {
        return $this->confirmCookieStorageName;
    }

    /**
     * @param string|null $confirmCookieStorageName
     * @return AuthSubscriber
     */
    public function setConfirmCookieStorageName(?string $confirmCookieStorageName): AuthSubscriber
    {
        $this->confirmCookieStorageName = $confirmCookieStorageName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReserveMachineKey(): ?string
    {
        return $this->reserveMachineKey;
    }

    /**
     * @param string|null $reserveMachineKey
     */
    public function setReserveMachineKey(?string $reserveMachineKey): void
    {
        $this->reserveMachineKey = $reserveMachineKey;
    }

    /**
     * @return string|null
     */
    public function getReserveCookieStorageName(): ?string
    {
        return $this->reserveCookieStorageName;
    }

    /**
     * @param string|null $reserveCookieStorageName
     */
    public function setReserveCookieStorageName(?string $reserveCookieStorageName): void
    {
        $this->reserveCookieStorageName = $reserveCookieStorageName;
    }

    /**
     * @return string|null
     */
    public function getClaimReturnMachineKey(): ?string
    {
        return $this->claimReturnMachineKey;
    }

    /**
     * @param string|null $claimReturnMachineKey
     */
    public function setClaimReturnMachineKey(?string $claimReturnMachineKey): void
    {
        $this->claimReturnMachineKey = $claimReturnMachineKey;
    }

    /**
     * @return string|null
     */
    public function getClaimReturnCookieStorageName(): ?string
    {
        return $this->claimReturnCookieStorageName;
    }

    /**
     * @param string|null $claimReturnCookieStorageName
     */
    public function setClaimReturnCookieStorageName(?string $claimReturnCookieStorageName): void
    {
        $this->claimReturnCookieStorageName = $claimReturnCookieStorageName;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            AuthController::BEFORE_AUTH => [['beforeAuth', 15]],
            AuthController::AFTER_AUTH => [['afterAuth', 15]],
        ];
    }

    /**
     * Method called before making authorization request
     *
     * @param BeforeRequestEvent $event
     *
     * @throws InvalidArgumentException
     */
    function beforeAuth(BeforeRequestEvent $event)
    {
        /** @var AuthController $controller */
        $controller = $event->getController();
        $controller->setIdpCookies($this->loadIdPCookies());
    }

    /**
     * Method called after making authorization request
     *
     * @param AfterRequestEvent $event
     *
     * @throws InvalidArgumentException
     */
    function afterAuth(AfterRequestEvent $event)
    {
        $this->saveMQCookies($event->getPsrResponse(), $this->getCookieStorageName($event->getRequest()));
    }

    /**
     * @param AuthRequest|IRequest $request
     * @return string|null
     */
    protected function getCookieStorageName(IRequest $request)
    {
        if ($request->getMachineKey() == $this->getConfirmMachineKey()) {
            return $this->getConfirmCookieStorageName();
        }elseif ($request->getMachineKey() == $this->getReserveMachineKey()) {
            return $this->getReserveCookieStorageName();
        }elseif ($request->getMachineKey() == $this->getClaimReturnMachineKey()) {
            return $this->getClaimReturnCookieStorageName();
        } else {
            return $this->getDefaultCookieStorageName();
        }
    }
}
