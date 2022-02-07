@foreach($shipments as $key=>$shipment)
<div class="row" style="background: #f3f3f3;margin-bottom: 1em; padding: 5px;">
	<div class="col-md-8">
		<b>Invoice ID:</b> {{$shipment->invoice_id}} <br>
		<b>Pickup Location:</b> {{$shipment->pickup_location->name}} <br>
		Parcel count: <b>{{ COUNT(explode(',',$shipment->parcel_qty))}}</b>
	</div>
	<div class="col-md-4">
		<button class="btn btn-xs btn-default form-control" onclick="dispatch_shipments(<?php echo $shipment->id;?>)">Parcels</button>

		<button class="btn btn-xs btn-success form-control mts{{$shipment->id}}" onclick="changeBoxStatus(<?php echo $shipment->id;?>)">Move <i class="fa fa-long-arrow-right"></i></button>
	</div>
</div>
@endforeach

@if($boxes->count() <1)<p class="alert alert-default text-center text-danger">No data available</p>@endif
