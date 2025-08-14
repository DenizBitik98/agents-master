<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\ExpressCommit;


use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareInterface;
use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\ExpressCommit\IExpressCommitController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\IErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Aware\ErrorHandlerAware\TErrorHandlerAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open\Response as SessionOpenResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\ExpressCommit\Commit\Request;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\ExpressCommit\Commit\Response as CommitResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;

/**
 * Class ExpressCommitController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\ExpressCommit
 * @method Provider getProvider(): ?IProvider
 */
class ExpressCommitController implements IExpressCommitController, EventDispatcherAwareInterface, SerializerAwareInterface, IErrorHandlerAware
{
    use TProviderAware;
    use EventDispatcherAwareTrait;
    use SerializerAwareTrait;
    use TErrorHandlerAware;
    /**
     * @var null|string $commitUrl
     */
    protected $commitUrl;

    /**
     * @return string|null
     */
    public function getCommitUrl(): ?string
    {
        return $this->commitUrl;
    }

    /**
     * @param string|null $commitUrl
     * @return ExpressCommitController
     */
    public function setCommitUrl(?string $commitUrl): ExpressCommitController
    {
        $this->commitUrl = $commitUrl;

        return $this;
    }

    /**
     * @inheritDoc
     * @param Request $request
     * @throws GuzzleException
     */
    function Commit(IRequest $request): ?IResponse
    {
        try {
            $psrResponse = $this->getProvider()->getHttpClient()->request(
                'post',
                $this->getCommitUrl(),
                [
                    'cookies' => $this->getProvider()->getMqCookies(),
                    'body' => $this->getSerializer()->serialize($request, 'json'),
                ]
            );
            $psrResponse->getBody()->rewind();
            /** @var null|SessionOpenResponse $response */
            $response = new CommitResponse();

            return $response;
        } catch (ClientException $exception) {
            if ($this->getErrorHandler()->handle($exception->getResponse(), $request)) {
                return $this->Commit($request);
            }
            throw $exception;
        }
    }
}
