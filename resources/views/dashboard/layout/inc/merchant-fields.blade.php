<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-user text-success">
                </i>
            </div>
            <div>Hello {{ Auth::guard('user')->user()->first_name }} {{ Auth::guard('user')->user()->last_name }}
                <div class="page-title-subheading">You can update your profile here
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button" onclick="location.href='{{ route('profile') }}';"
                    class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-hand-o-left"
                            aria-hidden="true"></i></span>
                    Back Profile
                </button>
            </div>
        </div>
    </div>
</div>

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
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form method="post" action="{{ route('ProfileUpdate') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ Auth::guard('user')->user()->id }}">
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="exampleEmail11" class="">First Name</label><input
                                    name="first_name" id="exampleEmail11"
                                    value="{{ Auth::guard('user')->user()->first_name }}" type="text" required
                                    max="100" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="examplePassword11" class="">Last
                                    Name</label><input name="last_name" id="examplePassword11"
                                    value="{{ Auth::guard('user')->user()->last_name }}" type="text" required
                                    max="100" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="exampleEmail11" class="">Phone</label>
                                <input name="phone" id="exampleEmail11"
                                    value="{{ Auth::guard('user')->user()->phone }}" type="text"
                                    class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="shop_name" class="">Shop Name</label>
                                <input name="shop_name" id="shop_name"
                                    value="{{ Auth::guard('user')->user()->shop_name }}" type="text"
                                    class="form-control" required max="255" placeholder="Shop name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php $units = \DB::table('units')->get(); ?>
                            <div class="position-relative form-group">
                                <label for="shop_name" class="">Unit belongs To</label>
                                <select class="form-control select2" name="unit_id" required="">
                                    <option value="">Select Unit</option>
                                    @foreach ($units as $unit)
                                        <option @if ($unit->id == Auth::guard('user')->user()->unit_id) selected @endif value="{{ $unit->id }}">{{ $unit->name }}</option> @endforeach </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="nid_no" class="">Nantion ID</label>
                                <input name="nid_no" value="{{ Auth::guard('user')->user()->nid_no }}"
                                    type="text" class="form-control" required placeholder="Enter nid no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="BIN" class="">BIN</label>
                                <input name="BIN" value="{{ Auth::guard('user')->user()->BIN }}" type="text"
                                    class="form-control" placeholder="Enter BIN no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="bank_name" class="">Bank name</label>
                                <input name="bank_name" value="{{ Auth::guard('user')->user()->bank_name }}"
                                    type="text" class="form-control" required placeholder="Enter bank name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="bank_br_name" class="">Bank br. name</label>
                                <input name="bank_br_name" value="{{ Auth::guard('user')->user()->bank_br_name }}"
                                    type="text" class="form-control" required placeholder="Enter bank br name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="bank_acc_name" class="">Bank A/C name</label>
                                <input name="bank_acc_name" value="{{ Auth::guard('user')->user()->bank_acc_name }}"
                                    type="text" class="form-control" required placeholder="Enter bank account name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="bank_acc_no" class="">Bank A/C no</label>
                                <input name="bank_acc_no" value="{{ Auth::guard('user')->user()->bank_acc_no }}"
                                    type="text" class="form-control" required placeholder="Enter bank A/c no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group"><label for="address"
                                    class="">Address</label><input name="address" id="address"
                                    value="{{ Auth::guard('user')->user()->address }}" type="text"
                                    class="form-control" required max="255" placeholder="Your Address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="website_link" class="">Website (optional)
                                    Link</label><input name="website_link" id="website_link"
                                    value="{{ Auth::guard('user')->user()->website_link }}" type="url"
                                    class="form-control" placeholder="https://findbankswiftcode.com/">
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('profile') }}" class="mt-2 btn btn-secondary float-right mx-3">Cancel</a>
                    <button class="mt-2 btn btn-success float-right">Update</button>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('ass_vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('ass_vendors/sweetalert/sweetalert.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('ass_vendors/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('ass_vendors/select2/dist/css/bootstrap4-select2.css') }}">
<script src="{{ asset('ass_vendors/sweetalert/sweetalert.js') }}"></script>
<script src="{{ asset('ass_vendors/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
    $('.select2').select2({
        theme: "bootstrap",
        width: '100%'
    });
</script>
