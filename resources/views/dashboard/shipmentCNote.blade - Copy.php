@extends('dashboard.layout.app')
@section('pageTitle', 'Shipment view')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            @include('admin.shipment.includes.zebra-gt800')

            <button value='Print' onclick='printDiv();' class="btn btn-info pull-right"><i class="fa fa-print"></i>
                Print</button>

        </div>
    </div>
    <style>
        .tracking_code,
        svg {
            margin-left: 130px;
        }

        .tracking_code {
            margin-left: 120px;
        }

    </style>
@endsection
@push('script')
    <script>
        window.addEventListener("load", window.print());
    </script>
@endpush
