<!DOCTYPE html>
<html>

<head>
    <title>PDF shipment view</title>
</head>

<body>
    <div style="width:50%;float:left">
        <table>
            <tr>
                <th><img src="{{ asset('/images/' . basic_information()->company_logo) }}" style="height:100px"></th>
            </tr>
            <tr>
                <th style="padding-left:15px;">
                    <a
                        href="{{ basic_information()->website_link }}">{{ basic_information()->company_name }}</a><br>
                    {{ basic_information()->phone_number_one }},
                    {{ basic_information()->phone_number_two }}
                </th>
            </tr>
            <tr>
                <td style="padding-left:15px;" colspan="2">Address: {{ basic_information()->address }}<br><br></td>
                <br>
            </tr>
        </table>
    </div>
    <div style="width:50%;float:left;text-align:right;padding:25px;">
        <table style="float:right">
            <tr>
                <th><img src="data:image/png;base64, {!!base64_encode(QrCode::format('png')->size(100)->generate($shipment->tracking_code))!!} "></th>
            </tr>
            <tr>
                <td colspan="2">Date: {{ date('d F, Y') }}</td>
            </tr>
        </table>
    </div>

    <div style="width:100%;float:right;padding:15px;">
        <table>
            <tr>
                <th>
                    Current Status:
                </th>
            </tr>
            <tr>
                <td class="float:left">
                    @include('admin.shipment.status',['status'=>$shipment->status,'shipping_status'=>$shipment->shipping_status])
                </td>
            </tr>
        </table>
    </div>
    <table class="table table-bordered" style="margin-top:200px;">
        <tr>
            <td>Parcel-ID</td>
            <td>CustomerName</td>
            <td>Contact No</td>
            <td>ShopName</td>
            <td>Price</td>
            <td>Last Mile Hub</td>
        </tr>
        <tr>
            <td>{{ $shipment->invoice_id }}</td>
            <td>{{ $shipment->name }}</td>
            <td>{{ $shipment->phone }}</td>
            <td>{{ $shipment->user->shop_name }}</td>
            <td>{{ $shipment->cod_amount }}</td>
            <td> {{ $shipment->area->hub->name }} </td>
        </tr>
        <tr>
            <th colspan="2">Total Price <b>1</b></th>
            <th colspan="4" class="text-center">New worth of parcels: {{ $shipment->cod_amount }}</th>
        </tr>
    </table>

</body>

</html>
