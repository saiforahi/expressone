@extends('admin.layout.app')
@section('title', 'Shipping Charge manage')
@section('content')
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="x_panel">
                        <div class="card">
                            <div class="card-header">
                                <div class="page-title">
                                    <div class="title_left">
                                        <h3>{{ $title }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('addEditCharge', $charge->id) }}" method="post">
                                    @csrf
                                    <label for="consignment_type">Shipping/Consignment Type: </label>
                                    {{-- <select name="consignment_type"
                                        class="form-control {{ $errors->has('consignment_type') ? 'is-invalid' : '' }}">
                                        <option value="">Select Option</option>
                                        <option value="Regular"
                                            {{ $charge->consignment_type == 'Regular' ? 'selected' : ' ' }}>Regular
                                        </option>
                                        <option value="Express"
                                            {{ $charge->consignment_type == 'Express' ? 'selected' : ' ' }}>Express
                                        </option>
                                    </select> --}}
                                    <input name="consignment_type" type="text" class="form-control mb-2"
                                        placeholder="Enter Shipping type" value="{{ $charge->consignment_type }}">

                                    <label for="shipping_amount">Shipping Amount</label>
                                    <input name="shipping_amount" type="number" class="form-control mb-2"
                                        placeholder="Enter Shipping charge" value="{{ $charge->shipping_amount }}"><br>
                                    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
                                </form>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
