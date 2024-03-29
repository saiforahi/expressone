<?php

namespace App\Http\Controllers\Merchant;

use App\Events\ShipmentMovement;
use App\Model\Area;
use App\Models\Unit;
use App\ShippingPrice;
use App\Models\Location;
use App\Models\Shipment;
use App\Models\ShipmentPayment;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Models\LogisticStep;
use Illuminate\Support\Facades\Auth;

class ShipmentController extends Controller
{
    public function index()
    {
        $data['area'] = Unit::where('status', 1)->get();
        $data['shippingCharges'] = ShippingCharge::select('id', 'consignment_type', 'shipping_amount')->get();
        //$data['locations'] = Location::select('id', 'name', 'point_id', 'unit_id')->get();
        return view('dashboard.shipment-create', $data);
    }
    public function addShipment(Shipment $shipment)
    {
        $data['title'] = "Add Shipment";
        $data['area'] = Unit::where('status', 1)->get();
        $data['shippingCharges'] = ShippingCharge::select('id', 'consignment_type', 'shipping_amount')->get();
        $data['locations'] = Location::select('id', 'name', 'point_id')->get();
        return view('dashboard.addShipment', $data, compact('shipment'));
    }

    public function saveShipment(Request $request, Shipment $shipment)
    {
        echo '<pre>';
        echo '======================<br>';
        print_r($request->all());
        echo '<br>======================<br>';
        exit();
        try {
            $jsonData = $request->only('name', 'phone', 'address');
            $shipment->recipient = $jsonData;
            $shipment->tracking_code = uniqid();
            $shipment->invoice_id = rand(1000, 100000);
            $shipment->shipping_charge_id = $request->shipping_charge_id;
            $shipment->pickup_location_id = $request->pickup_location_id;
            $shipment->weight = $request->weight;
            $shipment->amount = $request->amount;
            $shipment->note = $request->note;
            $shipment->merchant_id = Auth::guard('user')->user()->id;
            $shipment->logistic_status = LogisticStep::first()->id; //Setting logistic status to approval from unit/super admin
            $shipment->added_by()->associate(Auth::guard('user')->user());
            $shipment->save();
            //Make shipment Payment
            if ($shipment->save()) {
                $shipmentPmnt = new ShipmentPayment();
                $shipmentPmnt->shipment_id = $shipment->id;
                $shipmentPmnt->sl_no  = rand(1, 100000);
                $shipmentPmnt->tracking_code  = uniqid();
                $shipmentPmnt->invoice_no  = rand(2222, 222222);
                $shipmentPmnt->cod_amount  = $shipment->amount;
                $shipmentPmnt->delivery_charge  = $shipment->shipping_charge_id;
                $shipmentPmnt->admin_id  = Auth::guard('user')->user()->id;
                $shipmentPmnt->save();
                event(new ShipmentMovementEvent($shipment, LogisticStep::first(), Auth::guard('user')->user()));
            }
            return redirect()->back()->with('success', 'Shipment has been saved successfully');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Shipment not saved');
        }
    }

    public function editShipment(Shipment $shipment)
    {

        $data['title'] = "Update Shipment";
        $data['area'] = Unit::where('status', 1)->get();
        $data['shippingCharges'] = ShippingCharge::select('id', 'consignment_type', 'shipping_amount')->get();
        $data['locations'] = Location::select('id', 'name', 'point_id')->get();
        return view('dashboard.editShipment', $data, compact('shipment'));
    }


    public function updateShipment(Request $request, Shipment $shipment)
    {
        try {
            $jsonData = $request->only('name', 'phone', 'address');
            $shipment->recipient = $jsonData;
            $shipment->tracking_code = uniqid();
            $shipment->invoice_id = rand(1000, 100000);
            $shipment->shipping_charge_id = $request->shipping_charge_id;
            $shipment->pickup_location_id = $request->pickup_location_id;
            $shipment->weight = $request->weight;
            $shipment->amount = $request->amount;
            $shipment->note = $request->note;
            $shipment->merchant_id = Auth::guard('user')->user()->id;
            $shipment->logistic_status = LogisticStep::first()->id; //Setting logistic status to approval from unit/super admin
            $shipment->added_by()->associate(Auth::guard('user')->user());
            $shipment->update();
            return redirect()->back()->with('success', 'Shipment has been saved successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Shipment not saved');
        }
    }



    function show(Shipment $shipment)
    {
        $title = "Shipment Details";
        return view('dashboard.shipment-view', compact('shipment', 'title'));
    }
    function shipmentConsNote(Shipment $shipment)
    {
        $zone = Location::find($shipment->pickup_location_id);
        $price = $shipment->delivery_charge;
        $total_price = $shipment->cod_amount;
        return view('dashboard.shipmentCNote', compact('shipment', 'zone', 'price', 'total_price'));
    }

    function shipment_pdf(Shipment $shipment)
    {
        $mpdf = PDF::loadView('dashboard.shipment_pdf_new', compact('shipment'));
        return $mpdf->download('Invoice-' . $shipment->invoice_id . '.pdf');
        //return $mpdf->Output('Invoice-' . $shipment->invoice_id . '.pdf', 'D');
        //return $mpdf->Output('MyPDF.pdf', 'D');
    }

    function shipmentInvoice($id)
    {
        $data['title'] = "Invoice";
        $data['shipment'] = Shipment::findOrFail($id);
        set_time_limit(300);
        $pdf = PDF::loadView('dashboard.shipment_pdf', $data);
        return $pdf->stream();
    }

    public function shipmentDelete($id)
    {

        try {
            Shipment::find($id)->delete();
            return back()->with('message', 'Shipment has been deleted successfully!');
        } catch (\Throwable $th) {
            dd($th);
            return back()->with('message', 'Something went wrong' . $th);
        }
    }


    public function rateCheck(Request $request)
    {
        $price = 0;
        $total_price = 0;
        $cod_type = 0;
        $cod_amount = 0;
        if (!$request->area) {
            return ['status' => 'error', 'message' => 'Please select the area first.'];
        }
        $zone = Unit::find($request->area);

        if (!$shipping) {
            return ['status' => 'error', 'message' => 'Sorry, not any shipping rate set this zone'];
        }
        if ($shipping->cod == 1) {
            $cod_type = 1;
            if (!$request->parcel_value) {
                // return ['status' => 'error', 'message' => 'Please declared your parcel value first.'];
                $cod_amount = 0;
            } else {
                $cod_amount = (int) (((int) $request->parcel_value / 100) * $shipping->cod_value);
            }
        }

        if (!$request->weight) {
            return ['status' => 'error', 'message' => 'Please enter your product weight'];
        } else {
            $weight = (float) $request->weight;
            if ($weight > $shipping->max_weight) {
                $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
                if ((int) $ExtraWeight < $ExtraWeight) {
                    $ExtraWeight = (int) $ExtraWeight + 1;
                }
                $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
            } else {
                $price = (int) $shipping->max_price;
            }
        }

        $total_price = $price + $cod_amount + (int) $request->parcel_value;

        return ['status' => 'success', 'total_price' => $total_price, 'price' => $price, 'cod' => $cod_type, 'cod_amount' => $cod_amount, 'cod_rate' => $shipping->cod_value];
    }




    function shipment_pdf_old(Shipment $shipment)
    {
        $zone = Area::find($shipment->area_id);
        $shipping = ShippingPrice::where('zone_id', $zone->zone_id)->where('delivery_type', $shipment->delivery_type)->first();

        $weight = (float) $shipment->weight;
        if ($weight > $shipping->max_weight) {
            $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
            if ((int) $ExtraWeight < $ExtraWeight) {
                $ExtraWeight = (int) $ExtraWeight + 1;
            }
            $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
        } else {
            $price = (int) $shipping->max_price;
        }

        $total_price = $price + (int) $shipment->parcel_value;
        // return view('dashboard.shipment-pdf', compact('shipment','price','total_price','shipping'));
        $pdf = PDF::loadView('dashboard.shipment-pdf', compact('shipment', 'price', 'total_price', 'shipping'));
        return $pdf->download('Invoice-' . $shipment->invoice_id . '.pdf');
    }



    public function payments()
    {
        // $shipment = Shipment::orderBy('id','DESC')->where('merchant_id', Auth::guard('user')->user()->id)->get();
        return view('dashboard.shipment-payment');
    }

    public function payments_loading()
    {
        return DataTables::of(Shipment::orderBy('id', 'DESC'))
            ->addColumn('action', function ($shipment) {
                return '<a href="/shipment-details/' . $shipment->id . '">View</a> |
            <button type="button" class="btnNew" id="' . $shipment->id . '">Payment</button>';
            })
            ->addColumn('id', function ($shipment) {
                return $shipment->id;
            })
            ->addColumn('tracking_code', function ($shipment) {
                return $shipment->tracking_code;
            })
            ->addColumn('invoice_no', function ($shipment) {
                return $shipment->invoice_id;
            })
            ->addColumn('payment_by', function ($shipment) {
                if ($shipment->cod_amount == 0) {
                    $price = 'Merchant will pay';
                } else $price = 'Reciepient will pay';
                return $price;
            })
            ->addColumn('amount', function ($shipment) {
                $price = 0;
                $zone = Area::find($shipment->area_id);
                $shipping = ShippingPrice::where('zone_id', $zone->id)->first();
                if ($shipping != '') {
                    if ($shipping->cod == 1 && $shipping != null) {
                        $cod_type = 1;
                        if (!$shipment->parcel_value) {
                            $cod_amount = 0;
                        } else {
                            $cod_amount = ((int) $shipment->parcel_value / 100) * $shipping->cod_value;
                        }
                    }
                    $weight = (float) $shipment->weight;
                    if ($weight > $shipping->max_weight) {
                        $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
                        if ((int) $ExtraWeight < $ExtraWeight) {
                            $ExtraWeight = (int) $ExtraWeight + 1;
                        }
                        $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
                    } else {
                        $price = (int) $shipping->max_price;
                    }
                    $total_price = $price + (int) $shipment->parcel_value;
                    if ($shipment->price == 0) return $price . ' Tk';
                    else return $total_price . ' Tk';
                } else {
                    $price = (int)$shipment->cod_amount - (int) $shipment->delivery_charge;
                    return '<span class="text-danger">' . $price . ' Tk</span>';
                }
            })
            ->rawColumns(['id', 'tracking_code', 'invoice_no', 'payment_by', 'amount', 'action'])->make(true);
    }

    function show_payment(Shipment $shipment)
    {
        $payments =  ShipmentPayment::where('shipment_id', $shipment->id)->get();
        return view('dashboard.include.shipment-delivery-payment', compact('payments'));
    }
}
