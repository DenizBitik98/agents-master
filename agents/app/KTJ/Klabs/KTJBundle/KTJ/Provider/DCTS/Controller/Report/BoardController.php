<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 27.02.19
 * Time: 13:15
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IBoardController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Board\BoardPass;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Board\BoardPassResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class BoardController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report
 * @method Provider getProvider
 */
class BoardController implements IBoardController, EventDispatcherAwareInterface, SerializerAwareInterface
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;

    /**
     * Event occurs before making boarding pass request
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_BOARDING_PASS = 'ktj.dcts.report.board.boarding-pass.before';
    /**
     * Event occurs after making boarding pass request
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_BOARDING_PASS = 'ktj.dcts.report.board.boarding-pass.after';
    /**
     * Event occurs after making boarding pass request
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_BOARDING_PASS = 'ktj.dcts.report.board.boarding-pass.serialize';
    /**
     * @var null|string $boardPassUri
     */
    protected $boardPassUri;

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function getBoardingPassAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->getBoardingPass($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->getBoardingPassAuthorized($request);
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function getBoardingPass(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_BOARDING_PASS, new BeforeRequestEvent($this, $request));
        $psrResponse = $this->getProvider()->getHttpClient()->request('post', $this->getBoardPassUri(), [
            'cookies' => $this->getProvider()->getDctsCookies(),
            'body' => $this->getSerializer()->serialize($request, 'json')
        ]);
        $this->eventDispatcher->dispatch(static::AFTER_BOARDING_PASS, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        /** @var array $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            implode([
                'array<',
                BoardPass::class,
                '>'
            ]),
            'json'
        );
        $response = new BoardPassResponse(new ArrayCollection($response));
        $this->eventDispatcher->dispatch(static::SERIALIZE_BOARDING_PASS, new AfterRequestEvent($request, $response, $psrResponse));

        return $response;
    }

    /**
     * @return string|null
     */
    public function getBoardPassUri(): ?string
    {
        return $this->boardPassUri;
    }

    /**
     * @param string|null $boardPassUri
     * @return BoardController
     */
    public function setBoardPassUri(?string $boardPassUri): BoardController
    {
        $this->boardPassUri = $boardPassUri;
        return $this;
    }
}
