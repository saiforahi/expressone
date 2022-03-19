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
                <div class="row mb-3" style="margin-bottom: 10px !important; margin-top: 10px !important;">
                    <div class="col-md-2">
                        <select class="form-control select2" name="area_id" id="area_id" onchange="get_area()">
                            <option value="">Search By Area/Location</option>
                            {{-- @foreach($locations as $area)
                            <option @if(request()->area_id==$area->id)selected @endif value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="datatable-buttons"
                            class="table table-striped table-bordered dataTable no-footer dtr-inline">
                            <thead>
                                <tr class="bg-dark">
                                    <th>Date</th>
                                    <th>Customer info</th>
                                    <th>Merchant</th>
                                    <th>Amount</th>
                                    <th>Pick up</th>
                                    <th>Delivery</th>
                                    <th>Trackings</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shipments as $shipment)
                                    <tr>
                                        <td>{{ date('M d, y', strtotime($shipment->created_at)) }}</td>
                                        <td>{{ $shipment->recipient['name'] }} - {{ $shipment->recipient['phone'] }}</td>
                                        <td>{{ $shipment->recipient['name'] }}</td>
                                        <td>
                                            {{ $shipment->amount }}
                                        </td>
                                        <td> {{ $shipment->pickup_location->name ?? null }} </td>
                                        <td> {{ $shipment->delivery_location->name ?? null }} </td>
                                        <td> <a target="_blank"
                                                href="/tracking?code={{ $shipment->tracking_code }}">{{ $shipment->tracking_code }}
                                            </a></td>
                                        <td>@include('admin.shipment.status',['status'=>$shipment->status,'logistic_status'=>$shipment->logistic_status])
                                        </td>
                                        <td class="text-center">
                                            {{-- <button class="btn btn-xs btn-warning reset" id="{{$shipment->id}}">Reset</button> --}}
                                            <button onclick="audit_log(<?php echo $shipment->id; ?>)" class="btn btn-xs btn-warning"
                                                data-toggle="modal" data-target="#logModal">Audit log
                                            </button>
                                            <a href="/admin/shipment-details/{{ $shipment->id }}" target="_blank"
                                                class="btn btn-xs btn-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
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
        function get_area() {
            let url = window.location.href;
            let area_id = $('#area_id').val();

            url = new URL(url);
            if (window.location.href.indexOf("area_id") > -1) {
                url.searchParams.set('area_id', area_id);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('area_id', area_id);
                window.location.replace(url.href);
            }
        }
        $(function() {
            
        })
    </script>
    
@endpush
