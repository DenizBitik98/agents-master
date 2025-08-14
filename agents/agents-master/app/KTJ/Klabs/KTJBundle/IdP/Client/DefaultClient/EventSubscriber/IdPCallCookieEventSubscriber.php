<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 11:00
 */

namespace App\KTJ\Klabs\KTJBundle\IdP\Client\DefaultClient\EventSubscriber;

use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\IIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdpCookieAware\TIdpCookieAware;
use App\KTJ\Klabs\KTJBundle\IdP\Client\DefaultClient\Event\IdPCallAfterEvent;
use App\KTJ\Klabs\KTJBundle\IdP\Client\DefaultClient\Event\IdPCallBeforeEvent;
use App\KTJ\Klabs\KTJBundle\IdP\Client\DefaultClient\IdPEvents;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\ICacheAdapterAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Aware\CacheAdapterAware\TCacheAdapterAware;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class IdPCallCookieEventSubscriber
 * @package Klabs\KTJBundle\IdP\Client\DefaultClient\EventSubscriber
 */
class IdPCallCookieEventSubscriber implements EventSubscriberInterface, ICacheAdapterAware, IIdpCookieAware
{
    use TIdpCookieAware;
    use TCacheAdapterAware;

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            IdPEvents::BEFORE_CALL => [['beforeCall', 10]],
            IdPEvents::AFTER_CALL => [['afterCall', 10]],
        ];
    }

    /**
     * Method called before idp get token request
     *
     * @param IdPCallBeforeEvent $event
     */
    function beforeCall(IdPCallBeforeEvent $event)
    {

    }

    /**
     * Method called after idp get token request
     *
     * @param IdPCallAfterEvent $event
     *
     * @throws InvalidArgumentException
     */
    function afterCall(IdPCallAfterEvent $event)
    {
        $this->saveIdpCookies($event->getResponse());
    }
}
