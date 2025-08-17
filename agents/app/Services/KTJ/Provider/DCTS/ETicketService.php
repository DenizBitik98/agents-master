<?php


namespace App\Services\KTJ\Provider\DCTS;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\ConfirmResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ReserveResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature\PaymentSignatureResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\DefaultException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\TerminalsSessionNotStartedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\WorkSessionMustBeClosedException;
use App\Services\KTJ\KTJService;
use App\Services\KTJ\Provider\DCTS\Aware\KTJServiceTrait;
use App\Services\KTJ\Provider\DCTS\Aware\SerializerTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use JMS\Serializer\SerializerInterface;

class ETicketService
{
    use KTJServiceTrait;

    use SerializerTrait;

    /**
     * @var null|string $reserveUri
     */
    protected $reserveUri;
    /**
     * @var null|string $reserveUri
     */
    protected $confirmUri;
    /**
     * @var null|string $signatureUrl
     */
    protected $signatureUrl;

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     * @throws GuzzleException
     * @throws DefaultException
     */
    function reservationReserveAuthorized(IRequest $request): ?IResponse
    {
        try {
            //$this->getKTJService()->refreshProviderCookies();
            return $this->reservationReserve($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->reservationReserveAuthorized($request);
                    break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
                    if ($dctsException instanceof WorkSessionMustBeClosedException) {
                        $this->getKTJService()->getLoginService()->closeAuthorized();

                        return $this->reservationReserveAuthorized($request);
                    }
                    if ($dctsException instanceof TerminalsSessionNotStartedException) {
                        $this->getKTJService()->getLoginService()->openAuthorized();

                        return $this->reservationReserveAuthorized($request);
                    }
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     * @throws GuzzleException
     */
    function reservationReserve(IRequest $request): ?IResponse
    {
        $psrResponse = $this->getKTJService()->getDctsClient()->request(
            'post',
            $this->reserveUri,
            [
                'cookies' => $this->getKTJService()->loadDCTSPCookies(),
                'body' => $this->getSerializer()->serialize($request, 'json'),
            ]
        );

        $psrResponse->getBody()->rewind();

        /** @var ReserveResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            ReserveResponse::class,
            'json'
        );

        return $response;
    }


    /**
     * @param IRequest $request
     * @return IResponse|null
     * @throws GuzzleException
     */
    function reservationConfirmAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->reservationConfirm($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->reservationConfirmAuthorized($request);
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @param IRequest $request
     * @return IResponse|null
     */
    function reservationConfirm(IRequest $request): ?IResponse
    {
        $psrResponse = $this->getKTJService()->getDctsClient()->request(
            'post',
            $this->confirmUri,
            [
                'cookies' => $this->getKTJService()->loadDCTSPCookies(),
                'body' => $this->getSerializer()->serialize($request, 'json'),
            ]
        );

        $psrResponse->getBody()->rewind();
        /** @var ConfirmResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            ConfirmResponse::class,
            'json'
        );

        return $response;
    }

    /**
     * @param IRequest $request
     * @return IResponse|null
     * @throws GuzzleException
     */
    function getSignatureAuthorized( IRequest $request ): ?IResponse {
        try
        {
            return $this->getSignature( $request );
        }
        catch ( ClientException $exception )
        {
            switch ( $exception->getCode() )
            {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->getSignature( $request );
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @param IRequest $request
     * @return IResponse|null
     * @throws GuzzleException
     */
    function getSignature( IRequest $request ): ?IResponse {

        $psrResponse = $this->getKTJService()->getDctsClient()->request( 'post', $this->signatureUrl, [
            'cookies' => $this->getKTJService()->loadDCTSPCookies(),
            'body'    => $this->getSerializer()->serialize( $request, 'json' )
        ] );

        $psrResponse->getBody()->rewind();
        /**
         * @var $response PaymentSignatureResponse
         */
        $response = new PaymentSignatureResponse(
            $psrResponse->getBody()->getContents()
        );

        return $response;
    }

    /**
     * @return string|null
     */
    public function getReserveUri(): ?string
    {
        return $this->reserveUri;
    }

    /**
     * @param string|null $reserveUri
     */
    public function setReserveUri(?string $reserveUri): void
    {
        $this->reserveUri = $reserveUri;
    }

    /**
     * @return string|null
     */
    public function getConfirmUri(): ?string
    {
        return $this->confirmUri;
    }

    /**
     * @param string|null $confirmUri
     */
    public function setConfirmUri(?string $confirmUri): void
    {
        $this->confirmUri = $confirmUri;
    }

    /**
     * @return string|null
     */
    public function getSignatureUrl(): ?string
    {
        return $this->signatureUrl;
    }

    /**
     * @param string|null $signatureUrl
     */
    public function setSignatureUrl(?string $signatureUrl): void
    {
        $this->signatureUrl = $signatureUrl;
    }
}
