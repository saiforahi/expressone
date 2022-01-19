<table class="table table-xs" id="{{ $crShipment->id }}">
    <tbody>
        <tr>
            <td>Invoice ID: {{ $crShipment->invoice_id }}</td>
            <td></td>
            <td class="text-right">
                <select class="select2 select2_single areaOp">
                    <option> Show merchant registere unit</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Customer Details: {{ $crShipment->recipient }} </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Price: {{ $crShipment->amount }}</td>
            <td></td>
            <td class="text-right">
                Weight: <input style="width:100px" type="number" value="{{ $crShipment->weight }}"></td>
        </tr>
        <tr>
            <td>Pickup location:{{  $crShipment->pickup_location->name }}</td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td class="text-left" colspan="3">Date: {{ date('M d, Y', strtotime($crShipment->created_at)) }} (<b
                    class="text-info">{{ $crShipment->created_at->diffForHumans() }}</b>) </td>
        </tr>

    </tbody>
</table>
