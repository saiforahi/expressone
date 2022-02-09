@extends('courier.layout.app')
{{-- @section('pageTitle', Auth::guard('courier')->user()->first_name . ' Profile') --}}
@section('title',Auth::guard('courier')->user()->first_name . ' Profile')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="x_title">
                    <h2>My Profile</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <table class="mb-0 table table-hover">
                                        <tbody>
                                            <tr>
                                                <td style="width: 60%">Name:</td>
                                                <td>{{ Auth::guard('courier')->user()->first_name . ' ' . Auth::guard('courier')->user()->last_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Shop Name:</td>
                                                <td>{{ Auth::guard('courier')->user()->shop_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td>{{ Auth::guard('courier')->user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td>{{ Auth::guard('courier')->user()->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>BIN</td>
                                                <td><button
                                                        class="btn btn-primary">{{ Auth::guard('courier')->user()->bin_no }}</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>NID</td>
                                                <td><button
                                                        class="btn btn-success">{{ Auth::guard('courier')->user()->nid_no }}</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bank name:</td>
                                                <td>{{ Auth::guard('courier')->user()->bank_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Bank branch:</td>
                                                <td>{{ Auth::guard('courier')->user()->bank_br_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Account name:</td>
                                                <td>{{ Auth::guard('courier')->user()->bank_acc_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Bank Account:</td>
                                                <td><button
                                                        class="btn btn-success">{{ Auth::guard('courier')->user()->bank_acc_no }}</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td>{{ Auth::guard('courier')->user()->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Page / Website Link:</td>
                                                <td>{{ Auth::guard('courier')->user()->website_link }}</td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                    <div class="d-inline-block">
                                        <button type="button" onclick="location.href='{{ route('courier.profileEdit') }}';"
                                            class="btn-shadow btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></span>
                                            Edit Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
{{-- <link href="{{ asset('dashboards/main.css') }}" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <!-- Datatables -->
    <link href="{{ asset('ass_vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">
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
