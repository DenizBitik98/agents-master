<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareInterface;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message\Error;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Message\ErrorData;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\DefaultException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\ExpressNegativeResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\FreeSeatsWaitListRequesting;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\InvalidExpressTransactionException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\InvalidFormat;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\InvalidWaitListStatusException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\NoCarTypeException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\NonFinalizedExpressRequestFound;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\NotFinishedWorkFlowException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\NoTrainException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\OfdFiscalizationErrorException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\SeatReserveNotFoundException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\TerminalWorkSessionNotClosed;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\TerminalWorkSessionNotStarted;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\WaitList\DiscountCardEndPromotionDateExpired;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\WaitList\DiscountCardKidTariffBirthdayDoesNotMatch;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\WaitList\DiscountCardKidTariffBirthdayLimit;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\WaitList\InvalidDiscountCardNumber;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\WaitList\WaitlistItemPassengerDiscountCardBlackListed;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\WaitList\WaitlistItemPassengerDiscountCardTicketSaleExists;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Exception\Exceptions\WaitlistItemNotFound;
use Psr\Http\Message\ResponseInterface;
use TicketBundle\Helpers\ArrayHelper;

/**
 * Class ExceptionFactory
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Exception
 */
class ExceptionFactory implements SerializerAwareInterface
{
    use SerializerAwareTrait;

    /**
     * @return array
     */
    function getExceptionStatusList()
    {
        return [
            '1300000' => ExpressNegativeResponse::class,
            '1300001' => NonFinalizedExpressRequestFound::class,
            '1500000' => WaitlistItemNotFound::class,
            '1500004' => FreeSeatsWaitListRequesting::class,
            '1500002' => InvalidWaitListStatusException::class,
            '1300005' => InvalidExpressTransactionException::class,
            '1300006' => NotFinishedWorkFlowException::class,
            '1060005' => TerminalWorkSessionNotStarted::class,
            '1500202' => NoTrainException::class,
            '1500203' => NoCarTypeException::class,
            '1180006' => InvalidFormat::class,
            '1500100' => FreeSeatsWaitListRequesting::class,
            '1230001' => TerminalWorkSessionNotClosed::class,
            '5000001' => SeatReserveNotFoundException::class,
            '1330011' => InvalidDiscountCardNumber::class,
            '1330012' => DiscountCardEndPromotionDateExpired::class,
            '1330013' => DiscountCardKidTariffBirthdayLimit::class,
            '1330014' => DiscountCardKidTariffBirthdayDoesNotMatch::class,
            '1500006' => WaitlistItemPassengerDiscountCardBlackListed::class,
            '1500007' => WaitlistItemPassengerDiscountCardTicketSaleExists::class,
            '1130006' => OfdFiscalizationErrorException::class,
        ];
    }

    /**
     * @param ResponseInterface $response
     *
     * @return Error|null
     */
    function getErrorClass(ResponseInterface $response): ?Error
    {
        $stream = $response->getBody();
        $stream->rewind();
        $content = $stream->getContents();
        /** @var null|ErrorData[] $errors */
        $errors = $this->getSerializer()->deserialize($content, 'array<' . ErrorData::class . '>', 'json');
        $error = new Error();
        $error->setErrors(new ArrayCollection($errors));

        return $error;
    }

    /**
     * @param Error $error
     * @return Collection|DefaultException[]|null
     */
    function buildExceptionClasses(Error $error): ?Collection
    {
        $errors = [];
        foreach ($error->getErrors() as $errorData) {
            if (array_key_exists($errorData->getServerStatus(), $this->getExceptionStatusList())) {
                $exceptionClass = $this->getExceptionStatusList()[$errorData->getServerStatus()];
                /** @var null|DefaultException $exception */
                $exception = new $exceptionClass;
                $exception->setError($errorData);
                $exception->setCode($errorData->getServerStatus());
                if (null !== $errorData->getErrorMessage() && strlen($errorData->getErrorMessage())) {
                    $exception->setMessage($errorData->getErrorMessage());
                }
                if (null !== $errorData->getCustomErrorData()
                    && null !== $errorData->getCustomErrorData()->getMessage()
                    && strlen($errorData->getCustomErrorData()->getMessage()))
                {
                    $exception->setMessage($errorData->getCustomErrorData()->getMessage());
                }
                $errors[] = $exception;
            } else {
                $exception = new DefaultException(
                    $errorData->getErrorMessage(),
                    $errorData->getServerStatus()
                );
                $errors[] = $exception;
            }
        }

        return new ArrayCollection($errors);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return DefaultException
     */
    function build(ResponseInterface $response): ?DefaultException
    {
        $response->getBody()->rewind();
        $content = $response->getBody()->getContents();
        $error = \GuzzleHttp\json_decode($content);
        $exceptionList = $this->getExceptionStatusList();
        if (array_key_exists(0, $error)) {
            $errorCode = $error[0]->ServerStatus;
            $message = $error[0]->ErrorMessage;
        } else {
            $errorCode = $error->ServerStatus;
            $message = $error->ErrorMessage;
        }
        $exceptionClass = ArrayHelper::getValue($exceptionList, $errorCode, DefaultException::class);
        throw new $exceptionClass(
            implode(
                ", ",
                [
                    $errorCode,
                    $message,
                ]
            ), $errorCode
        );
    }
}
