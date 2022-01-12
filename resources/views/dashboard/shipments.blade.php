@extends('dashboard.layout.app')
@section('pageTitle', 'Merchant Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Shipment</div>
                        <div class="widget-subheading">All shipment request</div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Shipment Delivered</div>
                        <div class="widget-subheading">How many shipment Delivered</div>
                    </div>
                    <div class="widget-content-right">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Shipment Reject</div>
                        <div class="widget-subheading">If any shipment rejected</div>
                    </div>
                    <div class="widget-content-right">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')

@endpush
@push('script')

@endpush
