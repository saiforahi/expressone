<div class="row">
    <div class="col-md-6">
        <label class="" for="name">Customer Name</label>
        <input type="text" id="name" class="form-control" name="name" required placeholder="Customer Name">
    </div>
    <div class="col-md-6">
        <label for="usr3">Phone Number</label>
        <input type="text" class="form-control" name="phone" required placeholder="Phone Number">
    </div>
</div>
<div class="row my-4">
    <div class="col-md-12">
        <label class="" for="address">Address</label>
        <input type="text" id="address" class="form-control" name="address" required placeholder="Address">
    </div>
</div>
<div class="row my-4">
    <div class="col-md-6 text-left">
        <label for="area">Location</label>
        <?php
        $area = \DB::table('locations')
            ->select('id', 'name', 'point_id')
            ->get();
        ?>
        <select class="form-control select2" style="width:100%; height:35px;" name="pickup_location_id"
            id="pickup_location_id" required>
            <option value="" selected disabled>Select area</option>
            @foreach ($area as $areas)
                <option value="{{ $areas->id }}">{{ $areas->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<h5 class="card-title mt-4">Shipment Details:</h5>
<div class="row my-4">
    <div class="col-md-4 text-left">
        <label class="" for="weight">Weight</label>
        <input type="text" id="weight" class="form-control" name="weight" placeholder="Weight">
    </div>
    <div class="col-md-4 cod_target text-left">
        <label for="parcel_value">Declared Parcel Value</label>
        <input type="number" id="amount" class="form-control" name="amount" placeholder="Amount">
    </div>
</div>
<div class="row my-4">
    <div class="col-md-12 text-left">
        <label for="merchant_note">Merchant Note</label>
        <textarea id="note" class="form-control" rows="3" name="note"></textarea>
    </div>
</div>
<div class="row"> <br>
    <label class="col-md-3">Delivery Type:</label>
    <div class="col-md-4">
        @php
            $deliveryType = \DB::table('shipping_charges')->get();
        @endphp
        @foreach ($deliveryType as $delivary_charge)
            <label class="radio-inline"><input type="radio" value="{{ $delivary_charge->id }}"
                    name="shipping_charge_id">{{ $delivary_charge->consignment_type }}</label>
        @endforeach
    </div>
</div>
