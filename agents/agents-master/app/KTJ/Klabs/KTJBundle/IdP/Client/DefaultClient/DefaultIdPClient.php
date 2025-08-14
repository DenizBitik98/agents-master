<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 23.05.2018
 * Time: 16:53
 */

namespace App\KTJ\Klabs\KTJBundle\IdP\Client\DefaultClient;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\Aware\ClientAware\IHttpClientAware;
use App\KTJ\Klabs\KTJBundle\Aware\ClientAware\THttpClientAware;
use App\KTJ\Klabs\KTJBundle\IdP\Client\DefaultClient\Event\IdPCallAfterEvent;
use App\KTJ\Klabs\KTJBundle\IdP\Client\DefaultClient\Event\IdPCallBeforeEvent;
use App\KTJ\Klabs\KTJBundle\IdP\IdPClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class DefaultIdPClient
 * @package Klabs\KTJBundle\IdP\Client\DefaultClient
 */
class DefaultIdPClient implements IdPClientInterface, IHttpClientAware, EventDispatcherAwareInterface
{
    use THttpClientAware;
    use EventDispatcherAwareTrait;
    /**
     * @var null|string $url
     */
    protected $url;

    /**
     * @param null|string $url
     *
     * @return DefaultIdPClient
     */
    public function setUrl(?string $url): DefaultIdPClient
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @inheritDoc
     * @param string $login
     * @param string $password
     * @return ResponseInterface
     * @throws GuzzleException
     */
    function getToken(string $login, string $password): ResponseInterface
    {
        $this->eventDispatcher->dispatch(IdPEvents::BEFORE_CALL, new IdPCallBeforeEvent());
        $psrResponse = $this->httpClient->request(
            'get',
            $this->url,
            [
                'headers' => [
                    'Authorization' => implode(
                        ' ',
                        [
                            'Basic',
                            $this->getBase64($login, $password),
                        ]
                    ),
                ],
            ]
        );
        $this->eventDispatcher->dispatch(IdPEvents::AFTER_CALL, new IdPCallAfterEvent($psrResponse, $this));

        return $psrResponse;
    }

    /**
     * @param string $login
     * @param string $password
     * @return string
     */
    protected function getBase64(string $login, string $password)
    {
        return base64_encode(
            implode(
                ':',
                [
                    $login,
                    $password,
                ]
            )
        );
    }
}
