@extends('dashboard.layout.app')
@section('pageTitle', 'Edit Shipment')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-location-arrow text-success" aria-hidden="true"></i>
                </div>
                <div>{{ $title }}
                    <div class="page-title-subheading">Fill in your details to prepare the shipment label
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $error }}
                </div>
            @endforeach
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card card-body">
                <form id="upload_form" action="{{ route('updateShipment',$shipment->id) }}" method="post">
                    {{ csrf_field() }}
                    <h5 class="card-title">Customer Details:</h5>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="" for="name">Customer Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Customer Name" value="{{ $shipment->name }}">
                        </div>
                        <div class="col text-left">
                            <label for="usr3">Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Customer phone" value="{{ $shipment->phone }}">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="" for="address">Address</label>
                            <input type="text" id="address" class="form-control" name="address"
                                placeholder="Customer Address" value="{{ $shipment->address }}">
                        </div>

                    </div>

                    <h5 class="card-title mt-4">Shipment Details:</h5>
                    <div class="form-row my-4">
                        @if ($shipment->weight_charge !== null )
                        <div class="col text-left">
                            <label class="" for="weight">Weight charge</label>
                            <input type="number" id="weight_charge" class="form-control" name="weight_charge" value="{{ $shipment->weight_charge }}">

                        </div>
                        @endif
                        <div class="col text-left">
                            <label for="cod_amount">COD Amount</label>
                            <input type="number" id="cod_amount" class="form-control" name="cod_amount" value="{{ $shipment->cod_amount }}">

                        </div>
                        <div class="col cod_target text-left">
                            <label for="parcel_value">Declared Parcel Value</label>
                            <input type="number" id="parcel_value" class="form-control" name="parcel_value"
                                placeholder="Enter Parcel Value" value="{{ $shipment->parcel_value }}">
                            <div class="w-100">
                                <small>My parcel value is <span class="parcel_value_info">{{ $shipment->parcel_value }}</span> Taka</small>
                            </div>
                        </div>

                        <div class="col text-left">
                            <label for="invoice_id"> <strong>Ref. No</strong></label>
                            <input type="text" id="invoice_id" class="form-control" name="invoice_id"
                                value="{{ $shipment->invoice_id }}" readonly>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label for="merchant_note">Merchant Note</label>
                            <textarea id="merchant_note" class="form-control" rows="3" name="merchant_note"> {{ $shipment->merchant_note }} </textarea>
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label for="usr3">How do you want to arrange for shipment?</label><br>
                            <label for="merchant_note">Service Type: &nbsp; &nbsp; &nbsp; </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" checked name="delivery_type" id="inlineRadio1"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio1">Regular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="delivery_type" id="inlineRadio2"
                                    value="2" disabled>
                                <label class="form-check-label" for="inlineRadio2">Express</label>
                            </div>
                        </div>
                        <div class="col text-right">
                            <button type="submit" id="submit_button" class="btn btn-success rounded my-4"> <i
                                    class="fa fa-check"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('style')
@endpush

@push('script')
@endpush
