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
                    Tracking Code: {{ $courierShipment->shipment->tracking_code }}
                </td>
                <td>
                    {{ $courierShipment->shipment->recipient['name'] }}<br />
                    {{ $courierShipment->shipment->recipient['phone'] }}<br />
                    {{ $courierShipment->shipment->recipient['address'] }}
                </td>
                <td>
                    {{ $courierShipment->admin->first_name }} -
                    {{ $courierShipment->admin->last_name }}
                </td>
                <td>
                    {{ $courierShipment->shipment->amount }}

                </td>
                <td> {{ $courierShipment->shipment->pickup_location->name }} </td>
                <td>
                    {{ $courierShipment->status }}
                    {{-- @include('dashboard.include.shipping-status',['status'=>$courierShipment->shipment->status,'logistic_status'=>$courierShipment->shipment->logistic_status]) --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
