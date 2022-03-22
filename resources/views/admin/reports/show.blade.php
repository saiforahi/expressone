@extends('admin.layout.app')
@section('title', 'Shipments Report')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="x_panel">
                <div class="page-title">
                    <div class="title_left" style="width:100%">
                        <h3>Shipment Movements Report</h3>
                    </div>
                    {{-- <div class="title_right text-right" style="width:80%;">
                        @include('admin.shipment.load.shipment-filter')
                    </div> --}}
                </div>
                {{-- <div class="row mb-3" style="margin-bottom: 10px !important; margin-top: 10px !important;">
                    <div class="col-md-2">
                        <select class="form-control select2" name="area_id" id="area_id" onchange="get_area()">
                            <option value="">-- Select --</option>
                            <option>Pickup from Merchants</option>
                            <option>Handover to pick up unit</option>
                            <option>Internal transit</option>
                            <option>Received by delivery unit</option>
                            <option>Handover to delivery man</option>
                            
                        </select>
                    </div>
                </div> --}}
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="datatable-buttons"
                            class="table table-striped table-bordered dataTable no-footer dtr-inline">
                            <thead>
                                <tr class="bg-dark">
                                    <th>Shipment info</th>
                                    <th>Customer info</th>
                                    <th>Pickup from Merchants</th>
                                    <th>Handover to pick up unit</th>
                                    <th>Internal transit</th>
                                    <th>Received by delivery unit</th>
                                    <th>Handover to delivery man</th>
                                    {{-- <th>Status</th> --}}
                                    {{-- <th class="text-center">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $shipment)
                                    <tr>
                                        <td>
                                            <span>{{ $shipment['shipment']->merchant->name }}</span><br/>
                                            <span>{{ $shipment['shipment']->tracking_code }}</span><br/>
                                            <span>{{ date('M d, y', strtotime($shipment['shipment']->created_at)) }}</span>
                                        </td>
                                        <td>{{ $shipment['shipment']->recipient['name'] }}</td>
                                        <td>
                                            <span style="font-weight: bold">{{ $shipment['movements']['pickup_from_merchant']->action_made_by->first_name.' '.$shipment['movements']['pickup_from_merchant']->action_made_by->last_name }}</span><br/>
                                            <span>{{ str_replace('App\\Models\\', '', $shipment['movements']['pickup_from_merchant']->action_made_by_type ?? '') }}</span><br />
                                            <span>{{ $shipment['movements']['pickup_from_merchant']->created_at }}</span>

                                        </td>
                                        <td> 
                                            <span style="font-weight: bold">{{ $shipment['movements']['dropped_at_unit']->action_made_by->first_name.' '.$shipment['movements']['dropped_at_unit']->action_made_by->last_name }} </span><br/>
                                            <span>{{ str_replace('App\\Models\\', '', $shipment['movements']['dropped_at_unit']->action_made_by_type ?? '') }}</span><br />
                                            <span>{{ $shipment['movements']['dropped_at_unit']->created_at }}</span>
                
                                        </td>
                                        <td> 
                                            <span style="font-weight: bold">{{ $shipment['movements']['internal_transit']? $shipment['movements']['internal_transit']->action_made_by->first_name.' '.$shipment['movements']['internal_transit']->action_made_by->last_name : '' }} </span><br/>
                                            <span>{{ str_replace('App\\Models\\', '', $shipment['movements']['internal_transit']->action_made_by_type ?? '')}}</span><br />
                                            <span>{{ $shipment['movements']['internal_transit']->created_at ?? null }}</span>
                                        </td>
                                        <td> 
                                            <span style="font-weight: bold">{{ $shipment['movements']['received_delivery_unit']? $shipment['movements']['received_delivery_unit']->action_made_by->first_name.' '.$shipment['movements']['received_delivery_unit']->action_made_by->last_name : '' }} </span><br/>
                                            <span>{{ str_replace('App\\Models\\', '', $shipment['movements']['received_delivery_unit']->action_made_by_type ?? '')}}</span><br />
                                            <span>{{ $shipment['movements']['received_delivery_unit']->created_at ?? null }}</span>
                                        </td>
                                        <td> 
                                            <span style="font-weight: bold">{{ $shipment['movements']['courier_assigned_to_deliver']? $shipment['movements']['courier_assigned_to_deliver']->action_made_by->first_name.' '.$shipment['movements']['courier_assigned_to_deliver']->action_made_by->last_name : '' }} </span><br/>
                                            <span>{{ str_replace('App\\Models\\', '', $shipment['movements']['courier_assigned_to_deliver']->action_made_by_type ?? '')}}</span><br />
                                            <span>{{ $shipment['movements']['courier_assigned_to_deliver']->created_at ?? null }}</span>
                                        </td>
                                        {{-- <td> <a target="_blank"
                                                href="/tracking?code={{ $shipment['shipment']->tracking_code }}">{{ $shipment['shipment']->tracking_code }}
                                            </a></td> --}}
                                        {{-- <td>@include('admin.shipment.status', [
                                            'status' => $shipment['shipment']->status,
                                            'logistic_status' => $shipment['shipment']->logistic_status,
                                        ])
                                        </td> --}}
                                        {{-- <td class="text-center">
                                            
                                            <button onclick="audit_log(<?php echo $shipment['shipment']->id; ?>)" class="btn btn-xs btn-warning"
                                                data-toggle="modal" data-target="#logModal">Audit log
                                            </button>
                                            <a href="/admin/shipment-details/{{ $shipment['shipment']->id }}"
                                                target="_blank" class="btn btn-xs btn-info">View</a>
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
