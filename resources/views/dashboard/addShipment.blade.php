@extends('dashboard.layout.app')
@section('pageTitle', 'Prepare Shipment')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-location-arrow text-success" aria-hidden="true"></i>
                </div>
                <div>{{ $title }}
                    <div class="page-title-subheading">Fill in your details to prepare the shipment label
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        @include('flash.message')
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <form id="upload_form" action="{{ route('merchant.saveShipment') }}" method="post">
                @include('dashboard._shipmentForm', ['buttonText' => 'Save Shipment'])
            </form>
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
    <link href="{{ asset('ass_vendors/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('ass_vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ass_vendors/select2/dist/css/bootstrap4-select2.css') }}">
@endpush

@push('script')
    <script src="{{ asset('ass_vendors/sweetalert/sweetalert.js') }}"></script>
    <script src="{{ asset('ass_vendors/select2/dist/js/select2.min.js') }}"></script>
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
        //                 url: "{{ route('merchant.saveShipment') }}",
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
