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
                <form id="upload_form" action="{{ route('updateShipment', $shipment->id) }}" method="post">
                    {{ csrf_field() }}
                    <h5 class="card-title">Customer Details:</h5>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="" for="name">Customer Name</label>
                            <input type="text" class="form-control" name="recipient" placeholder="Customer Name"
                                value="{{ $shipment->recipient }}">
                        </div>
                        <div class="col text-left">
                            <label for="usr3">Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Customer phone"
                                value="{{ $shipment->phone }}">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="" for="address">Address</label>
                            <input type="text" class="form-control" name="address"
                                placeholder="Customer Address" value="{{ $shipment->address }}">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label for="exampleFormControlSelect1">Area</label>
                            <select class="form-control" name="unit_id">
                                @foreach ($area as $a)
                                    <option value="{{ $a->id }}" @if ($a->id == $shipment->unit_id)
                                        selected
                                @endif >{{ $a->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <h5 class="card-title mt-4">Shipment Details:</h5>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label for="amount">COD Amount</label>
                            <input type="number" id="amount" class="form-control" name="amount"
                                value="{{ $shipment->amount }}">
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
                            <textarea id="merchant_note" class="form-control" rows="3"
                                name="merchant_note"> {{ $shipment->merchant_note }} </textarea>
                        </div>
                    </div>
                        <div class="col text-right">
                            <button type="submit" id="submit_button" class="btn btn-success rounded my-4"> <i
                                    class="fa fa-check"></i> Save Changes
                            </button>
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
