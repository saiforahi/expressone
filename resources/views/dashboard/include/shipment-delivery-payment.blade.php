@extends('dashboard.layout.app')
@section('pageTitle', 'payment info')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header"> Shipment Payment</div> <br>
                <div class="container table-responsive">
                    <table id="shipmnets" class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th>##</th>
                                <th>Shipment info</th>
                                <th>Payment by</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $key => $payment)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>Customer: {{ $payment->shipment->recipient['name'] }} <br>
                                        InvoiceID: {{ $payment->shipment->invoice_id }} <br>
                                    </td>
                                    <td>
                                        {{ $payment->paid_by->first_name }}
                                    </td>
                                    <td>{{ $payment->amount }} Tk</td>
                                    <td>{{ date('M d, Y', strtotime($payment->updated_at)) }}</td>
                                    <td>
                                        @if ($payment->collected_by_merchant == false)
                                            <button onclick="mark_received(<?php echo $payment->id; ?>)"
                                                class="btn btn-xs pull-left btn-warning" type="button">Mark Received</button>
                                        @else
                                            Collected
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            @if ($payments->count() < 1)
                                <tr>
                                    <td colspan="5">No payment for this Shipment yet!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function mark_received(payment_id) {
            if (confirm('Are you sure to mark this payment as received?') == true) {
                $.ajax({
                    type: "get",
                    url: '<?php echo '/mark-payment-received/'; ?>' + payment_id,
                    success: function(data) {
                        // $('.audit-result').html(data);
                        location.reload();
                    }
                });
            }
        }
    </script>
@endsection
