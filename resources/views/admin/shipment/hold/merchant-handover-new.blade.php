@extends('admin.layout.app')
@section('title','Return - handover to merchnat')
@section('content')
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">  <h3>Shipment handover to merchant </h3></div>
        <div class="row">
            <div class="col-12">
                <div class="x_panel">
                    <div class="x_content table-responsive">

                        <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                            <thead>
                                <tr class="bg-dark">
                                    <th>Customer Info</th>
                                    <th>Merchant Info</th>
                                    <th>Pickup Location</th>
                                    <th>Delivery Location</th>
                                    <th>Delivery Info</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($shipments as $shipment)
                                <?php 
                                // $statuses=\App\Models\LogisticStep::where('slug','returned-in-transit')->orWhere('slug','returned-received')->select('slug')->get();
                                // $checkShipment = merchant_wise_reurn_in_transit_shipments_for_logged_in_admin($user,$statuses); 
                                
                                ?>

                                <tr>
                                    {{-- <th scope="row"><img width="42" height="42" class="img-thumbnail img-fluid" src="{{$user->image == null? asset('images/user.png'):asset('storage/user/'.$user->image)}}"></th> --}}
                                    <th class="text-left" scope="row">Name: {{$shipment->recipient['name']}} <br/><i class="fa fa-phone"></i> Phone: {{$shipment->recipient['phone']}}
                                        <br/><i class="fa fa-map-marker"></i> Address: {{$shipment->recipient['address']}}
                                    </th>
                                    <th scope="row">Name: {{$shipment->merchant->first_name}}<br>
                                        <i class="fa fa-phone"></i> {{$shipment->merchant->phone}}<br>
                                        <i class="fa fa-envelope-o"></i> {{$shipment->merchant->email}}<br>
                                    </th>
                                    <th scope="row">
                                        <i class="fa fa-angle-right"></i> Location: {{$shipment->pickup_location->name}}
                                    </th>
                                    <th scope="row">
                                        <i class="fa fa-angle-right"></i> Location: {{$shipment->delivery_location->name}}
                                    </th>
                                    <th scope="row">
                                        @if($shipment->logistic_step->slug == 'returned-received' && !is_courier_assigned_for_return_delivery($shipment))
                                        <button type="button" class="btn btn-primary btn-xs assign" data-toggle="modal" data-target="#assignShipment" data-id="{{ $shipment->id }}">Assign Courier <i class="fa fa-truck"></i></button>
                                        @else
                                        Courier: {{is_courier_assigned_for_return_delivery($shipment)?\App\Models\CourierShipment::where(['shipment_id'=>$shipment->id,'type'=>'return'])->first()->courier->first_name:''}}
                                        @endif
                                    </th>
                                    <th class="text-center">
                                    {{-- <a href="/admin/view-merchant-handover/{{$shipment->id}}"
                                        class="btn btn-success btn-sm"> <i class="fa fa-search"></i> View</a> --}}
                                        @if($shipment->logistic_step->slug=='returned-in-transit')
                                        <a href="/admin/returned-received/{{$shipment->id}}"
                                            class="btn btn-success btn-sm"> <i class="fa fa-exchange"></i> Receive</a>
                                       
                                        {{-- <a href="/admin/handover-to-merchant/{{$shipment->id}}"
                                            class="btn btn-success btn-sm"> <i class="fa fa-exchange"></i> Handover</a> --}}
                                        @elseif($shipment->logistic_step->slug == 'returned-handover-to-merchant')
                                        <span>Handed over to merchant</span>
                                        @elseif($shipment->logistic_step->slug == 'received-shipment-back')
                                        <span class="btn btn-success btn-sm">Received by merchant</span>
                                        @endif

                                        
                                    </th>
                                </tr>
                                <div id="assignShipment" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Assign shipments to a Courier</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('assign-courier-for-return')}}">
                                                    @csrf
                                                    {{-- <input value="delivery" name="type" type="hidden"/> --}}
                                                    
                                                    <select class="form-control" name="courier_id" required="">
                                                        <option value="">Choose Courier</option>
                                                        <?php $couriers = \App\Models\Courier::latest()->get();?>
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
                                                        Assign to return shipment </button>
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
@endsection


@push('style')
  <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
        rel="stylesheet">
  <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}"
        rel="stylesheet">
  <link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endpush
@push('scripts')
 <!-- Datatables -->
 <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
 <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
 <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
 <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
 <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
  <script>
    $(function(){

    })
</script>
@endpush

