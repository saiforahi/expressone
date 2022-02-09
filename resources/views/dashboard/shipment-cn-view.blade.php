@extends('dashboard.layout.app')
@section('pageTitle', 'Consignment Note')
@section('content')
    <div class="right_col" role="main">
        <div class="x_panel">
            @include('dashboard.include.cn')
            <div class="row">
                <button value='Print' onclick='printDiv();' class="btn btn-info pull-right"><i class="fa fa-print"></i>
                    Print</button>
            </div>
        </div>
    </div>
@endsection
