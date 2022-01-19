@extends('admin.layout.app')
@section('title', 'Rider List')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Rider List</h3>
                </div>
                <div class="title_right">
                    <div class="form-group pull-right top_search">
                        <a  type="button" class="btn btn-info btn-sm" href="{{ url('admin/add-edit-courier') }}">
                            <i class="fa fa-user-plus fs-13 m-r-3"></i> Add Rider
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
                                        <th>Name</th>
                                        <th>Rider ID</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($couriers as $courier)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <th scope="row">{{ $courier->first_name }} {{ $courier->last_name }}</th>
                                            <th scope="row">{{ $courier->courier_id }}</th>
                                            <th scope="row">{{ $courier->phone }}</th>
                                            <th scope="row">{{ $courier->email }}</th>
                                            <th scope="row"><img width="42" height="42" class="img-thumbnail img-fluid"
                                                    src="{{ $courier->image == null ? asset('images/user.png') : asset('storage/user/' . $courier->image) }}"
                                                    alt=""></th>
                                            <th scope="row" class="text-right">
                                                <div class="btn-group  btn-group-sm">
                                                    <form method="POST" action="{{ route('courierDelete', $courier->id) }}">
                                                        @csrf
                                                        <button class="btn btn-success delete" type="submit"><i
                                                                class="mdi mdi-delete m-r-3"></i>Delete
                                                        </button>
                                                        <a class="btn btn-info"
                                                            href="/admin/courier-shipments/{{ $courier->id }}">All Shipments</a>
                                                    </form>
                                                </div>
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
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <small>Rider Information add</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="demo-form2" method="post" action="{{ route('addEditCourier',$courier->id) }}" autocomplete="off"
                                class="form-horizontal form-label-left input_mask">
                                @csrf

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" placeholder="Arafat" name="first_name"
                                        id="first_name" value="{{ old('first_name') }}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" placeholder="Ahmed" name="last_name"
                                        id="last_name" value="{{ old('last_name') }}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" placeholder="abc@gmail.com" name="email"
                                        id="email" value="{{ old('email') }}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" placeholder="01234567898" name="phone"
                                        id="phone" value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" placeholder="*******" name="password"
                                        id="password">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="password_confirmation ">Confirm Password:</label>
                                    <input type="password" class="form-control" placeholder="*******"
                                        name="password_confirmation" id="password_confirmation">
                                </div>
                                <hr>
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
                </form>

            </div>
        </div>
    </div>
@endsection
@push('style')
    <!-- Datatables -->
    <link href="{{ asset('ass_vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Datatables -->
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
@endpush
