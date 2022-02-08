@extends('layouts.app')
@section('content')
    <article>
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">
            <div class="theme-container container ">
                <div class="row">
                    <div class="col-sm-8 pull-left">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin">Merchant Registration</h2>
                            <p class="fs-16 no-margin">Create your account</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb-menubar list-inline">
                            <li><a href="{{ route('home') }}" class="gray-clr">Home</a></li>
                            <li class="active">register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Breadcrumb -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="regi_form_wrapper">
                        <div class="quote_form">
                            @include('flash.message')
                            @if ($errors->any())
                                {{$errors}}
                            @endif
                            <form class="row" id="reg_form" action="{{ route('register.store') }}" method="post">
                                @csrf
                                <div class="form-group col-md-4">
                                    <label class="title-2">First name:</label>
                                    <input type="text" value="{{ old('first_name') }}" class="form-control"
                                        placeholder="First name" name="first_name" required>
                                    @error('first_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="title-2">Last name:</label>
                                    <input type="text" value="{{ old('last_name') }}" class="form-control"
                                        placeholder="Last name" name="last_name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="title-2">Shop name</label>
                                    <input type="text" class="form-control" name="shop_name" placeholder="Shop name"
                                        value="{{ old('shop_name') }}">
                                    @error('shop_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="title-2">Contact No:</label>
                                    <input type="text" value="{{ old('phone') }}" class="form-control"
                                        placeholder="Enter valid phone no" name="phone">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="title-2">Email:</label>
                                    <input type="text" value="{{ old('email') }}" class="form-control"
                                        placeholder="Enter valid email" name="email">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="title-2">Address: </label>
                                    <textarea class="form-control" name="address" id="" cols="30" rows="1"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        {{-- <div class="col-md-4">
                                            <label class="title-2">Identification Type</label>
                                            <select class="form-control" name="id_type">
                                                <option>-- Select Type --</option>
                                                <option value="NID">NID</option>
                                                <option value="BIN">BIN</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="title-2">Identification Number:</label>
                                            <input type="text" value="{{ old('id_no') }}" class="form-control"
                                                placeholder="Enter valid identification number" name="id_no">
                                            @error('id_no')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <div class="col-md-6">
                                            <label class="title-2">NID:</label>
                                            <input type="text" value="{{ old('nid_no') }}" class="form-control"
                                                placeholder="Enter valid NID number" name="nid_no">
                                            @error('nid_no')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="title-2">BIN:</label>
                                            <input type="text" value="{{ old('bin_no') }}" class="form-control"
                                                placeholder="Enter valid NID number" name="bin_no">
                                            @error('bin_no')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="title-2">Password: </label>
                                    <input type="password" class="form-control" min="8" max="20"
                                        placeholder="Enter password" name="password" required>
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="title-2">Confirm Password: </label>
                                    <input type="password" class="form-control" min="8" max="20" required
                                        placeholder="Confirm your password" name="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label class="title-2">Website link: </label>
                                    <input class="form-control" name="website_link" placeholder="Web site link">
                                </div> --}}


                                {{-- <div class="form-group col-md-4">
                                    <label class="title-2">Bank Account Name: </label>
                                    <input type="text" class="form-control" placeholder="Account Name"
                                        name="bank_acc_name" max="50" required>
                                    @error('bank_acc_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="title-2">Bank Account Number: </label>
                                    <input type="number" class="form-control" placeholder="Account Number"
                                        name="bank_acc_no" required>
                                    @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="title-2">Bank Name: </label>
                                    <input type="text" class="form-control" placeholder="DBBL, IBBL, SCB" name="bank_name"
                                        required>
                                    @error('bank_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="title-2">Bank Branch: </label>
                                    <input type="text" class="form-control" placeholder="Bank Branch"
                                        name="bank_branch_name" max="50" required>
                                    @error('bank_branch_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div> --}}

                            </form>
                            <div class="row mt-3">
                                <div class="form-group col-md-3">
                                    <button type="button" onclick="event.preventDefault();document.getElementById('reg_form').submit();" class="form-control" style="background-color: #EB058D;border-radius: 80px; color:#fff;">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
