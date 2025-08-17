<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\ViewModels\Sale\Railway\Train\SearchModel;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\TrainSearchResponse;

class RouteSearchAfter
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * @var null | SearchModel
     */
    protected $searchModel = null;

    /**
     * @var null | TrainSearchResponse
     */
    protected $trainSearchResponse = null;

    /**
     * RouteSearchAfter constructor.
     * @param SearchModel|null $searchModel
     * @param TrainSearchResponse $trainSearchResponse
     */
    public function __construct(?SearchModel $searchModel, TrainSearchResponse $trainSearchResponse)
    {
        $this->searchModel = $searchModel;
        $this->trainSearchResponse = $trainSearchResponse;
    }

    /**
     * @return SearchModel|null
     */
    public function getSearchModel(): ?SearchModel
    {
        return $this->searchModel;
    }

    /**
     * @param SearchModel|null $searchModel
     */
    public function setSearchModel(?SearchModel $searchModel): void
    {
        $this->searchModel = $searchModel;
    }

    /**
     * @return TrainSearchResponse|null
     */
    public function getTrainSearchResponse(): ?TrainSearchResponse
    {
        return $this->trainSearchResponse;
    }

    /**
     * @param TrainSearchResponse|null $trainSearchResponse
     */
    public function setTrainSearchResponse(?TrainSearchResponse $trainSearchResponse): void
    {
        $this->trainSearchResponse = $trainSearchResponse;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
