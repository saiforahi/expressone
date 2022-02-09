@extends('courier.layout.app')
{{-- @section('pageTitle', Auth::guard('courier')->user()->first_name . ' Profile') --}}
@section('title',Auth::guard('courier')->user()->first_name . ' Profile')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                {{-- @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session()->get('message') }}
                    </div>
                @endif --}}
                <div class="x_title">
                    <h2>My Profile</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="tab-content">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        
                        <div class="card-body">
                            <form method="post" action="{{ route('courier.profileUpdate') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::guard('courier')->user()->id }}">
                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-3 col-8" onclick="chooseFile()" style="cursor: pointer">
                                        <?php $media=Auth::guard('courier')->user()->getFirstMedia('profile_pic');?>
                                        <img src="{{ $media == null ? asset('images/user.png') : $media->getUrl('profile_pic') }}"
                                            id="previewLogo" width="100%" class="border p-1">
                                    </div>
                                </div>
                                <input type="file" name="image" class="ImageUpload d-none" style="margin-top: 30px !important;">
                                <div class="form-row mt-3" style="margin-top: 30px !important;">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">First Name</label><input
                                                name="first_name" id="exampleEmail11"
                                                value="{{ Auth::guard('courier')->user()->first_name }}" type="text" required
                                                max="100" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Last
                                                Name</label><input name="last_name" id="examplePassword11"
                                                value="{{ Auth::guard('courier')->user()->last_name }}" type="text" required
                                                max="100" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">Phone</label>
                                            <input name="phone" id="exampleEmail11"
                                                value="{{ Auth::guard('courier')->user()->phone }}" type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">Email</label>
                                            <input name="email" id="exampleEmail11"
                                                value="{{ Auth::guard('courier')->user()->email }}" type="email"
                                                class="form-control">
                                        </div>
                                    </div>
        
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label>NID</label>
                                            <input name="nid_no" value="{{ Auth::guard('courier')->user()->nid_no }}" type="number"
                                                class="form-control" placeholder="Enter NID no" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="address"
                                                class="">Address</label><input name="address" id="address"
                                                value="{{ Auth::guard('courier')->user()->address }}" type="text"
                                                class="form-control" required max="255">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row m-auto">
                                    <div class="col">
                                        <button class="mt-2 btn btn-success float-right" type="submit">Update</button>
                                        <a href="{{ route('courier.profile') }}" class="mt-2 btn btn-secondary float-right mx-3">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            
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
