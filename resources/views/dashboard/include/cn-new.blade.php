@extends('dashboard.layout.app')
@section('pageTitle', 'Shipment Invoice')
@section('content')
    <div class="toolbar hidden-print">
        <div class="text-right">
            <input class="btn btn-success ml-4" type="button" onclick="printDiv('printableArea')" value="Print" />
        </div>
    </div>
    <div id="printableArea">
        <div id="invoice-POS">
            <center id="top">
                <div class="info" style="box-sizing: border-box;">
                    <div class="row m-auto">
                        {{QrCode::size(150)->generate($shipment->tracking_code)}}
                    </div>
                    <div class="row tracking_code">
                        Tracking-code: {{ $shipment->tracking_code }}
                    </div>
                    {{-- <img src="data:image/png;base64,{{DNS2D::getBarcodeSVG('12', 'QRCODE')}}" alt="barcode" /> --}}
                    <h2>Consignment Note</h2>
                </div>
                <!--End Info-->
            </center>
            <!--End InvoiceTop-->
    
            <div id="mid">
                <div class="info">
                    <p> Reciepient : {{ $shipment->recipient['name']}} <br/>
                        Phone : {{ $shipment->recipient['phone'] }} </br>
                        Address : {{ $shipment->recipient['address'] }} <br>
                        Date : {{ date('F m, Y', strtotime($shipment->created_at)) }} <br>
                    </p>
                </div>
            </div>
    
            <div id="bot">
                <div id="table">
                    <table style="width:100%;float:left;text-align:center">
                        <tr class="tabletitle" style="border-bottom:1px solid silver">
                            <th>Qty</th>
                            <th>Type</th>
                            <th>Weight</th>
                            <th>Amount</th>
                        </tr>
                        <tr style="border-bottom:1px solid silver">
                            <td>1</td>
                            <td>@if ($shipment->service_type == '1') Express @else Priority @endif</td>
                            <td>{{ $shipment->weight }} Kg</td>
                            <td>{{ $shipment->amount }}</td>
                        </tr>
                        <tr class="tabletitle" style="border-bottom:1px solid silver">
                            <td></td>
                            <td class="Rate">
                                <h2>Total</h2>
                            </td>
                            <td class="payment">
                                <h2>{{ $total_price }}</h2>
                            </td>
                        </tr>
    
                    </table>
                </div>
                <div id="legalcopy">
                    <p class="legal"><strong>Thank you for your business!</strong> .
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style type="text/css">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */
        }

        #invoice {
            padding: 30px
        }

        .invoice {
            position: relative;
            background-color: #fff;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,
        .invoice table th {
            padding: 15px;
            background: transparent;
            border-bottom: 1px solid #fff;
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty,
        .invoice table .total,
        .invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #161718;
            font-size: 1.2em;
            border-top: 1px solid #464b4e;
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px !important;
                overflow: hidden !important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }

    </style>
@endpush
@push('script')
<script type="text/javascript">
    function printDiv() {
        var divToPrint = document.getElementById('DivIdToPrint');
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        newWin.document.close();
        setTimeout(function() {
            newWin.close();
        }, 10);
    }
</script>
@endpush
