@extends('dashboard.layout.app')
@section('pageTitle', 'Prepare Shipment')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-location-arrow text-success" aria-hidden="true"></i>
                </div>
                <div>Edit Shipment
                    <div class="page-title-subheading">Update Shipment details
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
            <form id="upload_form" method="post" action="{{ route('merchant.updateShipment', $shipment->id) }}">
                @method('put')
                {{-- invoice no --}}
                {{-- <input type="hidden" value="{{ $invoice_id }}" name="invoice_id"> --}}
                {{-- <input type="text" value="{{ $trackingCode }}" name="invoice_id"> --}}
                @csrf
                <div class="main-card mb-3 card card-body">
                    <h5 class="card-title">Customer Details:</h5>
                    <div class="form-row">
                        <div class="col text-left">
                            <label class="" for="name">Customer Name</label> <span
                                class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" value="{{ @old('name', $shipment['recipient']['name']) }}" placeholder="Customer Name" required>
                        </div>
                        <div class="col text-left">
                            <label for="usr3">Phone Number</label> <span class="text-danger">*</span>
                            <input type="text" class="form-control" value="{{ @old('phone', $shipment['recipient']['phone']) }}" name="phone" placeholder="Customer phone" required>
                        </div>
                        <div class="col text-left">
                            <label class="" for="address">Address</label> <span
                                class="text-danger">*</span>
                            <input type="text" id="address" class="form-control" name="address"
                                placeholder="Customer Address" value="{{ @old('address', $shipment['recipient']['address']) }}" required>
                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card card-body">
                    <h5 class="card-title">Shipment Details:</h5>
                    <div class="form-row">
                        <div class="col-md-4 text-left">
                            <label>Pickup Location</label> <span class="text-danger">*</span>
                            <select class="form-control" name="pickup_location_id" required>
                                <option>Select location</option>
                                <?php $locations=\App\Models\Location::join('points','points.id','locations.id')->join('units','units.id','points.unit_id')->where('units.id',$shipment->merchant->unit_id)->get(['locations.*']);?>
                                @foreach ($locations as $loc)
                                    <option value="{{ $loc->id }}" @if($shipment->pickup_location_id == $loc->id) selected @endif>{{ $loc->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 text-left">
                            <label>Delivery Location</label> <span class="text-danger">*</span>
                            <select class="form-control" name="delivery_location_id" required>
                                <option>Select location</option>
                                <?php $locations=\App\Models\Location::all();?>
                                @foreach ($locations as $loc)
                                    <option value="{{ $loc->id }}" @if($shipment->delivery_location_id == $loc->id) selected @endif>{{ $loc->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 text-left">
                            <label>Shipping Service Type</label> <span class="text-danger">*</span>
                            <select class="form-control" name="service_type">
                                <option>Select type</option>
                                <option value="priority" @if($shipment->service_type == 'priority') selected @endif>Priority</option>
                                <option value="express" @if($shipment->service_type == 'express') selected @endif>Express</option>
                            </select>
                        </div>
                        <div class="col-md-4 text-left">
                            <label>Weight</label>
                            <input type="number" name="weight" value="{{ @old('weight', $shipment['weight']) }}" placeholder="Enter weight" class="form-control">
                        </div>
                        <div class="col-md-4 text-left">
                            <label>COD Amount</label>
                            <input type="number" value="{{ @old('amount', $shipment['amount']) }}" name="amount" placeholder="Enter amount" class="form-control">
                        </div>
                        <div class="col-md-4 text-left">
                            <label>Delivery Charge Amount</label>
                            <input type="number" name="delivery_charge" value="{{ @old('delivery_charge', $shipment->payment_detail->delivery_charge) }}" placeholder="Enter amount" class="form-control">
                        </div>
                        <div class="col-md-4 text-left">
                            <label>Weight Charge Amount</label>
                            <input type="number" name="weight_charge" placeholder="Enter amount" class="form-control" value="{{ @old('weight_charge', $shipment->payment_detail->weight_charge) }}">
                        </div>
                        <div class="col-md-4 text-left">
                            <label>Note</label>
                            <input type="text" name="note" value="{{ @old('note', $shipment->note) }}" placeholder="Enter note" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col text-right">
                    <button type="submit" id="submit_button" class="btn btn-success rounded my-4">
                        <i class="fa fa-check"></i> Save
                    </button>
                </div>
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
