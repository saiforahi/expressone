<?php

namespace App\Listeners;

use App\Events\ShipmentMovementEvent;
use App\Models\ShipmentMovement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class ShipmentMovementListener
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
     * @param  \App\Events\ShipmentMovement  $event
     * @return void
     */
    public function handle(ShipmentMovementEvent $event)
    {
        //
        dd($event->shipment);
        $new_move=ShipmentMovement::create([
            'shipment_id'=>$event->shipment->id,
            'logistic_step_id'=> $event->logistic_step->id
        ]);
        $new_move->action_made_by()->associate($event->user);
    }
}
