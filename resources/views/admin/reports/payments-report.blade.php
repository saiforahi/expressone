@extends('admin.layout.app')
@section('title', 'Payment Report')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="x_panel">
                <div class="page-title">
                    <div class="title_left" style="width:100%">
                        <h3>Payments Report</h3>
                    </div>
                    {{-- <div class="title_right text-right" style="width:80%;">
                        @include('admin.shipment.load.shipment-filter')
                    </div> --}}
                </div>
                <div class="row" style="margin-bottom: 20px !important; margin-top: 10px !important;">
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Select Type</label>
                                <select class="form-control select2" name="type_id" id="type_id" onchange="on_type_change()">
                                    <option value="">-- Select Type --</option>
                                    <option value="merchant-wise" selected>Merchant wise</option>
                                    {{-- <option value="shipment-wise">Shipment wise</option> --}}
                                    <option value="unit-wise">Unit wise</option>
                                    <option value="shipment-wise">Shipment wise</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label>From</label>
                                <input class="form-control" type="date" name="date1" placeholder="date from" id="datepicker" value="{{request()->from_date}}">
                            </div>
                            <div class="col-md-6">
                                <label>To</label>
                                <input  class="form-control" type="date" name="date2" placeholder="date to" onchange="filter_from_date()"
                                value="{{request()->to_date}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="merchant_wise_row" style="display: block">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                <thead>
                                    <tr class="bg-dark">
                                        <th class="text-center">Merchant Info</th>
                                        <th class="text-center">Total Shipments</th>
                                        <th class="text-center">Total Paid</th>
                                        <th class="text-center">Total Due</th>
                                        <th class="text-center">Total Due to Expressone</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($merchants as $merchant)
                                        <tr>
                                            <td>
                                                <span><strong>Name : </strong>{{$merchant['user']->first_name.' '.$merchant['user']->last_name}}</span><br/>
                                                <span><strong>Phone : </strong>{{$merchant['user']->phone}}</span><br/>
                                                <span><strong>Unit : </strong>{{$merchant['user']->unit->name}}</span><br/>
                                                <span><strong>Address : </strong>{{$merchant['user']->address}}</span>
                                            </td>
                                            <td class="text-center">
                                                <span>{{$merchant['total_shipments']}}</span>
                                            </td>
                                            <td class="text-center">
                                                <span>{{$merchant['total_paid']}}</span>
                                            </td>
                                            <td class="text-center">
                                                <span>{{$merchant['total_due']}}</span>
                                            </td>
                                            <td class="text-center">
                                                <span>{{$merchant['total_due_to_ex']}}</span>
                                            </td>
                                            
                                            
                                            {{-- <td class="text-center">
                                                
                                                <button onclick="audit_log(<?php echo $shipment->id; ?>)"
                                                    class="btn btn-xs btn-warning" data-toggle="modal"
                                                    data-target="#logModal">Audit log
                                                </button>
                                                <a href="/admin/shipment-details/{{ $shipment->id }}" target="_blank"
                                                    class="btn btn-xs btn-info">View</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" id="unit_wise_row" style="display: none">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                <thead>
                                    <tr class="bg-dark">
                                        <th>Unit Info</th>
                                        <th>Total Collected</th>
                                        <th>Total Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $unit)
                                        <tr>
                                            <td>
                                                <span>{{ $unit['unit']->name }}</span><br/>
                                                <span>Admin : </span>
                                            </td>
                                            <td>{{ $unit['total_collected'] }}</td>
                                            <td>{{ $unit['total_paid'] }}</td>
                                            {{-- <td>{{ $shipment->recipient['name'] }} - {{ $shipment->recipient['phone'] }}
                                            </td>
                                            <td>{{ $shipment->recipient['name'] }}</td>
                                            <td>
                                                {{ $shipment->amount }}
                                            </td>
                                            <td> {{ $shipment->pickup_location->name ?? null }} </td>
                                            <td> {{ $shipment->delivery_location->name ?? null }} </td>
                                            <td> <a target="_blank"
                                                    href="/tracking?code={{ $shipment->tracking_code }}">{{ $shipment->tracking_code }}
                                                </a></td>
                                            <td>@include('admin.shipment.status', [
                                                'status' => $shipment->status,
                                                'logistic_status' => $shipment->logistic_status,
                                            ])
                                            </td> --}}
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row" id="shipment_wise_row" style="display: none">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                <thead>
                                    <tr class="bg-dark">
                                        <th>Shipment Info</th>
                                        <th>Customer info</th>
                                        <th>Merchant</th>
                                        <th>Paid Amount</th>
                                        <th>Due</th>
                                        
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shipments as $shipment)
                                        <tr>
                                            <td>
                                                <span><strong>Pickup Unit : </strong>{{ $shipment->pickup_location->point->unit->name }}</span><br/>
                                                <span><strong>Delivery Unit : </strong>{{ $shipment->delivery_location->point->unit->name }}</span><br/>
                                                <span>Tracking No : {{ $shipment->tracking_code }}</span><br/>
                                                <span>Created at : {{ date('M d, y', strtotime($shipment->created_at)) }}</span><br />
                                            </td>
                                            <td>{{ $shipment->recipient['name'] }} -
                                                {{ $shipment->recipient['phone'] }}</td>
                                            <td>{{ $shipment->recipient['name'] }}</td>
                                            <td>
                                                {{ $shipment->payment_detail->paid_amount }}
                                            </td>
                                            <td> {{ $shipment->payment_detail->paid_amount- ($shipment->payment_detail->cod_amount - ($shipment->payment_detail->delivery_charge+$shipment->payment_detail->weight_charge)) }} </td>
                                            
                                            {{-- <td>
                                                <a target="_blank" href="/tracking?code={{ $shipment->tracking_code }}">{{ $shipment->tracking_code }}</a>
                                            </td> --}}
                                            {{-- <td>@include('admin.shipment.status', [
                                                'status' => $shipment->status,
                                                'logistic_status' => $shipment->logistic_status,
                                            ])
                                            </td> --}}
                                            {{-- <td class="text-center">
                                                
                                                <button onclick="audit_log(<?php echo $shipment->id; ?>)"
                                                    class="btn btn-xs btn-warning" data-toggle="modal"
                                                    data-target="#logModal">Audit log
                                                </button>
                                                <a href="/admin/shipment-details/{{ $shipment->id }}" target="_blank"
                                                    class="btn btn-xs btn-info">View</a>
                                            </td> --}}
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


@endsection
@push('style')
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <style>
        select {
            padding: 4.1px
        }

    </style>
@endpush
@push('scripts')
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <script>
        function audit_log(shipment_id) {
            $('.audit-result').html('Loading...');
            $.ajax({
                type: "get",
                url: '<?php echo '/admin/shipment-audit/'; ?>' + shipment_id,
                success: function(data) {
                    $('.audit-result').html(data);
                }
            });
        }
        function filter_from_date() {
            if ($("[name=date1]").val() == '') {
                alert('Please select a starting date first!!');
                $("[name=date2]").val('');
                return false;
            }
            let date1 = $("[name=date1]").val();
            let date2 = $("[name=date2]").val();

            let url = window.location.href;

            url = new URL(url);
            if (window.location.href.indexOf("from_date") > -1) {
                url.searchParams.set('from_date', date1);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('from_date', date1);
                window.location.replace(url.href);
            }

            if (window.location.href.indexOf("to_date") > -1) {
                url.searchParams.set('to_date', date2);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('to_date', date2);
                window.location.replace(url.href);
            }

        }
        function on_type_change() {
            let type = $('#type_id').val();

            if(type == 'merchant-wise'){
                document.getElementById('merchant_wise_row').style.display='block'
                document.getElementById('unit_wise_row').style.display='none'
                document.getElementById('shipment_wise_row').style.display='none'
            }
            else if(type == 'unit-wise'){
                document.getElementById('unit_wise_row').style.display='block'
                document.getElementById('merchant_wise_row').style.display='none'
                document.getElementById('shipment_wise_row').style.display='none'
            }
            else if(type == 'shipment-wise'){
                document.getElementById('unit_wise_row').style.display='none'
                document.getElementById('merchant_wise_row').style.display='none'
                document.getElementById('shipment_wise_row').style.display='block'
            }
        }
        $(function() {

        })
    </script>
@endpush
