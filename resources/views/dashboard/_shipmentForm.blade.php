@csrf
<div class="main-card mb-3 card card-body">
    <input type="hidden" name="invoice_id" value="{{ $shipment->invoice_id }}">
    <input type="hidden" name="tracking_code" value="{{ $shipment->tracking_code }}">
    <h5 class="card-title">Recipient Details:</h5>

    {{-- Add recipient --}}
    <div class="form-row">
        <div class="col text-left">
            <label class="" for="name">Customer Informations</label> <span class="text-danger">*</span>
            <input type="text" class="form-control" name="name" placeholder="Name" required
                value="{{ @old('recipient', $shipment->recipient['name']) }}">
            <input type="text" class="form-control" name="phone" placeholder="01744 XXXXXX" required
                value="{{ @old('recipient', $shipment['recipient']['phone']) }}">
            <input type="text" class="form-control" name="address" placeholder="Address" required
                value="{{ @old('recipient', $shipment['recipient']['address']) }}">
        </div>
    </div>
</div>
{{-- Customer Details --}}
<div class="main-card mb-3 card card-body">
    <h5 class="card-title">Shipment Details:</h5>
    <div class="form-row">
        <div class="col-md-4 text-left">
            <label>Pickup Location</label> <span class="text-danger">*</span>
            <select class="form-control" name="pickup_location_id">
                <option>Select location</option>
                @foreach ($locations as $loc)
                    <option @if ($shipment->pickup_location_id == $loc->id)
                        selected
                    @else
                        ''
                        @endif value="{{ $loc->id }}">{{ $loc->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 text-left">
            <label>Shipping Type</label> <span class="text-danger">*</span>
            <select class="form-control" name="shipping_charge_id">
                <option>Select type</option>
                @foreach ($shippingCharges as $charge)
                    <option @if ($shipment->shipping_charge_id == $charge->id)
                        selected
                    @else
                        ''
                        @endif value="{{ $charge->id }}">{{ $charge->consignment_type }}</option>

                @endforeach

            </select>

        </div>
        <div class="col-md-4 text-left">
            <label>Weight</label>
            <input type="number" name="weight" placeholder="Enter weight" class="form-control"
                value="{{ @old('weight', $shipment['weight']) }}">
        </div>
        <div class="col-md-4 text-left">
            <label>Amount</label>
            <input type="number" name="amount" placeholder="Enter amount" class="form-control" min="10"
                value="{{ @old('amount', $shipment['amount']) }}">
        </div>
        <div class="col-md-4 text-left">
            <label>Note</label>
            <input type="text" name="note" placeholder="Enter note" class="form-control"
                value="{{ @old('note', $shipment->note) }}">
        </div>
    </div>
</div>
<div class="col text-right">
    <button type="submit" id="submit_button" class="btn btn-success rounded my-4">
        <i class="fa fa-check"></i> {{ $buttonText }}
    </button>
</div>
