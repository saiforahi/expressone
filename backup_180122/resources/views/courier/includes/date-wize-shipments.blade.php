<table id="datatable" class="table table-striped table-bordered dataTable no-footer dtr-inline">
    <thead>
        <tr class="bg-dark">
            <th>Date</th>
            <th>Customer info</th>
            <th>Assigned By</th>
            <th>Amount</th>
            <th>Delivery location</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shipments as $courierShipment)

            <tr>
                <td>
                    Date: {{ date('M d, Y H:i', strtotime($courierShipment->created_at)) }} <br>
                    TracingCode: {{ $courierShipment->shipment->tracking_code }}
                </td>
                <td>
                    {{ $courierShipment->shipment->recipient }}<br />
                </td>
                <td>
                    {{  $courierShipment->admin->first_name }} -
                    {{ $courierShipment->admin->last_name }}
                </td>
                <td>
                    @if ($courierShipment->shipment->amount == 0)
                    Pay by merchant ({{ $courierShipment->shipment->amount }})
                    @else
                    Pay by customer ({{ $courierShipment->shipment->amount  }})
                    @endif
                </td>
                <td> {{ $courierShipment->shipment->pickup_location->name }} </td>
                <td>
                    @include('dashboard.include.shipping-status',['status'=>$courierShipment->shipment->status,'shipping_status'=>$courierShipment->shipment->shipping_status])
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
