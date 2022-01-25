<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $shipment->invoice_id }}</title>
    <style>
        .table {
            margin-top: 100px;
            border-collapse: collapse;
            border-spacing: 0;
            margin-left: auto;
            margin-right: auto
        }

        .img1 {
            margin-top: 30px
        }
        .table td {
            border-color: #000;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 9px 18px;
            word-break: normal
        }

        .table th {
            border-color: #000;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: 400;
            overflow: hidden;
            padding: 9px 18px;
            word-break: normal
        }

        .table .table-0pky {
            text-align: left;
            vertical-align: top
        }

        .extra-border-first {
            border-right: 0px solid #fff !important
        }

        .extra-border {
            border-left: 0 solid #fff !important
        }

        .text-margin {
            margin-top: 0;
            margin-bottom: 0
        }

        @media screen and (max-width:786px) {
            .table {
                width: 100%
            }

            .img1 {
                height: 100px;
                width: 90px;
                margin-top: 35px;
                margin-left: 12px
            }

            .img2 {
                height: 80px;
                width: 100%
            }
        }

    </style>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th class="table-0pky extra-border-first" colspan="2">
                    <div>
                        <div class="top-section" style="font-weight: bold;">MERCHENT:</div>
                    </div>
                </th>
                <th class="table-0pky extra-border" colspan="3">
                    <div>
                        <div class="top-section">
                            <div>
                                <p class="text-margin" style="font-weight: bold;">Raidilion Enterprise</p>
                                <p class="text-margin">House-165, Road-4/A, Block-F, Bashundhara R/A,</p>
                                <p class="text-margin">8801679254164</p>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <tr>
                <th class="table-0pky extra-border-first" colspan="2">
                    <div>
                        <div class="top-section" style="font-weight: bold;">CUSTOMER:</div>
                    </div>
                </th>
                <th class="table-0pky extra-border" colspan="3">
                    <div>
                        <div class="top-section">
                            <div>
                                <p class="text-margin" style="font-weight: bold;">{{ $shipment->recipient['name']}} <br/> {{$shipment->recipient['phone']}}</p>
                                {{-- <p class="text-margin">House - 36, Road-13/D, Banani, Dhaka-1213</p>
                                <p class="text-margin" style="font-weight: bold;">01844050948</p> --}}
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
            </tr>

            <tr>
                <td class="table-0pky" colspan="3"><b>INVOICE#:{{ $shipment->invoice_id }}</b></td>
                <td colspan="3">
                    <div>
                        <p class="text-margin" style="font-weight: bold; float: left; margin-right: 2rem;">Location/Area:
                            <span style="font-weight: normal;">Tejgaon</span>
                        </p>
                        <p class="text-margin" style="font-weight: bold;">Unit: <span
                                style="font-weight: normal;">Mohakhali Unit</span></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td class="table-0pky" rowspan="3" style="padding: 0.3rem;">
                        <img height="120" width="120" class="img1" src="data:image/png;base64,{{ DNS2D::getBarcodePNG(url('/', $shipment->tracking_code), 'QRCODE') }}" alt="qr">
                </td>
                <td class="table-0pky" colspan="4" rowspan="2">
                    <img class="img2" src="barcode.png" alt="qrcode" height="120" width="520">
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td class="table-0pky" style="text-align: center;" colspan="2">
                    <p style="font-weight: bold;">PARCEL ID:<span style="font-weight: normal;">2112A7TUBJCIX</span></p>
                </td>
                <td class="table-0pky" style="text-align: center;" colspan="2">
                    <p style="font-weight: bold;">PARCEL CREATED:<span style="font-weight: normal;">2021-12-07
                            15:16</span></p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
