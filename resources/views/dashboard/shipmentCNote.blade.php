@extends('dashboard.layout.app')
@section('pageTitle', 'Shipment Invoice')
@section('content')
    <div class="toolbar hidden-print">
        <div class="text-right">
            <input class="btn btn-success ml-4" type="button" onclick="printDiv('printableArea')" value="Print" />
        </div>
    </div>
    <div id="printableArea">
        <div id="invoice">

            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <a target="_blank" href="{{ url('/') }}">
                                    <img width="150" src="{{ asset('logo') }}/{{ basic_information()->company_logo }}"
                                        alt="Logo">
                                </a>
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    {{-- <a target="_blank" href="https://lobianijs.com">
                                        Arboshiki
                                    </a> --}}
                                </h2>
                                <div>{{ basic_information()->address }}</div>

                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                {{-- <div class="text-gray-light">INVOICE TO:</div> --}}
                                <h4 class="to">{{ $shipment->name }}</h4>
                                <div class="address">{{ $shipment->address }}</div>
                                <div class="email">{{ $shipment->phone }}</div>
                            </div>
                            <div class="col invoice-details">
                                <h4 class="invoice-id">Tracking no: {{ $shipment->tracking_code }}</h4>
                                <div class="date font-weight-bold">Date of CN Print: {{ date('F j, Y H:i:s') }}</div>
                            </div>
                        </div>
                        <table border="0" cellspacing="0" cellpadding="0" class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Shipment info</th>
                                    <th class="text-right">COD Amount</th>
                                    <th class="text-right">Delivery Charge</th>
                                    <th class="text-right">Weight Charge</th>
                                    <th class="text-right">Cashpaid</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\MerchantPayment::where('shipment_id',$shipment->id)->get() as $payment)
                                <tr>
                                    <td>Invoice ID: {{$shipment->invoice_id}}</td>
                                    <td class="text-right">{{$shipment->amount}}</td>
                                    <td class="text-right">{{$shipment->payment_detail->delivery_charge}}</td>
                                    <td class="text-right">{{$shipment->payment_detail->weight_charge}}</td>
                                    <td class="text-right">{{$payment->amount}}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                {{-- <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Sub Total</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">XYZ</td>
                                    <td></td>
                                </tr> --}}
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Total Cash Paid</td>
                                    <td>{{\App\Models\MerchantPayment::where('shipment_id',$shipment->id)->sum('merchant_payments.amount')}} tk</td>
                                </tr>
                            </tfoot>
                        </table>

                    </main>
                </div>

                <div></div>
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
    <script>
        // Shorthand for $( document ).ready()
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
