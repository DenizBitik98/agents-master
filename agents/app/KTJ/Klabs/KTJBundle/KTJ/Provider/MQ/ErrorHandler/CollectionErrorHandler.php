<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\ErrorHandler;


use IteratorAggregate;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\IErrorHandler;
use Psr\Http\Message\ResponseInterface;

/**
 * Class CollectionErrorHandler
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\ErrorHandler
 */
class CollectionErrorHandler implements IErrorHandler
{
    /**
     * @var null|IteratorAggregate|IErrorHandler[] $handlers
     */
    protected $handlers;

    /**
     * @return IteratorAggregate|IErrorHandler[]|null
     */
    public function getHandlers(): ?IteratorAggregate
    {
        return $this->handlers;
    }

    /**
     * @param IteratorAggregate|IErrorHandler[]|null $handlers
     * @return CollectionErrorHandler
     */
    public function setHandlers(?IteratorAggregate $handlers): CollectionErrorHandler
    {
        $this->handlers = $handlers;

        return $this;
    }

    /**
     * @inheritDoc
     */
    function handle(ResponseInterface $response, IRequest $request = null): ?bool
    {
        foreach ($this->getHandlers() as $handler) {
            if ($handler->handle($response, $request)) {
                return true;
            }
        }

        return false;
    }
}
