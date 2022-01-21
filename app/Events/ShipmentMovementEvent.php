<?php

namespace App\Events;

use App\Models\LogisticStep;
use App\Models\Shipment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ShipmentMovementEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $shipment;
    public $logistic_step;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Shipment $shipment, LogisticStep $step)
    {
        $this->shipment = $shipment;
        $this->logistic_step = $step;
        //
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
