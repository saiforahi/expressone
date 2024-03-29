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
                    <div class="widget-content-right">
                        <?php $shipments = \DB::table('shipments')
                            ->where('merchant_id', Auth::guard('user')->user()->id)
                            ->count(); ?>
                        <div class="widget-numbers text-white"><span> {{ $shipments }}</span></div>
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
                        <?php $delivered = \DB::table('shipments')
                            ->where('merchant_id', Auth::guard('user')->user()->id)
                            ->where('shipping_status', '6')
                            ->orWhere('shipping_status', '6.5')
                            ->count(); ?>
                        <div class="widget-numbers text-white"><span> {{ $delivered }}</span></div>
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
                        <?php $rejected = \DB::table('shipments')
                            ->where('merchant_id', Auth::guard('user')->user()->id)
                            ->where('shipping_status', '5')
                            ->count(); ?>
                        <div class="widget-numbers text-white"><span> {{ $rejected }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header"> Your Shipment &nbsp; <a href="{{ route('merchant.addShipment') }}"
                        class="btn btn-success"><i class="fa fa-plus-circle"></i>Add New Shipment</a> </div> <br>
                <div class="container-fluid table-responsive">
                    <table id="dashboardDatatable"
                        class="align-middle mb-0 table table-borderless table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>##</th>
                                <th>Shipping Type</th>
                                <th class="text-center">Status</th>
                                <th>Tracking No.</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">COD Amount</th>
                                <th class="text-center">Weight</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shipment as $key => $shipments)
                                <tr>
                                    <td> {{ ++$key }}</td>
                                    <td>
                                        <form action="{{ route('setShippingCharge', $shipments['id']) }}"
                                            id="formSubmit_{{ $shipments['id'] }}" method="post">
                                            @csrf
                                            <select name="result[{{ $shipments['id'] }}]" class="form-control"
                                                onchange="formSubmit({{ $shipments['id'] }})">
                                                <option value="">Select Type</option>
                                                @foreach ($shippingCharges as $shipping)
                                                    <option value="{{ $shipping->id }}"
                                                        {{ $shipping->id == $shipments['shipping_charge_id'] ? 'selected' : '' }}>
                                                        {{ $shipping->consignment_type }}-{{ $shipping->shipping_amount }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.include.shipping-status',
                                        ['status'=>$shipments['status'],'shipping_status'=>$shipments['shipping_status']])
                                    </td>
                                    <td><a href="/tracking?code={{ $shipments['tracking_code'] }}"
                                            target="_blank">{{ $shipments['tracking_code'] }}
                                        </a></td>
                                    <td class="text-center">
                                        <p class="mb-0">
                                            {{ date('F j, Y', strtotime($shipments['updated_at'])) }} </p>

                                    </td>
                                    <td style="font-size: 13px">
                                           {{ $shipments->recipient['name'] }} <br>
                                           {{ $shipments->recipient['phone'] }} <br>
                                           {{ $shipments->recipient['address'] }}
                                    </td>

                                    <td>
                                        {{ $shipments['amount'] }}
                                    </td>

                                    <td>
                                        {{ $shipments['weight'] }}
                                    </td>
                                    <td>
                                        @if ($shipments['status'] == 1 && $shipments['shipping_status'] == 0)
                                            <form style="display: inline-block" class="form-delete" method="post"
                                                action="{{ url('shipment-delete', $shipments['id']) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash text-white"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('merchant.editShipment', $shipments['id']) }}"
                                                class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
                                        @endif
                                        <a href="/shipment-details/{{ $shipments['id'] }}"
                                            class="btn btn-primary btn-sm viewMore"><i class="fa fa-search-plus"></i></a>
                                        <a href="{{ route('pdf.shipment', $shipments['id']) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-file-pdf"></i></a>

                                        <a target="_blank" href="{{ route('merchant.shipmentCn', $shipments['id']) }}"
                                            class="btn btn-primary btn-sm">
                                            CN</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table> <br>
                </div>
                <div class="d-block text-center card-footer">

                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <style type="text/css">
        .modal-backdrop {
            display: none;
        }

        .modal-dialog {
            margin-top: 6%;
        }

    </style>
@endpush
@push('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#dashboardDatatable').dataTable({
                order: [
                    [0, 'desc']
                ]
            })
        })
        //Set shipping charage
        function formSubmit(id) {
            $('#formSubmit_' + id).submit();
        }
    </script>
@endpush
