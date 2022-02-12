<?php

namespace App\Listeners;

use App\Events\ShipmentMovementEvent;
use App\Models\ShipmentMovement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ShipmentMovementEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ShipmentMovementEvent  $event
     * @return void
     */
    public function handle(ShipmentMovementEvent $event)
    {
        //
        $move = ShipmentMovement::create(
            ['shipment_id'=>$event->shipment->id, 'logistic_step_id'=> $event->logistic_step->id],['note'=>$event->note]
            // ['price' => 99, 'discounted' => 1]
        );
        $move->action_made_by()->associate($event->user);
        $move->save();
    }
}
