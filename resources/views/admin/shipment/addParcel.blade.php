@extends('admin.layout.app')
@section('title', 'Rider List')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ $title }}</h3>
                </div>

            </div>
            <div class="clearfix"></div>
            <hr>

            <div class="row">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="form-horizontal form-label-left input_mask" action="{{ route('adminSaveParcel') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="" for="name">Customer Name</label>
                                        <input type="text" id="name" class="form-control" name="name" required placeholder="Enter recepient name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="usr3">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" required placeholder="Enter recepient phone">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="" for="address">Address</label>
                                        <input type="text" id="address" class="form-control" name="address" required placeholder="Enter recepient address">
                                    </div>
                                </div>

                                <h5 class="card-title mt-4">Shipment Details:</h5>
                                <div class="row">
                                    <div class="col-md-4 text-left">
                                        <label class="" for="weight">Weight</label>
                                        <input type="text" id="weight" class="form-control" name="weight" value="1">

                                    </div>
                                    <div class="col-md-4 cod_target text-left">
                                        <label for="parcel_value">Declared Parcel Value</label>
                                        <input type="number" id="parcel_value" class="form-control" name="parcel_value"
                                            value="0">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Delivery Type:</label>
                                        @php
                                            $deliveryType = \DB::table('shipping_charges')->get();
                                        @endphp
                                        <select class="form-control" name="shipping_charge_id">
                                            <option>Select type</option>
                                            @foreach ($deliveryType as $item)
                                                <option value="{{ $item->id }}">{{ $item->consignment_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="row my-4">
                                    <div class="col-md-4 text-left">
                                        <label for="merchant_note">Merchant Note</label>
                                        <textarea id="merchant_note" class="form-control" rows="3"
                                            name="merchant_note"></textarea>
                                    </div>
                                    <div class="col-md-4 text-left">
                                        <label>Merchant selection</label>
                                        <?php $users = \DB::table('users')->get(); ?>
                                        <select class="form-control select2" style="width:100%;height:35px"
                                            name="merchant_id" required>
                                            <option value="" selected disabled>Select Merchant</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->first_name }}
                                                    {{ $user->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 text-left">
                                        <label>Courier select</label>
                                        <?php $drivers = \DB::table('couriers')->get(); ?>
                                        <select class="form-control select2" style="width:100%;height:35px"
                                            name="courier_id" required>
                                            <option value="" selected disabled>Select Rider</option>
                                            @foreach ($drivers as $driver)
                                                <option value="{{ $driver->id }}">{{ $driver->first_name }}
                                                    {{ $driver->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Status:</label>
                                    <label class="radio-inline"><input type="radio" value="0" name="status"
                                            checked>Label create
                                        (pickup)</label>
                                    <label class="radio-inline"><input type="radio" value="1" name="status">Assigned
                                        to Rider</label>
                                    <label class="radio-inline"><input type="radio" value="2" name="status">Receipt by
                                        Rider</label>
                                </div>
                                <div class="col-md-12 form-group has-feedback ">
                                    <button type="submit" class="btn btn-success pull-right"><i
                                            class="mdi mdi-content-save m-r-3"></i>Save
                                    </button>
                                    <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">
                                        <i class="mdi mdi-cancel m-r-3"></i>Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
