<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    <thead>
      <tr class="headings selected">
   
		<th><input type="checkbox"  id="checkall" onClick="checkAll();"/></th>
        <th class="column-title">Customer info </th>
        <th class="column-title">Invoice ID</th>
        <th class="column-title">Source Hub</th>
        <th class="column-title">Date </th>
        <th class="text-center">Status </th>	
        <th class="text-center">Action</th>		
      </tr>
    </thead>

    @foreach($shipments as $shipment)
      
      <tr class="row{{$shipment->id}}">
        <td> 
            <input type="checkbox" class="checkbox" id="ids" name="ids[]" value="{{$shipment->id}}">
        </td>
        <td>{{$shipment->recipient['name']}} - {{$shipment->recipient['phone']}}</td>
        <td>{{$shipment->invoice_id}}</td>
        <td>{{$shipment->pickup_location->point->unit->name}}</td>
        <td>{{date('M d, Y H:i',strtotime($shipment->created_at))}}</td>
        <td class="text-right">
         @include('admin.shipment.status',['status'=>$shipment->status,'logistic_status'=>$shipment->logistic_status])
        </td>
        <td class="text-center">
          <a class="btn csv_file btn-sm btn-default" onclick="get_csv({{$shipment->id}})">CSV</a>
          <a class="btn csv_file btn-sm btn-default" onclick="get_pdf({{$shipment->id}})">PDF</a>
        </td>
      </tr>
    @endforeach
      
    </tbody>
  </table>
</div>

<script >

    function checkAll() {
        if($('#checkall').prop("checked") == true){
            $('.checkbox').prop('checked',true)
        }else if($('#checkall').prop("checked") == false){
            $('.checkbox').prop('checked',false)
        }        
    }

</script>