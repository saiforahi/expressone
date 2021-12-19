@extends('dashboard.layout.app')
@section('pageTitle', 'Shipment view')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-truck text-success">
                    </i>
                </div>
                <div class="page-title-subheading">
                    <p>The shipment current status</p>
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
                                <th>Customer name</th>
                                <th>Contact no</th>
                                <th>Customer Address</th>
                                <th>COD Amount</th>
                                <th>Delivery Charge</th>
                                <th>Weight charge</th>
                                <th>Merchante note</th>
                                <th>Created At</th>
                                <th>QR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $shipment->invoice_id }}</td>
                                <td>{{ $shipment->name }}</td>
                                <td>{{ $shipment->phone }}</td>
                                <td>{{ $shipment->address }}</td>
                                <td>{{ $shipment->cod_amount }}</td>
                                <td>
                                    @if ($shipment->delivery_charge == null)
                                        0
                                    @else
                                        {{ $shipment->delivery_charge }}
                                    @endif
                                </td>
                                <td>
                                    @if ($shipment->weight_charge == null)
                                        0
                                    @else
                                        {{ $shipment->weight_charge }}
                                    @endif
                                </td>
                                <td>
                                    @if ($shipment->merchant_note == null)
                                        -
                                    @else
                                        {{ $shipment->merchant_note }}
                                    @endif
                                </td>
                                <td>{{ date('F m, Y', strtotime($shipment->created_at)) }}</td>
                                <td>
                                    QR Code
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
