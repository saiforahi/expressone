@extends('admin.layout.app')
@section('title','Payments')
@section('content')
  <div class="right_col" role="main">
    <div class="row">
      <div class="x_panel">
        <div class="page-title">
          <div class="title_left" style="width:20%"><h3>All Payments</h3> </div>
          {{-- <div class="title_right text-right" style="width:80%;">
            @include('admin.payment.load.payment-filter')
          </div> --}}
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                <thead>
                <tr class="bg-dark">
                    <th>Date</th>
                    <th>Merchant Info</th>
                    <th>Sipment Info</th> 
                    <th>Paid amount</th>
                    <th>Merchant Collected</th>
                    <th class="text-right">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                  <tr>
                    <td>{{date('M d, y',strtotime($payment->created_at))}}</td>
                    <td>{{$payment->shipment->merchant->first_name}}<br>{{$payment->shipment->merchant->phone}}</td>
                    <td>COD: {{$payment->shipment->payment_detail->cod_amount}}<br>
                        Delivery Charge: {{$payment->shipment->payment_detail->delivery_charge}}<br>
                        Weight Charge: {{$payment->shipment->payment_detail->weight_charge}}
                    </td>
                    <td>
                      {{$payment->amount}}
                    </td>
                    <td>{{$payment->collected_by_merchant ? 'Yes':'No'}}</td>
                    <td class="text-right">
                      {{-- <button class="btn btn-xs btn-warning reset" id="{{$payment->id}}">Reset</button> --}}
                      <a href="/admin/payment-details/{{$payment->id}}" target="_blank" class="btn btn-xs btn-info">View</a>
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

 <div class="modal fade resetModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Reset payment
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> </h5>
        </div>
        <div class="modal-body">
            <form action="" method="post">@csrf
              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 text-right m-t-7">Reset payment as</label>
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
                  <button class="btn btn-info" type="submit"><i class="fa fa-undo"></i> Reset payment</button>
                </div>
              </div>   <input type="hidden" name="id">
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
@push('style')
<style>
  select{
    padding:4.1px
  }
</style>
@endpush
@push('scripts')
<script>
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