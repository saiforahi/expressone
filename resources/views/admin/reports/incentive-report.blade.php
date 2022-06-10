@extends('admin.layout.app')
@section('title', 'Incentive Report')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            @if (session()->has('total'))
                <div class=" col-md-12 m-t-5">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session()->get('total') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="row mb-3" style="margin-bottom: 10px !important; margin-top: 30px !important;">
            <div class="col-md-4">
                <label>Select Type</label>
                <select class="form-control select2" name="type_id" id="type_id" onchange="on_type_change()">
                    <option value="">-- Select Delivery Type --</option>
                    <option value="successfull" selected>Successfull</option>
                    {{-- <option value="shipment-wise">Shipment wise</option> --}}
                    <option value="returned">Returned</option>
                </select>
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
        <div class="row" id="successfull" style="display: block; margin-top:60px !important">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table id="datatable-buttons"
                        class="table table-striped table-bordered dataTable no-footer dtr-inline">
                        <thead>
                            <tr class="bg-dark">
                                <th class="text-center">Courier Info</th>
                                <th class="text-center">Total Delivered</th>
                                <th class="text-center">Incentive<br/>( x {{\App\Models\GeneralSettings::first()->incentive_val}})</th>
                                {{-- <th class="text-center">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results['successfull_result'] as $result)
                            <tr>
                                <td>
                                    <span><strong>Name : </strong>{{ $result['courier']->first_name }}</span><br/>
                                    <span><strong>Phone : </strong>{{ $result['courier']->phone }}</span><br/>
                                    <span><strong>Unit : </strong>{{ $result['courier']->unit->name }}</span><br/>
                                    
                                </td>
                                <td class="text-center">
                                    <span>{{$result['total_delivered']}}</span>
                                    
                                </td>
                                <td class="text-center">
                                    <span>{{$result['total_incentive']}}</span>
                                    
                                </td>
                            </tr>
                            @endforeach
                            {{-- @foreach ($successfull_deliveries as $shipment)
                                <tr>
                                    <td>
                                        <span><strong>Pickup Unit : </strong>{{ $shipment->pickup_location->point->unit->name }}</span><br/>
                                        <span><strong>Delivery Unit : </strong>{{ $shipment->delivery_location->point->unit->name }}</span><br/>
                                        <span>{{ $shipment->tracking_code }}</span><br/>
                                        <span>{{ date('M d, y', strtotime($shipment->created_at)) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span><strong>Name : </strong>{{ $shipment->recipient['name'] }}</span><br/>
                                        <span><strong>Phone : </strong>{{ $shipment->recipient['phone'] }}</span><br/>
                                        <span><strong>Address : </strong>{{ $shipment->recipient['address'] }}</span><br/>
                                        
                                    </td>
                                    <td class="text-center">
                                        <span><strong>Name : </strong>{{ $shipment->merchant->first_name.' '.$shipment->merchant->last_name }}</span><br/>
                                        <span><strong>Phone : </strong>{{ $shipment->merchant->phone }}</span><br/>
                                        <span><strong>Address : </strong>{{ $shipment->merchant->address }}</span><br/>
                                    </td>
                                    <td class="text-center">
                                        
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" id="returned" style="display: none; margin-top:60px !important">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table id="datatable-buttons"
                        class="table table-striped table-bordered dataTable no-footer dtr-inline">
                        <thead>
                            <tr class="bg-dark">
                                <th class="text-center">Courier Info</th>
                                <th class="text-center">Total Returned</th>
                                <th class="text-center">Incentive<br/>( x {{\App\Models\GeneralSettings::first()->incentive_val}})</th>
                                {{-- <th class="text-center">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results['return_result'] as $result)
                                <tr>
                                    <td>
                                        <span><strong>Name : </strong>{{ $result['courier']->first_name }}</span><br/>
                                        <span><strong>Phone : </strong>{{ $result['courier']->phone }}</span><br/>
                                        <span><strong>Unit : </strong>{{ $result['courier']->unit->name }}</span><br/>
                                        
                                    </td>
                                    <td class="text-center">
                                        <span>{{$result['total_returned']}}</span>
                                        
                                    </td>
                                    <td class="text-center">
                                        <span>{{$result['total_incentive']}}</span>
                                        
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

            if(type == 'successfull'){
                document.getElementById('successfull').style.display='block'
                document.getElementById('returned').style.display='none'
            }
            else if(type == 'returned'){
                document.getElementById('returned').style.display='block'
                document.getElementById('successfull').style.display='none'
            }
        }
        $(function() {

        })
    </script>
@endpush
