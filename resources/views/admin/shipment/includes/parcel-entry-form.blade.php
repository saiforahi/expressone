<div class="row">
    <div class="col-md-6">
        <label class="" for="name">Customer Name</label>
        <input type="text" id="name" class="form-control" name="name" required>
    </div>
    <div class="col-md-6">
        <label for="usr3">Phone Number</label>
        <input type="text" class="form-control" name="phone" required>
    </div>
</div>
<div class="row my-4">
    <div class="col-md-12">
        <label class="" for="address">Address</label>
        <input type="text" id="address" class="form-control" name="address" required>
    </div>
</div>
<h4 class="card-title mt-4">Shipment Details:</h4>
<div class="row my-4">
    
    <div class="col-md-4">
        <label>Delivery Type:</label>
        <select class="form-control" name="shipping_charge_id">
            <option>Select type</option>
            <option value="express">Express</option>
            <option value="priority">Priority</option>
        </select>
    </div>
</div>
<h4 class="card-title mt-4">Payment Details:</h4>
<div class="row my-4">
    <div class="col-md-4 text-left">
        <label class="" for="weight">COD Amount</label>
        <input type="number" id="cod_amount" class="form-control" name="cod_amount" value="1">

    </div>
    <div class="col-md-4 text-left">
        <label class="" for="weight">Weight Charge</label>
        <input type="number" id="weight" class="form-control" name="weight" value="1">

    </div>
    <div class="col-md-4 cod_target text-left">
        <label for="parcel_value">Delivery Charge</label>
        <input type="number" id="deliver_charge" class="form-control" name="deliver_charge" value="0">
    </div>
</div>
<div class="row my-4">
    <div class="col-md-12 text-left">
        <label for="merchant_note">Merchant Note</label>
        <textarea id="merchant_note" class="form-control" rows="3" name="merchant_note"></textarea>
    </div>
</div>
<div class="row"> <br>
    
</div>
