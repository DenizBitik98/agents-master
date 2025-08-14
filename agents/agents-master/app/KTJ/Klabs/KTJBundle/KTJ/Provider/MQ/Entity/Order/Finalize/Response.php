<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Finalize;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Finalize
 */
class Response implements IResponse
{
    /**
     * @var null|ResponseInterface $response
     */
    protected $response;

    /**
     * Response constructor.
     * @param ResponseInterface|null $response
     */
    public function __construct(?ResponseInterface $response) {
        $this->setResponse($response);
    }

    /**
     * @return ResponseInterface|null
     */
    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }

    /**
     * @param ResponseInterface|null $response
     * @return Response
     */
    public function setResponse(?ResponseInterface $response): Response
    {
        $this->response = $response;

        return $this;
    }
}
