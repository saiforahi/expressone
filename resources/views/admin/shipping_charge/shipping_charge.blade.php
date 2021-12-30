@extends('admin.layout.app')
@section('title', 'Shipping Charge manage')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ $title }}</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div id="datatable-buttons_wrapper"
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid"
                                    aria-describedby="datatable-buttons_info">
                                    <thead>
                                        <tr class="bg-dark" role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Sl.: activate to sort column descending" style="width: 62px;">
                                                Sl.</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                                style="width: 102px;">Shipping/Consignment Type</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1"
                                                aria-label="Rider ID: activate to sort column ascending"
                                                style="width: 132px;">Amount</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1"
                                                aria-label="Rider ID: activate to sort column ascending"
                                                style="width: 132px;">Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shippingCharges as $key => $shippingCharge)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="sorting_1"> {{ ++$key }}</th>
                                                <th scope="row">{{ $shippingCharge->consignment_type }}</th>
                                                <th scope="row">{{ $shippingCharge->shipping_amount }}</th>
                                                <th scope="row">
                                                    <div class="btn-group  btn-group-sm">
                                                        <a class="btn btn-success" href="{{ route('addEditCharge',$shippingCharge->id )}}"><i
                                                                class="mdi mdi-table-edit m-r-3"></i>Edit</a>
                                                        <a class="btn btn-danger disabled" href=""><i
                                                                class="mdi mdi-delete m-r-3"></i>Delete</a>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
