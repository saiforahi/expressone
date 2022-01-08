<?php $num = 0;  ?>
@foreach($boxes as $key=>$box)
  @foreach(explode(',',$box->shipment_ids) as $key=>$shipment_id)
  <?php $shipment = \App\Shipment::where('id',$shipment_id)->first(); ?>
  @if(is_assigned2Driver($box->id,$shipment->id,'assigning') != 0)
    <table class="table table-xs" id="{{$shipment->id}}">
        <tbody>
          <tr>
            <td colspan="2">Invoice ID: {{$shipment->invoice_id}}</td>
            <td><select style="float:right;">
              <option>{{$shipment->area->name}} </option>
            </select></td>
           </tr>
          <tr>
            <td colspan="3">Customer: {{$shipment->name}} </td>
          </tr>
          <tr>
            <td>Price: {{$shipment->cod_amount}}</td>
            <td></td><td class="text-right">
              Weight: <input style="width:80px;height:17px" type="number" readonly="" value="{{$shipment->weight}}"></td>
          </tr>
          <tr>
            <td>Phone: {{$shipment->phone}} </td>
            <td></td><td class="text-right hub0">Hub: {{hub_from_area($shipment->area_id)->name}}</td>
          </tr>
          <tr>
            <td colspan="3">Address: {{$shipment->address}} </td>
          </tr>
          <tr class="text-right">
            <td class="text-left" style="width:50%">Date: <small>{{date('M d, Y',strtotime($shipment->created_at))}} (<b class="text-info">{{$shipment->created_at->diffForHumans()}}</b>)</small></td>
            <td></td>
              <td>
                <button class="btn btn-success btn-xs rmBtn{{$shipment->id}}" onclick="moveToAgentDispatch(<?php echo $box->id.','.$shipment->id;?>);"><i class="fa fa-long-arrow-left"></i> Move</button>
              </td>
          </tr>

        </tbody>
    </table> <?php $num++; ?>
  @endif
  @endforeach
@endforeach

@if($num == 0)
  <p class="text-danger">No data found yet</p>
@else
  <button class="btn btn-sm btn-info pull-right"  data-toggle="modal" data-target="#assignBox"> Assing to rider </button>
@endif

<!-- Modal to assign to driver -->
<div id="assignBox" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign shipments to rider</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="assignToDriver" action="{{route('agent-dispatch-assing2Driver')}}">@csrf
            @include('admin.shipment.includes.shipment-assign-driver-form') <br>
            <div class="row">
            <button type="submit" class="pull-right btn btn-info btn-sm submit"> <i class="fa fa-truck"></i> Assign for Delivery</button>
            </div>

        </form>
         <div class="get row"></div>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">

  function moveToAgentDispatch(box_id,shipment_id){
    $('.rmBtn'+shipment_id).html('Moving...');
    $('.rmBtn'+shipment_id).prop('disabled',true);
    $.ajax({
        type: "get",url: '/admin/driver-assign2agent-dispatch/'+box_id+'/'+shipment_id,
        success: function(data){
          $('#'+shipment_id).remove();
          $(".agent-side").load('/admin/agent-dispatch-agentSide');
        },error: function (request, error) {
          alert(" Can't do because: " + error);
        },
    });
  }

  function assingDriver(){ $('.assignBox').modal('show');}

  $("#assignToDrivert").submit(function(e) {
    e.preventDefault(); var form = $(this);  var url = form.attr('action');
    $('.submit').prop('disabled',true);
    $.ajax({
      type: "POST",url: url, data: form.serialize(),
      success: function(data){ $('.get').html(data); $('.submit').prop('disabled',true); }
    });
  });

</script>
