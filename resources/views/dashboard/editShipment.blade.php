@extends('dashboard.layout.app')
@section('pageTitle', 'Prepare Shipment')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-location-arrow text-success" aria-hidden="true"></i>
                </div>
                <div>{{ $title }}
                    <div class="page-title-subheading">Fill in your details to prepare the shipment label
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        @include('flash.message')
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <form id="upload_form" action="{{ route('merchant.updateShipment', $shipment->id) }}" method="POST">
                @method('put')
                @include('dashboard._shipmentForm', ['buttonText' => 'Update Shipment'])
            </form>
        </div>
    </div>
@endsection
@push('style')
@endpush

@push('script')

@endpush
