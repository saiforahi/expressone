@extends('admin.layout.app')
@section('title','Delivery')
@section('content')
    <div class="right_col" role="main">
        <div style="margin-top:1em">
            <div class="row">
                <div class="">
                    @include('admin.shipment.includes.delivery-filder-form')
                    <div class="col-md-12">
                        <a onclick="export_selected();" class="btn btn-xs btn-info pull-right export" disabled>Export
                            selected</a>
                        <a onclick="deliverypayment();" class="btn btn-xs btn-primary pull-right delivery_payment"
                           >Delivery payment</a>
                        {{-- <a onclick="returnToMerchant();" class="btn btn-xs btn-warning pull-right returnToMerchant" disabled>Return to Merchant</a> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive" style="float:left;width:100%">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings selected">
                                        <th><input type="checkbox" id="checkall" onClick="checkAll();"/></th>
                                        <th class="column-title">Shipment info</th>
                                        <th class="column-title">Customer info</th>
                                        <th class="column-title">Payment</th>
                                        <th class="column-title">Delivery</th>
                                        <th class="column-title">Date</th>
                                        <th class="column-title">Status</th>
                                        <th class="column-title">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody class="delivery-result">
                                    @foreach($shipments as $shipment)
                                        <tr class="even pointer">
                                            <td>
                                                <input type="checkbox" value="{{$shipment->id}}" class="checkbox" @if(total_paid($shipment) >= ($shipment->payment_detail->weight_charge+$shipment->payment_detail->delivery_charge)) disabled @endif name="ids[]">
                                            </td>
                                            <td style="width:25%">
                                                Parcel ID: {{$shipment->id}}<br>
                                                Invoice ID: {{$shipment->invoice_id}}<br>
                                                Merchanrt: {{$shipment->merchant->first_name.' '.$shipment->merchant->last_name}}<br>
                                                Shop ID: {{$shipment->merchant->shop_name}}<br>

                                                Resource Unit: {{$shipment->pickup_location->point->unit->name}}<br>
                                                Delivry
                                                Unit: {{$shipment->delivery_location->point->unit->name}}
                                                <br>

                                            </td>
                                            <td style="width:20%">
                                                Name: {{$shipment->recipient['name']}}<br>
                                                Phone No: {{$shipment->recipient['phone']}}<br>
                                                Address: {{$shipment->recipient['address']}}<br>
                                            </td>
                                            <td style="width:10%">
                                                Weight: {{$shipment->weight}} KG<br>
                                                COD Amount: {{$shipment->amount}}<br>
                                                Delivery Charge: {{$shipment->payment_detail->delivery_charge}}<br>
                                                Weight Charge: {{$shipment->payment_detail->weight_charge}}<br>
                                                @if(payable_amount($shipment)>=0)
                                                <strong>Payable by expressone {{abs(payable_amount($shipment))}}</strong>
                                                @elseif(payable_amount($shipment) < 0)
                                                <strong>Payable by merchant {{abs(payable_amount($shipment))}}</strong>
                                                @endif
                                                @if(total_paid($shipment) >= ($shipment->payment_detail->weight_charge+$shipment->payment_detail->delivery_charge))
                                                <span class="btn-success">Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!is_courier_assigned_for_delivery($shipment))
                                                <button type="button" class="btn btn-primary btn-xs assign"
                                                    data-toggle="modal" data-target="#assignShipment"
                                                    data-id="{{ $shipment->id }}">Assign Courier <i
                                                        class="fa fa-truck"></i></button>
                                                @else
                                                Courier: {{\App\Models\CourierShipment::where(['shipment_id'=>$shipment->id,'type'=>'delivery'])->first()->courier->first_name}}
                                                @endif
                                                
                                                {{-- @if($shipment->shipping_status>5)
                                                    <?php $courier_id = \DB::table('driver_hub_shipment_box')->where('shipment_id', $shipment->id)->pluck('courier_id')->first();
                                                    $dName = \DB::table('drivers')->where('id', $courier_id)->select('first_name', 'last_name')->first(); ?>

                                                    @if($dName !=null) Delivery by <b
                                                        class="label label-info">{{$dName->first_name.' '.$dName->last_name}}</b>
                                                    <br> @endif
                                                @endif

                                                <?php $courier_id = \DB::table('driver_shipment')->where('shipment_id', $shipment->id)->pluck('courier_id')->first();?>
                                                @if($courier_id !=null)
                                                    <?php $dName = \DB::table('drivers')->where('id', $courier_id)->select('first_name', 'last_name')->first(); echo $courier_id;?>
                                                    Picked up by: <b
                                                        class="label label-info">{{$dName->first_name.' '.$dName->last_name}}</b>
                                                @else
                                                    <?php $dName = \DB::table('admins')->where('id', Auth::guard('admin')->user()->id)->select('first_name', 'last_name')->first();?>
                                                    @if($dName !=null) Picked up by: <b
                                                        class="label label-info">{{$dName->first_name.' '.$dName->last_name}}</b> @endif
                                                @endif --}}
                                            </td>
                                            <td class="">Created
                                                at: {{date('M d, y H:i:s',strtotime($shipment->created_at))}}<br>
                                                Delivery at:
                                                
                                            </td>
                                            <td class="">
                                                Status:
                                                @include('admin.shipment.status',['status'=>$shipment->status,'logistic_status'=>$shipment->logistic_status])
                                                @if($shipment->logistic_step->slug == 'delivered')
                                                <button onclick="mark_confirmed(<?php echo $shipment->id;?>)"
                                                    class="btn btn-xs pull-left btn-warning" type="button">Mark Confirmed
                                                </button>
                                                @endif
                                                <br><br>
                                            </td>
                                            <td class="">
                                                <b data-toggle="modal" data-target="#DriverNote"
                                                   class="btn btn-xs btn-info pull-right"
                                                   onclick="get_driver_note(<?php echo $shipment->id;?>)"> <i
                                                        class="fa fa-info"></i> <i class="fa fa-plus-circle"></i></b>

                                                <button onclick="audit_log(<?php echo $shipment->id;?>)"
                                                        class="btn btn-xs pull-left btn-warning" data-toggle="modal"
                                                        data-target="#logModal">Audit log
                                                </button>
                                                <a href="{{route('shipment-print',$shipment->id)}}"
                                                        class="btn btn-xs pull-left btn-primary btnPrint"
                                                        data-id="{{$shipment->id}}"><i class="fa fa-print"></i> Print
                                                </a>

                                            </td>
                                        </tr>
                                        <!-- Modal to assign to courier -->
                                    <div id="assignShipment" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Assign shipments to a Courier</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{route('assign-courier-for-delivery')}}">
                                                        @csrf
                                                        {{-- <input value="delivery" name="type" type="hidden"/> --}}
                                                        
                                                        <select class="form-control" name="courier_id" required="">
                                                            <option value="">Choose Courier</option>
                                                            <?php 
                                                                if(auth()->user()->hasRole('super-admin')){
                                                                    $couriers = \App\Models\Courier::latest()->get();
                                                                }
                                                                else{
                                                                    $units=\App\Models\Unit::where('admin_id',auth()->user()->id)->pluck('id')->toArray();
                                                                    $couriers = \App\Models\Courier::whereIn('unit_id',$units)->get();
                                                                }
                                                            ?>
                                                            @foreach ($couriers as $courier)
                                                                <option value="{{ $courier->id }}">{{ $courier->first_name . ' ' . $courier->last_name }} ({{ $courier->phone }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <br>
                                                        <textarea class="form-control" rows="5" placeholder="Type notes (if any)" name="note"></textarea>
                                                        <input type="hidden" name="shipment_id"
                                                            value="{{ $shipment->id }}" id="shipment_id"><br>
                                                        <button type="submit" class="pull-right btn btn-info btn-sm"> <i
                                                                class="fa fa-truck"></i>
                                                            Assign to delivery shipment </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Modal to assign to courier -->
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<!-- audit log,  -->
<div class="modal fade" id="logModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Parcel Audit log</h4>
            </div>
            <div class="modal-body audit-result"> Working...</div>
        </div>
    </div>
</div>

<!-- driver not (if any) during order delivery to customer -->
<div class="modal fade" id="DriverNote" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Courier note at delivery time</h4>
            </div>
            <div class="modal-body"><textarea class="deliveryNote form-control">Working...</textarea></div>
        </div>
    </div>
</div>

<!-- payment delivery form  -->
<div class="modal fade" id="delivryPayment" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set payments of parcel deliveries for merchant</h4>
            </div>
            <div class="modal-body deliveryPaymentForm"></div>
        </div>
    </div>
</div>


<style>input[type=date] {
        height: 40px
    }

    table {
        font-size: 12px
    }</style>

@push('scripts')
    <script src="{{asset('vendors/select2/dist/js/select2.min.js')}}"></script>
    <script>
        function checkAll() {
            if ($('#checkall').prop("checked") == true) {
                $('.checkbox').prop('checked', true);
                $(".export").removeAttr('disabled');
                $(".delivery_payment").removeAttr('disabled');
                $(".returnToMerchant").removeAttr('disabled');

            } else if ($('#checkall').prop("checked") == false) {
                $('.checkbox').prop('checked', false)
            }
        }

        function export_selected() {
            var searchIDs = $(".pointer input:checkbox:checked").map(function () {
                return $(this).val();
            }).get();
            if (searchIDs.length < 1) {
                alert('Parcels are not selected yet!!');
                return false;
            }
            window.open('/admin/export-selected/' + searchIDs);
        }

        function deliverypayment() {
            var searchIDs = $(".pointer input:checkbox:checked").map(function () {
                return $(this).val();
            }).get();
            if (searchIDs.length < 1) {
                alert('Parcels are not selected yet!!');
                return false;
            }
            $('#delivryPayment').modal('show');
            $('.deliveryPaymentForm').html('Working on...');
            $.ajax({
                type: "get", url: '/admin/delivery-payment-form/' + searchIDs,
                success: function (data) {
                    
                    $('.deliveryPaymentForm').html(data);
                }
            })
        }

        function returnToMerchant() {
            var searchIDs = $(".pointer input:checkbox:checked").map(function () {
                return $(this).val();
            }).get();
            if (searchIDs.length < 1) {
                alert('Parcels are not selected yet!!');
                return false;
            }
            window.open('/admin/return-selected-to-merchant/' + searchIDs);
        }

        function get_driver_note(shipment_id) {
            $('.deliveryNote').html('Loading...');
            $.ajax({
                type: "get", url: '<?php echo '/admin/driver-delivery-note/';?>' + shipment_id,
                success: function (data) {
                    $('.deliveryNote').html(data);
                }
            });
        }

        function audit_log(shipment_id) {
            $('.audit-result').html('Loading...');
            $.ajax({
                type: "get", url: '<?php echo '/admin/shipment-audit/';?>' + shipment_id,
                success: function (data) {
                    $('.audit-result').html(data);
                }
            });
        }
        function mark_confirmed(shipment_id){
            if(confirm('Are you sure to mark this shipment delivery as confirmed?')==true){
                $.ajax({
                    type: "get", url: '<?php echo '/admin/shipment-mark-delivered/';?>' + shipment_id,
                    success: function (data) {
                        // $('.audit-result').html(data);
                        location.reload();
                    }
                });
            }
        }
        $(".btnPrint").printPage();

        function get_shipment(field, param) {
            if (param.length < 1) {
                return false;
            }
            $('.delivery-result').html('<p class="text-center text-warning">Loading...</p>');
            $.ajax({
                type: "get", url: '<?php echo '/admin/get-shipment/';?>' + field + '/' + param,
                success: function (data) {
                    $('.delivery-result').html(data);
                }
            });
        }

        function get_driver_shipment(courier_id) {
            $('.delivery-result').html('<p class="text-center text-warning">Loading...</p>');
            $.ajax({
                type: "get", url: '<?php echo '/admin/get-driver-shipment/';?>' + courier_id,
                success: function (data) {
                    $('.delivery-result').html(data);
                }
            });
        }

        function get_area() {
            let url = window.location.href;
            let area_id = $('#area_id').val();

            url = new URL(url);
            if (window.location.href.indexOf("area_id") > -1) {
                url.searchParams.set('area_id', area_id);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('area_id', area_id);
                window.location.replace(url.href);
            }
        }

        function get_hub() {
            let url = window.location.href;
            let hub_id = $('#hub_id').val();
            url = new URL(url);
            if (window.location.href.indexOf("hub_id") > -1) {
                url.searchParams.set('hub_id', hub_id);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('hub_id', hub_id);
                window.location.replace(url.href);
            }
        }

        function get_merchant() {
            let url = window.location.href;
            let merchant_id = $('#merchant_id').val();
            url = new URL(url);
            if (window.location.href.indexOf("merchant_id") > -1) {
                url.searchParams.set('merchant_id', merchant_id);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('merchant_id', merchant_id);
                window.location.replace(url.href);
            }
        }


        function get_driver() {
            let url = window.location.href;
            let courier_id = $('[name=courier_id]').val();
            url = new URL(url);
            if (window.location.href.indexOf("courier_id") > -1) {
                url.searchParams.set('courier_id', courier_id);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('courier_id', courier_id);
                window.location.replace(url.href);
            }
        }

        function get_status() {
            let url = window.location.href;
            let status = $('[name=status]').val();
            url = new URL(url);
            if (window.location.href.indexOf("status") > -1) {
                url.searchParams.set('status', status);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('status', status);
                window.location.replace(url.href);
            }
        }

        function get_dates() {
            if ($("[name=date1]").val() == '') {
                alert('Please select a starting date first!!');
                $("[name=date2]").val('');
                return false;
            }
            let date1 = $("[name=date1]").val();
            let date2 = $("[name=date2]").val();

            let url = window.location.href;

            url = new URL(url);
            if (window.location.href.indexOf("date1") > -1) {
                url.searchParams.set('date1', date1);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('date1', date1);
                window.location.replace(url.href);
            }

            if (window.location.href.indexOf("date2") > -1) {
                url.searchParams.set('date2', date2);
                window.location.replace(url.href);
            } else {
                url.searchParams.append('date2', date2);
                window.location.replace(url.href);
            }

        }

        $(function () {
            $('.select2').select2();
            // search with customer phone
            $('[name=phone]').keypress(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    let url = window.location.href;
                    let phone = $(this).val();
                    url = new URL(url);
                    if (url.searchParams.get("phone")) {
                        url.searchParams.set('phone', phone);
                        window.location.replace(url.href);
                    } else {
                        url.searchParams.append('phone', phone);
                        window.location.replace(url.href);
                    }
                }
            });

            // search with invoiceID
            $('#invoice_id').keypress(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    let url = window.location.href;
                    let invoice_id = $(this).val();
                    url = new URL(url);
                    if (url.searchParams.get("invoice_id")) {
                        url.searchParams.set('invoice_id', invoice_id);
                        window.location.replace(url.href);
                    } else {
                        url.searchParams.append('invoice_id', invoice_id);
                        window.location.replace(url.href);
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('.assign').on('click', function() {
                let id = $(this).data('id');
                $('#shipment_id').val(id);
            });
            
        })
    </script>
@endpush
