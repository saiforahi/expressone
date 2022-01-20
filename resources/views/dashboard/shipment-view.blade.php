@extends('dashboard.layout.app')
@section('pageTitle', 'Shipment view')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-location-arrow text-success" aria-hidden="true"></i>
                </div>
                <div>{{ $title }}
                    <div class="page-title-subheading">Shipment Details
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Shipment Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Ref.</th>
                                <th>Tracking Code</th>
                                <th>Customer Details</th>
                                <th>COD Amount</th>
                                <th>Delivery Charge</th>
                                <th>Weight</th>
                                <th>Merchante note</th>
                                <th>Created At</th>
                                <th>QR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $shipment->invoice_id }}</td>
                                <td>{{ $shipment->tracking_code }}</td>
                                <td>
                                    {{ $shipment['recipient']['name']}} <br>
                                </td>
                                <td>{{ $shipment->amount }}</td>
                                <td>
                                    {{ $shipment->shippingCharge->shipping_amount }} - {{ $shipment->shippingCharge->consignment_type }}
                                </td>
                                <td>
                                    {{ $shipment->weight }}
                                </td>
                                <td>
                                     {{  $shipment->note  }}
                                </td>
                                <td>{{ date('F m, Y', strtotime($shipment->created_at)) }}</td>
                                <td>
                                    {{ QrCode::size(150)->generate($shipment->tracking_code) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
