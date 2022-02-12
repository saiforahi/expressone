<form class="form-horizontal" method="post" action="/admin/save-delivery-payment">@csrf

    @foreach ($shipments as $shipment)
        {{-- @php
        $check = \App\Models\ShipmentPayment::where('shipment_id',$shipment->id);
    @endphp --}}
        {{-- @if ($check->count() < 1)
        <div class="form-group">
            <label class="control-label col-sm-5">To: {{$shipment->merchant->first_name.' '.$shipment->merchant->last_name}} <br><small>{{$shipment->pickup_location->name}}</small></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="amount[]" placeholder="Amount" required>
            </div>
        </div>
        <input type="hidden" name="shipment_ids[]" value="{{$shipment->id}}">
    @else
        <div class="form-group">
            <label class="control-label col-sm-5"><i class="fa fa-check text-success"></i> {{$shipment->merchant->first_name.' '.$shipment->merchant->last_name}} <br><small>{{$shipment->pickup_location->name}}</small></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" placeholder="{{$check->first()->cod_amount - $check->first()->delivery_charge}}" readonly>
            </div>
        </div>
    @endif --}}
        <div class="form-group">
            <label class="control-label col-sm-5">To:
                {{ $shipment->merchant->first_name . ' ' . $shipment->merchant->last_name }}
                <br><small>{{ $shipment->pickup_location->name }}</small></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" value="{{payable_amount($shipment)}}" name="amount[]" placeholder="Amount" required>
            </div>
        </div>
        <input type="hidden" name="shipment_ids[]" value="{{ $shipment->id }}">
    @endforeach
    @if(count($shipments)>0)
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-7 text-right">
            <button type="submit" class="btn btn-success">Submit payments</button>
        </div>
    </div>
    @else
    No payment applicable shipment
    @endif


</form>
