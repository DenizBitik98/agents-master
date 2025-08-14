<?php


namespace App\Services\KTJ\Provider\DCTS;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data\StationDataResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\Services\KTJ\KTJService;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;

/**
 * Class CashierService
 * @package App\Services\KTJ\Provider\DCTS
 */
class CashierService
{
    /**
     * @var null | KTJService
     */
    protected $KTJService = null;

    /**
     * @var null|string $dataUri
     */
    protected $dataUri;

    /** @var SerializerInterface */
    protected $serializer;

    /**
     * @inheritdoc
     * @throws GuzzleException
     */
    function dataAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->data($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->KTJService->refreshProviderCookies();

                    return $this->data($request);
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritdoc
     * @throws GuzzleException
     */
    function data(IRequest $request): ?IResponse
    {
        $psrResponse = $this->KTJService->getDctsClient()->request('post', $this->getDataUri(), [
            'cookies' => $this->getKTJService()->loadDCTSPCookies(),
            'body' => $this->getSerializer()->serialize($request, 'json')
        ]);

        $psrResponse->getBody()->rewind();

        /** @var StationDataResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            StationDataResponse::class,
            'json'
        );


        return $response;
    }

    /**
     * @return KTJService|null
     */
    public function getKTJService(): ?KTJService
    {
        return $this->KTJService;
    }

    /**
     * @param KTJService|null $KTJService
     */
    public function setKTJService(?KTJService $KTJService): void
    {
        $this->KTJService = $KTJService;
    }

    /**
     * @return string|null
     */
    public function getDataUri(): ?string
    {
        return $this->dataUri;
    }

    /**
     * @param string|null $dataUri
     */
    public function setDataUri(?string $dataUri): void
    {
        $this->dataUri = $dataUri;
    }

    /**
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * @param SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }


}
