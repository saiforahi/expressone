@extends('layouts.app')

@section('content')
    <article>
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">
            <div class="theme-container container ">
                <div class="row">
                    <div class="col-sm-8 pull-left">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin"> Merchant Register </h2>
                            <p class="fs-16 no-margin"> Create your account </p>
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
                            <form action="{{ route('register.store') }}" method="post" id="Signup-Form"
                                autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2">First name:</label>
                                            <input type="text" value="{{ old('first_name') }}" class="form-control"
                                                placeholder="First name" name="first_name" required>
                                            @error('first_name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2">Last name:</label>
                                            <input type="text" value="{{ old('last_name') }}" class="form-control"
                                                placeholder="Last name" name="last_name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2">Contact No:</label>
                                            <input type="text" value="{{ old('phone') }}" class="form-control"
                                                placeholder="Enter valid phone no" name="phone">
                                            @error('phone')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2">Email: </label>
                                            <input type="email" value="{{ old('email') }}" class="form-control"
                                                placeholder="Enter valid email" name="email">
                                            @error('phone')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2">Bank Account Name: </label>
                                            <input type="text" class="form-control" placeholder="Account Name"
                                                name="bank_acc_name" max="50" required>
                                            @error('bank_acc_name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2">Bank Account Number: </label>
                                        <input type="number" class="form-control" placeholder="Account Number"
                                            name="bank_acc_no" required>
                                        @error('last_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2">Bank Name: </label>
                                        <input type="text" class="form-control" placeholder="DBBL, IBBL, SCB"
                                            name="bank_name" required>
                                        @error('bank_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2">Bank Branch: </label>
                                        <input type="text" class="form-control" placeholder="Bank Branch"
                                            name="bank_branch_name" max="50" required>
                                        @error('bank_branch_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2"> Password: </label>
                                            <input type="password" class="form-control" min="8" max="20"
                                                placeholder="Enter password" name="password" required>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2"> Confirm Password: </label>
                                        <input type="password" class="form-control" min="8" max="20" required
                                            placeholder="Confirm your password" name="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="title-2"> </label>
                                            <button type="submit" class="form-control"
                                                style="background-color: #e922c8;border-radius: 10px; color:#fff;">
                                                Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
