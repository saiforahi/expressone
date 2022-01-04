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
                            ->where('user_id', Auth::guard('user')->user()->id)
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
                            ->where('user_id', Auth::guard('user')->user()->id)
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
                            ->where('user_id', Auth::guard('user')->user()->id)
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
                <div class="card-header">Your Shipment</div> <br>
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
                                <th class="text-center">COD Amt.</th>
                                <th class="text-center">Wgt. charge</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ((array) $shipments as $shipment) --}}
                            @if (is_array($shipments) || is_object($shipments))
                                @foreach ($shipments as $shipment)
                                    <tr>
                                        <td> ++$key }}</td>
                                        <td>
                                            <form action="{{ route('setShippingCharge', $shipment->id ) }}"
                                                id="formSubmit_{{ $shipment->id }}" method="post">
                                                @csrf
                                                <select name="result[{{ $shipment->id }}]" class="form-control"
                                                    onchange="formSubmit({{ $shipment->id }})">
                                                    <option value="">Select Type</option>
                                                    @foreach ($shippingCharges as $shipping)
                                                        <option value="{{ $shipping->id }}"
                                                            {{ $shipping->id == $shipment->shipping_charge_id ? 'selected' : '' }}>
                                                            {{ $shipping->consignment_type }}-{{ $shipping->shipping_amount }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            @include('dashboard.include.shipping-status',
                                            ['status'=>$shipment->status,'shipping_status'=>$shipment->shipping_status])
                                        </td>
                                        <td><a style="color: #495057;text-decoration: none"
                                                href="/tracking?code={{ $shipment->tracking_code }}"
                                                target="_blank">{{ $shipment->tracking_code }}
                                            </a></td>
                                        <td class="text-center">
                                            <p style="color: black;font-size: 15px" class="mb-0">
                                                {{ $shipment->updated_at->format('d M') }}</p>
                                            {{ $shipment->updated_at->format('Y') }}
                                        </td>
                                        <td class="" style="font-size: 13px">
                                            <i class="fa fa-user mr-1" aria-hidden="true"></i>{{ $shipment->name }}<br>
                                            <i class="fa fa-phone-square mr-1"
                                                aria-hidden="true"></i>{{ $shipment->phone }}
                                        </td>

                                        <td>
                                            {{ $shipment->cod_amount }}
                                        </td>

                                        <td>
                                            {{ $shipment->weight_charge }}
                                        </td>
                                        <td>
                                            @if ($shipment->status == '1' && $shipment->shipping_status == '0')
                                                <form style="display: inline-block" class="form-delete" method="post"
                                                    action="{{ url('shipment-delete', $shipment->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fa fa-trash text-white"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('editShipment', $shipment->id) }}"
                                                    class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
                                            @endif
                                            <a href="/shipment-info/{{ $shipment->id }}"
                                                class="btn btn-primary btn-sm viewMore"><i
                                                    class="fa fa-search-plus"></i></a>
                                            <a href="{{ route('pdf.shipment', $shipment->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-file-pdf"></i></a>
                                            <a href="{{ route('merchant.shipmentCn', $shipment->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-print"></i></a>
                                            {{-- <a target="_blank" href="{{ route('shipmentInvoice', $shipments->id) }}"
                                        class="btn btn-primary btn-sm">
                                        Invoice</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
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