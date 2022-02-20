@extends('admin.layout.app')
@section('title', 'Courier List')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Courier List</h3>
                </div>
                <div class="title_right">
                    <div class="form-group pull-right top_search">
                        <a type="button" class="btn btn-info btn-sm" href="{{ url('admin/add-edit-courier') }}">
                            <i class="fa fa-user-plus fs-13 m-r-3"></i>Add Courier
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            @include('flash.message')
            <div class="row">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                <thead>
                                    <tr class="bg-dark">
                                        <th>Sl.</th>
                                        <th>Info</th>
                                        <th>Employee ID</th>
                                        <th>Joining Date</th>
                                        <th>Salary</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($couriers as $courier)
                                        @php
                                            $countShipment = \App\Models\CourierShipment::where('courier_id', $courier->id)->count();
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <th scope="row">
                                                Name: {{ $courier->first_name }} {{ $courier->last_name }}<br>
                                                NID : {{ $courier->nid_no }}
                                            </th>
                                            <th scope="row">{{ $courier->employee_id }}</th>
                                            <th scope="row">{{ $courier->created_at }}</th>
                                            <th scope="row">{{ $courier->salary }}</th>
                                            <th scope="row">{{ $courier->phone }}</th>
                                            <th scope="row">{{ $courier->email }}</th>
                                            <th scope="row"><img width="42" height="42" class="img-thumbnail img-fluid"
                                                    src="{{ $courier->image == null ? asset('images/user.png') : asset('storage/user/' . $courier->image) }}"
                                                    alt=""></th>
                                            <th scope="row" class="text-left">
                                                @if($courier->status == 0)
                                                <button class="btn btn-success btn-xs assign" onclick="mark_approved({{$courier->id}},1)" type="button"><i
                                                    class="mdi mdi-account m-r-3"></i>Approve
                                                </button>
                                                @else
                                                
                                                @endif
                                                {{-- <button class="btn btn-primary btn-xs assign" type="button" data-toggle="modal" data-target="#myModal" data-id="{{ $courier->id }}"><i class="mdi mdi-pencil m-r-3"></i>Edit</button> --}}
                                                <a class="btn btn-warning btn-xs assign" type="button" href="{{route('addEditCourier',['id'=>$courier->id])}}"><i class="mdi mdi-pencil m-r-3"></i>Edit</a>
                                                @if ($countShipment == 0)
                                                <button class="btn btn-danger btn-xs assign" onclick="delete_courier({{$courier->id}})" type="button"><i
                                                        class="mdi mdi-delete m-r-3"></i>Delete
                                                </button>
                                                @else
                                                    <a class="btn btn-primary btn-xs"
                                                        href="/admin/courier-shipments/{{ $courier->id }}">All
                                                        Shipments</a>
                                                @endif
                                            </th>
                                        </tr>
                                        @php $no++ @endphp
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    
@endsection
@push('style')
    <!-- Datatables -->
    <link href="{{ asset('vendors/sweetalert/sweetalert.css') }}" rel="stylesheet" />  
    <link href="{{ asset('ass_vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <style type="text/css">
        .modal-backdrop {
            display: none;
        }

        .modal-dialog {
            margin-top: 6%;
        }

    </style>
@endpush

@push('scripts')
    <!-- Datatables -->
    <script src="{{ asset('vendors/sweetalert/sweetalert.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        function mark_approved(courier_id,status){
            swal({
                    title: "Confirmed?",
                    text: "You will not be able to revert!",
                    type: "warning",
                    showCancelButton: true
                },function(){
                    $.ajax({
                        url: "{{ route('courierStatusUpdate') }}",
                        type: 'post',
                        data: {
                            _token: CSRF_TOKEN,
                            id: courier_id,
                            status:status
                        },
                        dataType: 'json',
                        success: function(data) {
                            swal('Deleted!','Courier status has been updated','success').then(()=>{
                                window.location.reload()
                            })
                            
                        }
                    });
                })
            
        }
        function delete_courier(courier_id){
            swal({
                    title: "Confirmed?",
                    text: "You will not be able to revert!",
                    type: "warning",
                    showCancelButton: true
                },function(){
                    
                    $.ajax({
                        url: "{{ route('courierDelete') }}",
                        type: 'post',
                        data: {
                            _token: CSRF_TOKEN,
                            id: courier_id,
                        },
                        dataType: 'json',
                        success: function(data) {
                            swal('Deleted!','Courier has been deleted','success').then(()=>{
                                window.location.href = "/admin/courier"
                            })
                            
                        }
                    });
                })
            
        }

    </script>
@endpush
