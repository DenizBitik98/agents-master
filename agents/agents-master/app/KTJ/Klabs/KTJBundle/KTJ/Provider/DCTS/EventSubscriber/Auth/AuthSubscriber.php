<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 14:45
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\EventSubscriber\Auth;

use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\IIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware\IDCTSCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\DCTSCookieAware\TDCTSCookieAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Auth\AuthController;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class AuthSubscriber
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\EventSubscriber\Auth
 */
class AuthSubscriber implements EventSubscriberInterface, IIdpCookieAware, IDCTSCookieAware
{
    use TIdpCookieAware;
    use TDCTSCookieAware;
    use TCacheAdapterAware;

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
        $this->saveDCTSCookies($event->getPsrResponse());
    }
}
