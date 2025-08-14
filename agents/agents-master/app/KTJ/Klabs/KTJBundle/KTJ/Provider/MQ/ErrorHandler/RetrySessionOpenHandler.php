<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\ErrorHandler;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\IProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\IErrorHandler;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\NonFinalizedExpressRequestFound;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;
use Psr\Http\Message\ResponseInterface;

/**
 * Class RetrySessionOpenHandler
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\ErrorHandler
 * @method Provider getProvider() : ?IProvider
 */
class RetrySessionOpenHandler implements IErrorHandler, IProviderAware
{
    use TProviderAware;
    /**
     * @var null|ExceptionFactory $exceptionFactory
     */
    protected $exceptionFactory;

    /**
     * @return ExceptionFactory|null
     */
    public function getExceptionFactory(): ?ExceptionFactory
    {
        return $this->exceptionFactory;
    }

    /**
     * @param ExceptionFactory|null $exceptionFactory
     * @return RetrySessionOpenHandler
     */
    public function setExceptionFactory(?ExceptionFactory $exceptionFactory): RetrySessionOpenHandler
    {
        $this->exceptionFactory = $exceptionFactory;

        return $this;
    }

    /**
     * @inheritDoc
     */
    function handle(ResponseInterface $response, IRequest $request = null): ?bool
    {
        $exception = $this->getExceptionFactory()->getErrorClass($response);
        if ($exception instanceof NonFinalizedExpressRequestFound) {
            $openResponse = $this->getProvider()->getSessionController()->retryOpen();
        }

        return false;
    }
}
