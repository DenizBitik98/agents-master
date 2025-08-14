<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Common;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface IErrorHandler
 * @package Klabs\KTJBundle\KTJ\Common
 */
interface IErrorHandler
{
    /**
     * Handle provider exception
     * @param ResponseInterface $response
     * @param null|IRequest $request
     * @return bool Whether controller can send resend request
     */
    function handle(ResponseInterface $response, IRequest $request = null): ?bool;
}
