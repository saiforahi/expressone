@extends('admin.layout.app')
@section('title', 'Merchant List')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Merchant Shipment List <small class="text-info">(Pickup Point)</small>
                    </h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content table-responsive">

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                <thead>
                                    <tr class="bg-dark">
                                        <th>Image</th>
                                        <th>Info</th>
                                        <th>Contact</th>
                                        <th>Parcel/s</th>
                                        <th>Area</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $users)
                                        <?php

                                        if ($users->area_id == null) {
                                            echo '<script>alert("Merchant area deos not updated")</script>';
                                            continue;
                                        }

                                        if (Request::segment(3) == 'received') {
                                            $checkShipment = \DB::table('shipments')
                                                ->select('id')
                                                ->where(['user_id' => $users->id, 'status' => '1', 'shipping_status' => '2'])
                                                ->get();
                                            $status = '1';
                                            $shipping_status = '2';
                                        } elseif (Request::segment(3) == 'cancelled') {
                                            $checkShipment = \DB::table('shipments')
                                                ->select('id')
                                                ->where(['user_id' => $users->id, 'status' => 2])
                                                ->get();
                                            $status = '2';
                                            $shipping_status = '6';
                                        } else {
                                            $checkShipment = \DB::table('shipments')
                                                ->select('id')
                                                ->where(['user_id' => $users->id, 'status' => '1', 'shipping_status' => '0'])
                                                ->get();
                                            $status = '1';
                                            $shipping_status = '0';
                                        } ?>

                                        <?php if (Session::has('admin_hub')) {
                                            $hubID = Session::get('admin_hub')->id;
                                        } else {
                                            $hubID = 0;
                                        } ?>

                                        @if ($checkShipment->count() > 0 && is_belongsTo_hub($users->area->hub_id, $hubID))
                                            <tr>
                                                <th scope="row"><img width="42" height="42" class="img-thumbnail img-fluid"
                                                        src="{{ $users->image == null ? asset('images/user.png') : asset('storage/user/' . $users->image) }}">
                                                </th>
                                                <th scope="row">Name: {{ $users['first_name'] }}
                                                    {{ $users['last_name'] }}<br>
                                                    Shop Name: {{ $users->shop_name }}
                                                </th>
                                                <th scope="row"><i class="fa fa-phone"></i> {{ $users['phone'] }}<br>
                                                    <i class="fa fa-envelope-o"></i> {{ $users['email'] }}<br>
                                                    <i class="fa fa-map-marker"></i> {{ $users['address'] }}<br>
                                                </th>
                                                <th scope="row">
                                                    <span class="btn btn-success">
                                                        @if ($checkShipment->count() > 0)
                                                            {{ $checkShipment->count() }} Parcels
                                                        @else {{ $checkShipment->count() }} Parcel @endif
                                                    </span>
                                                </th>
                                                <th class="text-info">
                                                    <i class="fa fa-angle-right"></i> Hub: {{ $users->area->hub->name }}
                                                    <br><i class="fa fa-angle-right"></i>
                                                    Area: {{ $users->area->name }}
                                                </th>
                                                <th class="text-right">
                                                    <a href="/admin/shipping-list/more/{{ $users->id . '/' . $status . '/' . $shipping_status }}"
                                                        class="btn btn-primary">View</a>

                                                    <?php $is_cencell = \DB::table('shipments')
                                                        ->select('id')
                                                        ->where(['user_id' => $users->id, 'status' => '2']); ?>
                                                    @if ($is_cencell->count() > 0)
                                                        <!-- <a href="/admin/shipping-list/cencelled-items/{{ $users->id }}" class="btn btn-warning">Cencelled items</a> -->
                                                    @endif
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('style')
<style></style>
@endpush

@push('scripts')
<script></script>
@endpush
