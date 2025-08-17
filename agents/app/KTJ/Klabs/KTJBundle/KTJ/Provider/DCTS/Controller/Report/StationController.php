<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 14:54
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IStationController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data\StationDataResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Schedule\StationScheduleResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Provider;

/**
 * Class StationController
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Report
 * @method Provider getProvider
 */
class StationController implements IStationController
{
    use EventDispatcherAwareTrait;
    use TProviderAware;
    use SerializerAwareTrait;

    /**
     * Event occurs before making station schedule call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_REPORT_STATION_SCHEDULE = 'ktj.dcts.report.station.schedule.before';
    /**
     * Event occurs after making station schedule call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_REPORT_STATION_SCHEDULE = 'ktj.dcts.report.station.schedule.after';
    /**
     * Event occurs after making station schedule result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_REPORT_STATION_SCHEDULE = 'ktj.dcts.report.station.schedule.serialize';
    /**
     * Event occurs before making station data call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_REPORT_STATION_DATA = 'ktj.dcts.report.station.data.before';
    /**
     * Event occurs after making station data call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_REPORT_STATION_DATA = 'ktj.dcts.report.station.data.after';
    /**
     * Event occurs after making station data result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_REPORT_STATION_DATA = 'ktj.dcts.report.station.data.serialize';

    /**
     * @var null|string $scheduleUri
     */
    protected $scheduleUri;
    /**
     * @var null|string $dataUri
     */
    protected $dataUri;

    /**
     * @inheritdoc
     * @throws GuzzleException
     */
    function scheduleAuthorized(IRequest $request): ?IResponse
    {
        try {
            return $this->schedule($request);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

                    return $this->schedule($request);
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritdoc
     * @throws GuzzleException
     */
    function schedule(IRequest $request): ?IResponse
    {
        $this->eventDispatcher->dispatch(static::BEFORE_REPORT_STATION_SCHEDULE, new BeforeRequestEvent($this, $request));
        $psrResponse = $this->getProvider()->getHttpClient()->request('post', $this->getScheduleUri(), [
            'cookies' => $this->getProvider()->getDctsCookies(),
            'body' => $this->getSerializer()->serialize($request, 'json')
        ]);
        $this->eventDispatcher->dispatch(static::AFTER_REPORT_STATION_SCHEDULE, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        /** @var StationScheduleResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            StationScheduleResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_REPORT_STATION_SCHEDULE, new AfterRequestEvent($request, $response, $psrResponse));

        return $response;
    }

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
                    $this->getProvider()->getAuthController()->refreshProviderCookies();

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
        $this->eventDispatcher->dispatch(static::BEFORE_REPORT_STATION_DATA, new BeforeRequestEvent($this, $request));
        $psrResponse = $this->getProvider()->getHttpClient()->request('post', $this->getDataUri(), [
            'cookies' => $this->getProvider()->getDctsCookies(),
            'body' => $this->getSerializer()->serialize($request, 'json')
        ]);
        $this->eventDispatcher->dispatch(static::AFTER_REPORT_STATION_DATA, new AfterRequestEvent($request, null, $psrResponse));
        $psrResponse->getBody()->rewind();
        /** @var StationDataResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            StationDataResponse::class,
            'json'
        );
        $this->eventDispatcher->dispatch(static::SERIALIZE_REPORT_STATION_DATA, new AfterRequestEvent($request, $response, $psrResponse));

        return $response;
    }

    /**
     * @param null|string $dataUri
     * @return StationController
     */
    public function setDataUri(?string $dataUri): StationController
    {
        $this->dataUri = $dataUri;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDataUri(): ?string
    {
        return $this->dataUri;
    }

    /**
     * @param null|string $scheduleUri
     *
     * @return StationController
     */
    public function setScheduleUri(?string $scheduleUri): StationController
    {
        $this->scheduleUri = $scheduleUri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getScheduleUri(): ?string
    {
        return $this->scheduleUri;
    }
}
