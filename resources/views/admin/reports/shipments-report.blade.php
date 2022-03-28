@extends('admin.layout.app')
@section('title', 'Shipments Report')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left" style="width:100%">
                    <h3>Shipments Report</h3>
                </div>
                {{-- <div class="title_right text-right" style="width:80%;">
                        @include('admin.shipment.load.shipment-filter')
                    </div> --}}
            </div>
            <div class="row mb-3" style="margin-bottom: 10px !important; margin-top: 10px !important;">
                <div class="col-md-2">
                    <select class="form-control select2" name="type_id" id="type_id" onchange="change_type()">
                        <option value="delivery" @if ($type == 'delivery') selected @endif>Delivery</option>
                        <option value="pickup" @if ($type == 'pickup') selected @endif>Pickup</option>
                    </select>
                </div>
            </div>
            @include('admin.shipment.includes.report-filter-form')
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table id="datatable-buttons"
                            class="table table-striped table-bordered dataTable no-footer dtr-inline">
                            <thead>
                                <tr class="bg-dark">
                                    <th>Shipment Info</th>
                                    <th>Customer info</th>
                                    <th>Merchant</th>
                                    <th>Amount</th>
                                    <th>Pick up</th>
                                    <th>Delivery</th>
                                    <th>Trackings</th>
                                    <th>Status</th>
                                    {{-- <th class="text-center">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $shipment)
                                    <tr>
                                        <td>
                                            <span>Created at:
                                                {{ date('M d, y', strtotime($shipment['created_at'])) }}</span><br />
                                            <button onclick="audit_log(<?php echo $shipment['id']; ?>)" class="btn btn-xs btn-warning"
                                                data-toggle="modal" data-target="#logModal">Audit log
                                            </button>

                                        </td>
                                        <td>
                                            <span><strong>Name :
                                                </strong>{{ $shipment['recipient']['name'] }}</span><br />
                                            <span><strong>Phone :
                                                </strong>{{ $shipment['recipient']['phone'] }}</span><br />
                                        </td>
                                        <td>
                                            <span><strong>Name :
                                                </strong>{{ \App\Models\User::find($shipment['merchant_id'])->full_name() }}</span><br />
                                            <span><strong>Phone :
                                                </strong>{{ \App\Models\User::find($shipment['merchant_id'])->phone }}</span><br />
                                            <span><strong>Address :
                                                </strong>{{ \App\Models\User::find($shipment['merchant_id'])->address }}</span>
                                        </td>
                                        <td>
                                            <span><strong>COD : </strong>{{ $shipment['amount'] }}</span><br />
                                            <span><strong>Delivery Charge :
                                                </strong>{{ \App\Models\Shipment::find($shipment['id'])->payment_detail->delivery_charge }}</span>
                                        </td>
                                        <td> <span><strong>Unit :
                                                </strong>{{ \App\Models\Shipment::find($shipment['id'])->pickup_location->point->unit->name }}
                                            </span><br /><span><strong>Area/Location :
                                                </strong>{{ \App\Models\Shipment::find($shipment['id'])->pickup_location->name }}
                                            </span></td>
                                        <td> <span><strong>Unit :
                                                </strong>{{ \App\Models\Shipment::find($shipment['id'])->delivery_location->point->unit->name }}
                                            </span><br /><span><strong>Area/Location :
                                                </strong>{{ \App\Models\Shipment::find($shipment['id'])->delivery_location->name }}
                                            </span></td>
                                        <td> <a target="_blank"
                                                href="/tracking?code={{ $shipment['tracking_code'] }}">{{ $shipment['tracking_code'] }}
                                            </a></td>
                                        <td>@include('admin.shipment.status', [
                                            'status' => $shipment['status'],
                                            'logistic_status' => $shipment['logistic_status'],
                                        ])
                                        </td>
                                        {{-- <td class="text-center">
                                                <button onclick="audit_log(<?php echo $shipment['id']; ?>)" class="btn btn-xs btn-warning"
                                                    data-toggle="modal" data-target="#logModal">Audit log
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

        function change_type() {
            let url = window.location.href;
            let type = $('#type_id').val();
            console.log(type)
            // url = new URL(url);
            window.location.replace('/admin/reports/shipments/' + type);
            // if (window.location.href.indexOf("area_id") > -1) {
            //     url.searchParams.set('area_id', area_id);
            //     window.location.replace(url.href);
            // } else {
            //     url.searchParams.append('area_id', area_id);
            //     window.location.replace(url.href);
            // }
        }

        function filter_unit() {
            let url = window.location.href;
            let unit_id = $('#unit_id').val();

            url = new URL(url);
            if (window.location.href.indexOf("unit_id") > -1) {
                url.searchParams.set('unit_id', unit_id);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('unit_id', unit_id);
                window.location.replace(url.href);
            }
        }

        function filter_area() {
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

        function filter_merchant() {
            let url = window.location.href;
            let merchant_id = $('#merchant_id').val();

            url = new URL(url);
            if (window.location.href.indexOf("merchant_id") > -1) {
                url.searchParams.set('merchant_id', merchant_id);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('merchant_id', merchant_id);
                window.location.replace(url.href);
            }
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
        $(function() {

        })
    </script>
@endpush
