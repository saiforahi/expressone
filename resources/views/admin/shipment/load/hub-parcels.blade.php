<?php $units = \DB::table('units')->get(); ?>
@foreach ($shipments as $key => $item)
    <table class="table table-xs row{{ $item->id }}">
        <tbody>
            <tr>
                <td>Invoice ID: {{ $item->invoice_id }}</td>
                <td></td>
                <td class="text-right">
                    <select class="select select2_single" id="area{{ $key }}" disabled>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}" @if ($item->pickup_location->point->unit->id == $unit->id)selected @endif>
                                {{ $unit->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Customer: {{ $item->recipient['name'] }} </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Price: {{ $item->amount }}</td>
                <td></td>
                <td class="text-right">
                    Weight: <input style="width:100px" type="number" id="weight{{ $key }}"
                        value="{{ $item->weight }}" readonly=""></td>
            </tr>
            <tr>
                <td>Phone: {{ $item->recipient['phone'] }} </td>
                <td></td>
                <td class="text-right">Unit: {{ $item->pickup_location->point->unit->name }}</td>
            </tr>
            <tr>
                <td colspan="3">Address: {{ $item->recipient['address'] }} </td>
            </tr>
            <tr class="text-right">
                <td class="text-left" style="width:50%">Date:
                    <small>{{ date('M d, Y', strtotime($item->created_at)) }} (<b
                            class="text-info">{{ $item->created_at->diffForHumans() }}</b>)</small> </td>
                <td></td>
                <td>
                    <button class="btn btn-xs btn-default" onclick="move_item(<?php echo $item->id . ',' . $item->merchant_id; ?>)"><i
                            class="fa fa-arrow-left"></i> Move Back</button>
                </td>
            </tr>

        </tbody>
    </table>
@endforeach

<script type="text/javascript">
    function move_item(id, merchant_id) {
        // alert(id +' '+ merchant_id);return false;
        $.ajax({
            type: "get",
            url: '/admin/remove-hub-parcel/' + id,
            success: function(data) {
                $('.row' + id).remove();

                $(".receiving-parcels").load('/admin/receiving-parcels/' + merchant_id + '/1');

                let num = parseInt($('.num<?php echo $id; ?>').text());
                $('.num<?php echo $id; ?>').text(num - 1);
                // location.reload()
            }
        });
        setTimeout(function() {
            let num = parseInt($('.num<?php echo $id; ?>').text());
            if (num === 0) {
                $('.hub<?php echo $id; ?>').remove();
                $('#viewParcel').modal('hide');
            }
        }, 1500);
    }
</script>
