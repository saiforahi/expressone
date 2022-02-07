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
                                    <th>Action</th>
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
                                    <th class="text-right">
                                        {{-- <a href="/admin/view-merchant-handover/{{$shipment->id}}"
                                            class="btn btn-success btn-sm"> <i class="fa fa-search"></i> View</a> --}}
                                            @if($shipment->logistic_step->slug=='returned-in-transit')
                                            <a href="/admin/returned-received/{{$shipment->id}}"
                                                class="btn btn-success btn-sm"> <i class="fa fa-exchange"></i> Receive</a>
                                            @elseif($shipment->logistic_step->slug == 'returned-received')
                                            <a href="/admin/handover-to-merchant/{{$shipment->id}}"
                                                class="btn btn-success btn-sm"> <i class="fa fa-exchange"></i> Handover</a>
                                            @elseif($shipment->logistic_step->slug == 'returned-handover-to-merchant')
                                            Handed over to merchant
                                            @endif
                                        </th>
                                </tr>

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

