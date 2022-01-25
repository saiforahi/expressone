<table class="table table-striped">
  <thead>
    <tr class="bg-dark">
      <th>Parcel</th>
      <th>Time</th>
      <th>Comment</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($audit_logs as $key=>$log)
      @if($log->logistic_step_id != 0)
      <tr>
        <td>Status: <b class="budge">{{$log->logistic_step->step_name}}</b> <br>By: {{$log->action_made_by->first_name}}</td>
        <td>{{$log->updated_at}}</td>
        <td>@if($log->shipment->note==null)N/A @else {{$log->shipment->note}} @endif</td>
      </tr>
      @endif
    @endforeach

  </tbody>
</table>
