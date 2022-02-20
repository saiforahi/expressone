@extends('admin.layout.app')
@section('title', 'Courier Add')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ $title }}</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            @if ($errors->any())
                <ul class="alert alert-danger alert-dismissible">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form id="demo-form2" method="post" action="{{ route('addEditCourier', $courier->id) }}"
                                autocomplete="on" class="form-horizontal form-label-left input_mask">
                                @csrf
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" placeholder="Arafat" name="first_name"
                                        id="first_name" value="{{ $courier->first_name }}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" placeholder="Ahmed" name="last_name"
                                        id="last_name" value="{{ $courier->last_name }}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" placeholder="abc@gmail.com" name="email"
                                        id="email" value="{{ $courier->email }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" placeholder="01234567898" name="phone"
                                        id="phone" value="{{ $courier->phone }}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="salary">Salary:</label>
                                    <input type="text" class="form-control" placeholder="salary" name="salary"
                                        id="salary" value="{{ $courier->salary }}" required>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="phone">NID:</label>
                                    <input type="text" class="form-control @error('nid') is-invalid @enderror" name="nid"
                                        value="{{ $courier->nid_no }}" placeholder="NID" required="" />
                                    @error('nid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <?php $units = \App\Models\Unit::where('admin_id',auth()->guard('admin')->user()->id)->get(); ?>
                                    <label for="phone">Unit:</label>
                                    <select name="unit" class="form-control @error('unit') is-invalid @enderror"
                                        value="{{ old('unit') }}" required>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}" @if($unit->id == $courier->unit_id) selected @endif>{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('unit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="address">Address:</label>
                                    <textarea type="text" class="form-control" name="address"
                                        id="address">{{$courier->address}}</textarea>
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
            </div>
        </div>
    </div>
@endsection
