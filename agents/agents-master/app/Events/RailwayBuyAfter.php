<?php

namespace App\Events;

use App\Models\Agent;
use App\ViewModels\Sale\Railway\Buy\BuyForm;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RailwayBuyAfter
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var null | BuyForm
     */
    protected $buyForm = null;
    /**
     * @var null | Agent
     */
    protected $agent = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(BuyForm $buyForm, Agent $agent)
    {
        $this->buyForm = $buyForm;
        $this->agent = $agent;
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

    /**
     * @return BuyForm|null
     */
    public function getBuyForm(): ?BuyForm
    {
        return $this->buyForm;
    }

    /**
     * @param BuyForm|null $buyForm
     */
    public function setBuyForm(?BuyForm $buyForm): void
    {
        $this->buyForm = $buyForm;
    }

    /**
     * @return Agent|null
     */
    public function getAgent(): ?Agent
    {
        return $this->agent;
    }

    /**
     * @param Agent|null $agent
     */
    public function setAgent(?Agent $agent): void
    {
        $this->agent = $agent;
    }
}
