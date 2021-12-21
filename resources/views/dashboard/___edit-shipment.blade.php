@extends('dashboard.layout.app')
@section('pageTitle', 'Edit Shipment')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-location-arrow text-success" aria-hidden="true"></i>
                </div>
                <div>Prepare Shipment
                    <div class="page-title-subheading">Fill in your details to prepare the shipment label
                    </div>
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
            <div class="main-card mb-3 card card-body">

                <form id="upload_form" action="{{ route('updateShipment',$shipment->id) }}" method="post"> {{ csrf_field() }}
                    <h5 class="card-title">Customer Details:</h5>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="" for="name">Customer Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ $shipment->name }}">
                        </div>
                        <div class="col text-left">
                            <label for="usr3">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ $shipment->phone }}">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="" for="address">Address</label>
                            <input type="text" id="address" class="form-control" name="address"
                                value="{{ $shipment->address }}">
                        </div>
                        @if (!empty($shipment->zip_code))
                            <div class="col text-left">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" id="zip_code" class="form-control" name="zip_code"
                                    value="{{ $shipment->zip_code }}">
                            </div>
                        @endif

                        <div class="col text-left">
                            <label for="area">Area</label>
                            <select class="form-control select2" name="area" id="area">
                                <option value="" selected disabled>Select area</option>
                                @foreach ($area as $areas)
                                    <option @if ($shipment->area_id == $areas->id)selected @endif value="{{ $areas->id }}">{{ $areas->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h5 class="card-title mt-4">Shipment Details:</h5>
                    <div class="form-row my-4">
                        @if (!empty($shipment->weight))
                            <div class="col text-left">
                                <label class="" for="weight">Weight</label>
                                <input type="text" id="weight" class="form-control" name="weight"
                                    value="{{ $shipment->weight }}">
                                <div class="w-100">
                                    <small>My total chargeable weight is <span class="weight_info">1.00 kg</span></small>
                                </div>
                            </div>
                        @endif
                        <div class="col cod_target text-left">
                            <label for="parcel_value">Declared Parcel Value</label>
                            <input type="number" id="parcel_value" class="form-control" name="parcel_value"
                                value="{{ $shipment->parcel_value }}">
                            <div class="w-100">
                                <small>My parcel value is <span class="parcel_value_info">0</span> Taka</small>
                            </div>
                        </div>

                        <div class="col text-left">
                            <label for="invoice_id">Invoice Id</label>
                            <input type="text" id="invoice_id" class="form-control" name="invoice_id"
                                value="{{ $shipment->invoice_id }}">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label for="merchant_note">Merchant Note</label>
                            <textarea id="merchant_note" class="form-control" rows="3"
                                name="merchant_note">{{ $shipment->merchant_note }}</textarea>
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label for="usr3">How do you want to arrange for shipment?</label><br>
                            <label for="merchant_note">Service Type: &nbsp; &nbsp; &nbsp; </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" checked name="delivery_type" id="inlineRadio1"
                                    value="1" @if ($shipment->delivery_type == '1')checked @endif />
                                <label class="form-check-label" for="inlineRadio1">Regular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="delivery_type" id="inlineRadio2"
                                    value="2" @if ($shipment->delivery_type == '2')checked @endif />
                                <label class="form-check-label" for="inlineRadio2">Express</label>
                            </div>
                        </div>
                        <div class="col text-right">
                            <button type="submit" id="submit_button" class="btn btn-success rounded my-4"> <i
                                    class="fa fa-edit"></i> Save the Change
                            </button>
                        </div>
                    </div>

                    <button type="button" onclick="calculate()" class="mt-2 px-4 btn btn-success float-left d-none">
                        Shipping Rate Calculate </button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('style')
    <style>
        .activating {
            background-color: #295b35;
            color: white;
        }

        .activating2 {
            border: 1px solid red !important;
        }

    </style>
    <link href="{{ asset('vendors/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/dist/css/bootstrap4-select2.css') }}">
@endpush

@push('script')
    <script src="{{ asset('vendors/sweetalert/sweetalert.js') }}"></script>
    <script src="{{ asset('vendors/select2/dist/js/select2.min.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            $('.select2').select2({
                theme: "bootstrap",
                width: '100%'
            });

            $('#area').change(function() {
                calculate();
            });

            $('#weight').keyup(function() {
                let id = parseFloat($(this).val());
                $('.weight_info').text(id.toFixed(2));
                calculate();
            });
            $('#parcel_value').keyup(function() {
                let id = parseInt($(this).val());
                $('.parcel_value_info').text(id);
                calculate();
            });
            $('.deliveryType').click(function() {
                $('#deliveryType').val($(this).attr('id'));
                $('.deliveryType').removeClass('activating2');
                $(this).addClass('activating2');
                calculate();
            });
        });


        function calculate() {
            let area = $("#area").val();
            let weight = $("#weight").val();
            let parcel_value = $("#parcel_value").val();
            let delivery_type = $(".activating2").attr('id');

            $.ajax({
                url: "{{ route('merchant.rate.check') }}",
                type: 'post',
                data: {
                    _token: CSRF_TOKEN,
                    area: area,
                    weight: weight,
                    parcel_value: parcel_value,
                    delivery_type: delivery_type
                },
                dataType: 'json',
                success: function(data) {
                    $('#submitMenu').removeClass('d-none');
                    if (data.status == 'error') {
                        $('#NotFound').removeClass('d-none');
                        $('#FoundPrice').addClass('d-none');
                        $('#error_message').text('Note : ' + data.message);
                    }

                    if (data.status == 'success') {
                        $('#FoundPrice').removeClass('d-none');
                        $('#NotFound').addClass('d-none');
                        $('#PriceShowing').text(data.total_price + ' Taka');
                        if (data.cod == 1) {
                            $('.codHas').show();
                            $('#NotFoundState1').text('Price + ' + data.cod_rate + '% COD');
                            $('#NotFoundState21').text(data.price + ' + ' + data.cod_amount);
                        } else $('.codHas').hide();
                    }
                }
            });
        }
    </script>

@endpush