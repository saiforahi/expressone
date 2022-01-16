@extends('layouts.app')
@section('content')
    <article>
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">
            <div class="theme-container container ">
                <div class="row">
                    <div class="col-sm-8 pull-left">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin">Merchant Register</h2>
                            <p class="fs-16 no-margin"> Create your account</p>
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
                            <form class="row" action="{{ route('register.store') }}" method="post">
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

                                <div class="form-group col-md-4">
                                    <label class="title-2">Shop name</label>
                                    <input type="text" class="form-control" name="shop_name" placeholder="Shop name"
                                        value="{{ old('shop_name') }}">
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="title-2">Address: </label>
                                    <textarea class="form-control" name="address" id="" cols="30" rows="5"></textarea>
                                </div>

                                <div class="form-group col-md-3">
                                    <button type="submit" class="form-control"
                                        style="background-color: #e922c8;border-radius: 80px; color:#fff;">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
