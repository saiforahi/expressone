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
                            <li><a href="{{route('home')}}" class="gray-clr">Home</a></li>
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
                            <form action="{{route('register.store')}}" method="post" id="Signup-Form"
                                  autocomplete="off">
                                @csrf
                                <div class="row" style="margin-bottom:15px">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2"> Business Name: </label>
                                            <input type="text" value="{{ old('first_name') }}" class="form-control"
                                                   placeholder="Business Name" name="first_name" max="50" required>
                                            @error('first_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2"> Register Name: </label>
                                        <input type="text" value="{{ old('last_name') }}" class="form-control"
                                               placeholder="Register Name" name="last_name" max="50" required>
                                        @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2"> BIN No (If register): </label>
                                        <input type="text" value="{{ old('last_name') }}" class="form-control"
                                               placeholder="BIN Number" name="last_name" max="50" required>
                                        @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:15px">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2"> Marchant Name: </label>
                                            <input type="text" value="{{ old('first_name') }}" class="form-control"
                                                   placeholder="Marchant Name" name="first_name" max="50" required>
                                            @error('first_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2"> NID Number: </label>
                                        <input type="text" value="{{ old('last_name') }}" class="form-control"
                                               placeholder="NID Number" name="last_name" max="50" required>
                                        @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2"> Web URL/ Facebook URL: </label>
                                        <input type="text" value="{{ old('last_name') }}" class="form-control"
                                               placeholder="Web URL or Facebook URL" name="last_name" max="50" required>
                                        @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom:15px">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="title-2"> Business Address: </label>
                                           <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Business Address"></textarea>
                                            @error('first_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="title-2">Designated Pickup Address: </label>
                                        <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Designated Pickup Address"></textarea>
                                        @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row" style="margin-bottom:15px">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2"> Account Name: </label>
                                            <input type="text" value="{{ old('first_name') }}" class="form-control"
                                                   placeholder="Account Name" name="first_name" max="50" required>
                                            @error('first_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2"> Account Number: </label>
                                        <input type="text" value="{{ old('last_name') }}" class="form-control"
                                               placeholder="Account Number" name="last_name" max="50" required>
                                        @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2"> Bank Name: </label>
                                        <input type="text" value="{{ old('last_name') }}" class="form-control"
                                               placeholder="Bank Name" name="last_name" max="50" required>
                                        @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row" style="margin-bottom:15px">
                                    <div class="col-md-4">
                                        <label class="title-2"> Bank Branch: </label>
                                        <input type="text" value="{{ old('last_name') }}" class="form-control"
                                               placeholder="Bank Branch" name="last_name" max="50" required>
                                        @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="title-2"> Contact Number: </label>
                                        <input type="number" value="{{ old('phone') }}" class="form-control"
                                               placeholder="Enter your phone number" name="phone" required>
                                        @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-2"> Email: </label>
                                            <input type="email" value="{{ old('email') }}" class="form-control"
                                                   placeholder="Enter your email address" name="email" max="100"
                                                   required>
                                            @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="row" style="margin-bottom:15px">
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
                                            <label class="title-2">  </label>
                                            <button class="form-control" style="background-color: #4f92d7;border-radius: 10px; color:#fff;"> Register</button>
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
