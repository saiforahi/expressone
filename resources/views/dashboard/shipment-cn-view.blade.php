@extends('dashboard.layout.app')
@section('pageTitle', 'Consignment Note')
@section('content')
    <div class="toolbar hidden-print">
        <div class="text-right">
            <input class="btn btn-success ml-4" type="button" onclick="printDiv('printableArea')" value="Print" />
        </div>
    </div>
    @include('dashboard.include.cn')
@endsection
