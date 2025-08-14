<?php


namespace App\Services\KTJ\Provider\DCTS;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Fail\ApplyFailRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Fail\ApplyFailResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\ApplySuccessRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\ApplySuccessResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnTicketRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnTicketResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\StatusRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\StatusResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn\TicketReturnRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn\TicketReturnResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\TerminalsSessionNotStartedException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\WorkSessionMustBeClosedException;
use App\Services\KTJ\Provider\DCTS\Aware\KTJServiceTrait;
use App\Services\KTJ\Provider\DCTS\Aware\SerializerTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class ReturnETicketService
{
    use KTJServiceTrait;

    use SerializerTrait;

    /**
     * @var null|string $orderUri
     */
    protected $orderUri;

    /**
     * @var null|string $ticketInfoUri
     */
    protected $ticketInfoUri;
    /**
     * @var null|string $returnUri
     */
    protected $returnTicketUri;

    /**
     * @var null|string $statusUri
     */
    protected $statusUri;
    /**
     * @var null|string $successUri
     */
    protected $successUri;
    /**
     * @var null|string $failUri
     */
    protected $failUri;

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function ticketInformationAuthorized( IRequest $request ): ?IResponse {
        try
        {
            return $this->ticketInformation( $request );
        }
        catch ( ClientException $exception )
        {
            switch ( $exception->getCode() )
            {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->ticketInformationAuthorized( $request );
                    break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
                    if ($dctsException instanceof WorkSessionMustBeClosedException) {
                        $this->getKTJService()->getLoginService()->closeAuthorized();

                        return $this->ticketInformationAuthorized($request);
                    }
                    if ($dctsException instanceof TerminalsSessionNotStartedException) {
                        $this->getKTJService()->getLoginService()->openAuthorized();

                        return $this->ticketInformationAuthorized($request);
                    }
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @var ReturnTicketRequest $request
     * @throws GuzzleException
     */
    function ticketInformation( IRequest $request ): ?IResponse {

        $psrResponse = $this->getKTJService()->getDctsClient()->request( 'get', $this->ticketInfoUri, [
            'cookies' => $this->getKTJService()->loadDCTSPCookies(),
            'query'   => [
                'orderId'  => $request->getOrderId(),
                'ticketId' => $request->getTicketId(),
            ]
        ] );

        $psrResponse->getBody()->rewind();
        /** @var ReturnTicketResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            ReturnTicketResponse::class,
            'json'
        );

        return $response;
    }


    /**
     * @param IRequest $request
     * @return IResponse|null
     * @throws GuzzleException
     */
    function returnTicketAuthorized( IRequest $request ): ?IResponse {
        try
        {
            return $this->returnTicket( $request );
        }
        catch ( ClientException $exception )
        {
            switch ( $exception->getCode() )
            {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->returnTicketAuthorized( $request );
                    break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse( $exception->getResponse() );
                    if ( $dctsException instanceof WorkSessionMustBeClosedException )
                    {
                        $this->getKTJService()->getLoginService()->closeAuthorized();

                        return $this->returnTicketAuthorized( $request );
                    }
                    if ( $dctsException instanceof TerminalsSessionNotStartedException )
                    {
                        $this->getKTJService()->getLoginService()->openAuthorized();

                        return $this->returnTicketAuthorized( $request );
                    }
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @var TicketReturnRequest $request
     * @throws GuzzleException
     */
    function returnTicket( IRequest $request ): ?IResponse {

        $psrResponse = $this->getKTJService()->getDctsClient()->request( 'post', $this->returnTicketUri, [
            'cookies' => $this->getKTJService()->loadDCTSPCookies(),
            'query'   => [
                'orderId'  => $request->getOrderId(),
                'ticketId' => $request->getTicketId(),
            ]
        ] );

        $psrResponse->getBody()->rewind();
        /** @var TicketReturnResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            TicketReturnResponse::class,
            'json'
        );


        return $response;
    }

    /**
     * @inheritDoc
     * @var StatusRequest $request
     * @throws GuzzleException
     */
    function statusAuthorized( IRequest $request ): ?IResponse {
        try
        {
            return $this->status( $request );
        }
        catch ( ClientException $exception )
        {
            switch ( $exception->getCode() )
            {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->statusAuthorized( $request );
                    break;
                case 400:
                    $dctsException = ExceptionFactory::buildExceptionClassFromResponse( $exception->getResponse() );
                    if ( $dctsException instanceof WorkSessionMustBeClosedException )
                    {
                        $this->getKTJService()->getLoginService()->closeAuthorized();

                        return $this->statusAuthorized( $request );
                    }
                    if ( $dctsException instanceof TerminalsSessionNotStartedException )
                    {
                        $this->getKTJService()->getLoginService()->openAuthorized();

                        return $this->statusAuthorized( $request );
                    }
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @var StatusRequest $request
     * @throws GuzzleException
     */
    function status( IRequest $request ): ?IResponse {

        $psrResponse = $this->getKTJService()->getDctsClient()->request( 'post', $this->statusUri, [
            'cookies' => $this->getKTJService()->loadDCTSPCookies(),
            'body'    => $this->getSerializer()->serialize( $request, 'json' )
        ] );

        $psrResponse->getBody()->rewind();
        /** @var StatusResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            StatusResponse::class,
            'json'
        );

        return $response;
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function applySuccessAuthorized( IRequest $request ): ?IResponse {
        try
        {
            return $this->applySuccess( $request );
        }
        catch ( ClientException $exception )
        {
            switch ( $exception->getCode() )
            {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->applySuccessAuthorized( $request );
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @var ApplySuccessRequest $request
     * @throws GuzzleException
     */
    function applySuccess( IRequest $request ): ?IResponse {

        $psrResponse = $this->getKTJService()->getDctsClient()->request( 'post', $this->successUri, [
            'cookies' => $this->getKTJService()->loadDCTSPCookies(),
            'body'    => $this->getSerializer()->serialize( $request, 'json' ),
        ] );

        $psrResponse->getBody()->rewind();
        $response = new ApplySuccessResponse();

        return $response;
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function applyFailAuthorized( IRequest $request ): ?IResponse {
        try
        {
            return $this->applyFail( $request );
        }
        catch ( ClientException $exception )
        {
            switch ( $exception->getCode() )
            {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->applyFailAuthorized( $request );
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @var ApplyFailRequest $request
     * @throws GuzzleException
     */
    function applyFail( IRequest $request ): ?IResponse {
        $psrResponse = $this->getKTJService()->getDctsClient()->request( 'post', $this->failUri, [
            'cookies' => $this->getKTJService()->loadDCTSPCookies(),
            'body'    => $this->getSerializer()->serialize( $request, 'json' ),
        ] );

        $psrResponse->getBody()->rewind();
        /** @var ApplyFailResponse $response */
        $response = new ApplyFailResponse();

        /*$response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            ApplyFailResponse::class,
            'json'
        );*/

        return $response;
    }


    /**
     * @return string|null
     */
    public function getOrderUri(): ?string
    {
        return $this->orderUri;
    }

    /**
     * @param string|null $orderUri
     */
    public function setOrderUri(?string $orderUri): void
    {
        $this->orderUri = $orderUri;
    }

    /**
     * @return string|null
     */
    public function getTicketInfoUri(): ?string
    {
        return $this->ticketInfoUri;
    }

    /**
     * @param string|null $ticketInfoUri
     */
    public function setTicketInfoUri(?string $ticketInfoUri): void
    {
        $this->ticketInfoUri = $ticketInfoUri;
    }

    /**
     * @return string|null
     */
    public function getStatusUri(): ?string
    {
        return $this->statusUri;
    }

    /**
     * @param string|null $statusUri
     */
    public function setStatusUri(?string $statusUri): void
    {
        $this->statusUri = $statusUri;
    }

    /**
     * @return string|null
     */
    public function getSuccessUri(): ?string
    {
        return $this->successUri;
    }

    /**
     * @param string|null $successUri
     */
    public function setSuccessUri(?string $successUri): void
    {
        $this->successUri = $successUri;
    }

    /**
     * @return string|null
     */
    public function getFailUri(): ?string
    {
        return $this->failUri;
    }

    /**
     * @param string|null $failUri
     */
    public function setFailUri(?string $failUri): void
    {
        $this->failUri = $failUri;
    }

    /**
     * @return string|null
     */
    public function getReturnTicketUri(): ?string
    {
        return $this->returnTicketUri;
    }

    /**
     * @param string|null $returnTicketUri
     */
    public function setReturnTicketUri(?string $returnTicketUri): void
    {
        $this->returnTicketUri = $returnTicketUri;
    }
}
