@extends('dashboard.layout.app')
@section('pageTitle', 'Prepare Shipment')
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
                <form id="upload_form" method="post" action="{{ route('merchant.addShipment') }}"> @csrf
                    <h5 class="card-title">Customer Details:</h5>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="" for="name">Customer Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Customer Name">
                        </div>
                        <div class="col text-left">
                            <label for="usr3">Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Customer phone">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="" for="address">Address</label>
                            <input type="text" id="address" class="form-control" name="address"
                                placeholder="Customer Address">
                        </div>

                        <div class="col text-left">
                            <label for="area">Area</label>
                            <select class="form-control select2" name="area" id="area">
                                <option value="" selected disabled>Select area</option>
                                @foreach ($area as $areas)
                                    <option value="{{ $areas->id }}">{{ $areas->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col text-left">
                            <label for="area">Shipping/Consignment Note Type</label>
                            <select class="form-control" name="shipping_charge_id">
                                <option value="" selected disabled>Select Shipping Method</option>
                                @foreach ($shippingCharges as $shippingCharge)
                                    <option value="{{ $shippingCharge->id }}">
                                        {{ $shippingCharge->consignment_type }}
                                        -{{ $shippingCharge->shipping_amount }}

                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h5 class="card-title mt-4">Shipment Details:</h5>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="" for="weight">COD Amount</label>
                            <input type="number" id="cod_amount" class="form-control" name="cod_amount" value="1">
                        </div>

                        <div class="col text-left">
                            <label class="" for="delivery_charge">Weight Charge</label>
                            <input type="number" class="form-control" name="weight_charge" value="0"
                                placeholder="Enter weight charge">

                        </div>

                        <div class="col cod_target text-left">
                            <label for="parcel_value">Declared Parcel Value</label>
                            <input type="number" id="parcel_value" class="form-control" name="parcel_value"
                                placeholder="Enter Parcel Value">
                            <div class="w-100">
                                <small>My parcel value is <span class="parcel_value_info">0</span> Taka</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label for="merchant_note">Merchant Note</label>
                            <textarea id="merchant_note" class="form-control" rows="3" name="merchant_note"></textarea>
                        </div>
                    </div>
                    <div class="col text-right">
                        <button type="submit" id="submit_button" class="btn btn-success rounded my-4">
                            <i class="fa fa-check"></i> Shipping Submit
                        </button>
                    </div>
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

            //alert(zone);
        }

        // $('#submit_button').click(function () {
        //     var form = new FormData($('#upload_form')[0]);
        //     warnBeforeRedirect(form);
        // });

        // function warnBeforeRedirect(form) {
        //     swal({
        //             title: "Sure want to save?",
        //             text: "If you click 'OK' you cant edit data.",
        //             type: "warning",
        //             showCancelButton: true
        //         }, function () {
        //             $.ajax({
        //                 url: "{{ route('merchant.addShipment') }}",
        //                 type: 'post',
        //                 processData: false,
        //                 contentType: false,
        //                 data: form,
        //                 dataType: 'json',
        //                 error: function (data) {
        //                     if (data.status === 422) {
        //                         var errors = $.parseJSON(data.responseText);
        //                         let allData = '', mainData = '';
        //                         $.each(errors, function (key, value) {
        //                             if ($.isPlainObject(value)) {
        //                                 $.each(value, function (key, value) {
        //                                     allData += value + "<br/>";
        //                                 });
        //                             } else {
        //                                 mainData += value + "<br/>";
        //                             }
        //                         });
        //                         swal({
        //                             title: mainData,
        //                             text: allData,
        //                             type: 'error',
        //                             html: true,
        //                             confirmButtonText: 'Ok'
        //                         })
        //                     }
        //                 },
        //                 success: function (data) {
        //                     if (data.error == 'error') {
        //                         swal({
        //                             title: "Something wrong",
        //                             text: 'Please check the shipping rate again.',
        //                             type: 'error',
        //                             confirmButtonText: 'Ok'
        //                         })
        //                     } else {
        //                         var url = '{{ route('merchant.dashboard') }}';
        //                         window.location.href = url;
        //                     }
        //                 }
        //             });
        //         }
        //     );
        // }
    </script>

@endpush
