<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 31.05.2018
 * Time: 6:57
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception;

use App\Services\Helpers\ArrayHelper;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ExceptionFactory
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Exception
 */
class ExceptionFactory
{
    /**
     * @return array
     */
    static function getExceptionStatusList()
    {
        return [
            1000002 => RemoteServerErrorException::class,
            1230001 => WorkSessionMustBeClosedException::class,
            1060005 => TerminalsSessionNotStartedException::class,
            1092040 => Ex2040Exception::class,
            1092021 => Ex2021Exception::class,
            1092016 => Ex2016InvalidTrain::class,
            1110010 => CarNotFoundException::class,
            1120002 => InvalidOrderInfoException::class,
            1130001 => InvalidSignatureException::class,
            1120032 => DiscountException::class,
            1120018 => AdultFirstException::class,
            1050004 => TicketReturnDateExpiredException::class,
            1120004 => InvalidOrderStatusException::class,
            1120014 => OrderIsNotOfCurrentCashierException::class,
            1120000 => OrderNotFoundException::class,
            1050000 => TicketNotFoundException::class,
            1090410 => Ex0410Exception::class,
            1092014 => Ex0410Exception::class,
            1180006 => PhoneMustBeKazakh::class,
            1380001 => TicketNotFoundException::class,
            1320004 => TicketNotFoundException::class,
            1120006 => OrderCanceledException::class,
            1092010 => InvalidDepartureDateException::class
        ];
    }

    /**
     * @param ResponseInterface $response
     *
     * @return DefaultException|null
     */
    static function buildExceptionClassFromResponse(ResponseInterface $response): ?DefaultException
    {
        if ($response->getStatusCode() == 404){
            return new NotFoundException();
        }
        $stream = $response->getBody();
        $stream->rewind();
        $content = $stream->getContents();
        $error = \GuzzleHttp\json_decode($content);
        $exceptionList = static::getExceptionStatusList();
        if (array_key_exists(0, $error)) {
            $errorCode = $error[0]->ServerStatus;
            $message = $error[0]->ErrorMessage;
        } else {
            $errorCode = $error->ServerStatus;
            $message = $error->ErrorMessage;
        }
        $exceptionClass = ArrayHelper::getValue($exceptionList, $errorCode, DefaultException::class);

        return new $exceptionClass(implode(", ", [
            $errorCode,
            $message
        ]), $errorCode);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return DefaultException
     */
    static function build(ResponseInterface $response): ?DefaultException
    {
        $response->getBody()->rewind();
        $content = $response->getBody()->getContents();
        $error = \GuzzleHttp\json_decode($content);
        $exceptionList = static::getExceptionStatusList();
        if (array_key_exists(0, $error)) {
            $errorCode = $error[0]->ServerStatus;
            $message = $error[0]->ErrorMessage;
        } else {
            $errorCode = $error->ServerStatus;
            $message = $error->ErrorMessage;
        }
        $exceptionClass = ArrayHelper::getValue($exceptionList, $errorCode, DefaultException::class);
        throw new $exceptionClass(implode(", ", [
            $errorCode,
            $message
        ]), $errorCode);
    }
}
