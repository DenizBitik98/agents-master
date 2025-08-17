<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmItem;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmItem
 */
class Response implements IResponse
{
    /**
     * @var null|ResponseInterface $response
     */
    protected $response;

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
