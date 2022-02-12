@extends('admin.layout.app')
@section('title','Shipments data')
@section('content')
  <div class="right_col" role="main">
    <div class="row">
      <div class="x_panel">
        <div class="page-title">
          <div class="title_left" style="width:20%"><h3>All Shipments</h3> </div>
          {{-- <div class="title_right text-right" style="width:80%;">
            @include('admin.shipment.load.shipment-filter')
          </div> --}}
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                <thead>
                <tr class="bg-dark">
                  <th>Date</th>
                   <th>Customer info</th><th>Merchant</th> 
                    <th>Amount</th><th>Pick up</th><th>Delivery</th><th>Trackings</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shipments as $shipment)
                  <tr>
                    <td>{{date('M d, y',strtotime($shipment->created_at))}}</td>
                    <td>{{$shipment->recipient['name']}} - {{$shipment->recipient['phone']}}</td>
                    <td>{{$shipment->recipient['name']}}</td>
                    <td>
                      {{$shipment->amount}}
                    </td>
                    <td> {{$shipment->pickup_location->name??null}} </td>
                    <td> {{$shipment->delivery_location->name??null}} </td>
                    <td> <a target="_blank" href="/tracking?code={{$shipment->tracking_code}}">{{$shipment->tracking_code}} </a></td>
                    <td>@include('admin.shipment.status',['status'=>$shipment->status,'logistic_status'=>$shipment->logistic_status])</td>
                    <td class="text-center">
                      {{-- <button class="btn btn-xs btn-warning reset" id="{{$shipment->id}}">Reset</button> --}}
                      <button onclick="audit_log(<?php echo $shipment->id;?>)"
                        class="btn btn-xs btn-warning" data-toggle="modal"
                        data-target="#logModal">Audit log
                      </button>
                      <a href="/admin/shipment-details/{{$shipment->id}}" target="_blank" class="btn btn-xs btn-info">View</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
 </div>

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

 <div class="modal fade resetModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Reset shipment
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> </h5>
        </div>
        <div class="modal-body">
            <form action="{{route('reset-shipment')}}" method="post">@csrf
              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 text-right m-t-7">Reset Shipment as</label>
                <div class="col-md-5 col-sm-5">
                  <select name="label" class="form-control">
                    <option value="0">Label Create</option>
                    <option value="1">Pick-up (Admin end - assigned to rider)</option>
                    <option value="2">Pick-up (Rider end (Receive) - Rider has received)</option>
                    {{-- <option value="3">Dispatch Center</option>
                    <option value="4">In Transit</option>
                    <option value="5">Out for delivery</option> --}}
                  </select>
                </div>
                <div class="col-md-4 col-sm-4">
                  <button class="btn btn-info" type="submit"><i class="fa fa-undo"></i> Reset Shipment</button>
                </div>
              </div>   <input type="hidden" name="id">
            </form>
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
<style>
  select{
    padding:4.1px
  }
</style>
@endpush
@push('scripts')
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
<script>
  function audit_log(shipment_id) {
      $('.audit-result').html('Loading...');
      $.ajax({
          type: "get", url: '<?php echo '/admin/shipment-audit/';?>' + shipment_id,
          success: function (data) {
              $('.audit-result').html(data);
          }
      });
  }
  $(function(){
    $('[name=zone_id]').on('change',function(){
      let zone_id = $(this).val();
      $.ajax({
        type: "get", url: '/admin/zone-to-area/'+zone_id,
        success: function(data){
          $.each(data, function(key, value) {   
            $('#area') .append($("<option></option>")
              .attr("value", value.id).text(value.name)); 
          });
        }
      });
    });

    $('.reset').on('click',function(){
      let id = $(this).attr('id');
      $('[name=id]').val(id);
      $('.resetModal').modal('show');
    });
  })
</script>
@endpush