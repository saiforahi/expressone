{{-- @foreach($shipments as $key=>$shipment ) --}}
	<table class="table table-xs" style="background:#f2f3f4;margin-bottom: 2em;font-size: 12px;">
      <tbody>
        <tr>
          <td>Invoice ID: {{$shipment->invoice_id}}</td>
          <td></td><td class="text-right"> 
            <select class="select select2_single" id="area{{$shipment->id}}" disabled>
              <option>{{$shipment->pickup_location->name}}</option>
          </select> </td>
        </tr>
        <tr><td>Tracking Code: {{$shipment->tracking_code}}</td></tr>
        <tr>
          <td>Customer: {{$shipment->recipient['name']}} </td>
          <td></td><td></td>
        </tr>
        <tr>
          <td>Price: {{$shipment->payment_detail->cod_amount}}</td>
          <td></td><td class="text-right">
            Weight: <input style="width:100px" type="number" id="weight{{$shipment->id}}" value="{{$shipment->weight}}" readonly=""></td>
        </tr>
        <tr>
          <td>Phone: {{$shipment->recipient['phone']}} </td>
          <td></td><td class="text-right">Unit: {{$shipment->pickup_location->point->unit->name}}</td>
        </tr>
        <tr>
          <td colspan="3">Address: {{$shipment->recipient['address']}} </td>  
        </tr>
        <tr class="text-right">
          <td class="text-left" style="width:50%">Date: <small>{{date('M d, Y',strtotime($shipment->created_at))}} (<b class="text-info">{{$shipment->created_at->diffForHumans()}}</b>)</small> </td>
          <td></td>
          <td></td>
        </tr>
        
      </tbody>
</table>
{{-- @endforeach --}}