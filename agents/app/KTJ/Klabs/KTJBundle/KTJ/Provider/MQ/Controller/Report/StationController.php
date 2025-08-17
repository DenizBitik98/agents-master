<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 12/6/18
 * Time: 4:55 PM
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report;

use AppBundle\DependencyInjection\EventDispatcherAware\EventDispatcherAwareTrait;
use GuzzleHttp\Exception\ClientException;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\SerializerAware\SerializerAwareTrait;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\Report\IStationController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data\StationDataResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\AfterRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;
use Symfony\Component\Intl\Exception\MethodNotImplementedException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class StationController
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Controller\Report
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
    const BEFORE_REPORT_STATION_SCHEDULE = 'ktj.mq.report.station.schedule.before';
    /**
     * Event occurs after making station schedule call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_REPORT_STATION_SCHEDULE = 'ktj.mq.report.station.schedule.after';
    /**
     * Event occurs after making station schedule result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_REPORT_STATION_SCHEDULE = 'ktj.mq.report.station.schedule.serialize';
    /**
     * Event occurs before making station data call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\BeforeRequestEvent")
     */
    const BEFORE_REPORT_STATION_DATA = 'ktj.mq.report.station.data.before';
    /**
     * Event occurs after making station data call
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const AFTER_REPORT_STATION_DATA = 'ktj.mq.report.station.data.after';
    /**
     * Event occurs after making station data result serialize
     * @Event("Klabs\KTJBundle\KTJ\Provider\DCTS\Event\AfterRequestEvent")
     */
    const SERIALIZE_REPORT_STATION_DATA = 'ktj.mq.report.station.data.serialize';

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
     */
    function scheduleAuthorized(IRequest $request): ?IResponse
    {
        throw new MethodNotImplementedException('scheduleAuthorized');
    }

    /**
     * @inheritdoc
     */
    function schedule(IRequest $request): ?IResponse
    {
        throw new MethodNotImplementedException('scheduleAuthorized');
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
        $this->eventDispatcher->dispatch(static::BEFORE_REPORT_STATION_DATA.$this->getProvider()->getQueueId(), new BeforeRequestEvent($this, $request));
        $psrResponse = $this->getProvider()->getHttpClient()->request('post', $this->getDataUri(), [
            'cookies' => $this->getProvider()->getMqCookies(),
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
