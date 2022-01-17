<?php

namespace App\Http\Controllers\Merchant;
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
    public function addEditShipment(Request $request, $id = null)
    {
        if ($id == "") {
            // Add Shipment
            $shipment = new Shipment();
            $title = "Add Shipment";
            $buttonText = "Save Shipment";
            $message = "Shipment has been saved successfully!";
        } else {
            // Update Shipment
            $shipment = Shipment::find($id);
            $title = "Edit Shipment";
            $buttonText = "Update Shipment";
            $message = "Shipment has been updated successfully!";
        }
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $messages = [
                "recipient.required" => "Please enter corrent recipient informations",
                "pickup_location_id.required" => "Please enter pickup_location_id.",
                "shipping_charge_id.required" => "Please select shipping charge",
                "amount.required" => "Please enter amount",
            ];
            $request->validate([
                'recipient' => 'required|max:100',
                "amount" => 'required',
                "shipping_charge_id" => 'required'
            ], $messages);
            $shipment->recipient = $request->recipient;
            $shipment->tracking_code = $request->tracking_code;
            $shipment->invoice_id = $request->invoice_id;
            $shipment->shipping_charge_id = $request->shipping_charge_id;
            $shipment->pickup_location_id = $request->pickup_location_id;
            $shipment->weight = $request->weight;
            $shipment->amount = $request->amount;
            $shipment->note = $request->note;
            $shipment->merchant_id = Auth::guard('user')->user()->id;
            $shipment->added_by()->associate(Auth::guard('user')->user());
            $shipment->save();
            return redirect()->route('merchant.dashboard')->with('success', $message);
        }
        $data['area'] = Unit::where('status', 1)->get();
        $data['shippingCharges'] = ShippingCharge::select('id', 'consignment_type', 'shipping_amount')->get();
        $data['locations'] = Location::select('id', 'name', 'point_id')->get();
        $tracking_code = uniqid();
        //Invoice ID
        $invoice_data = Shipment::orderBy('id', 'desc')->first();
        if ($invoice_data == null) {
            $firstReg = '0';
            $data['invoice_no'] = $firstReg + 1;
            //dd($invoice_no);
        } else {
            $invoice_data = Shipment::orderBy('id', 'desc')->first()->invoice_id;
            $data['invoice_no'] = $invoice_data + 1;
        }
        return view('dashboard.addEditShipment', $data, compact('title', 'buttonText', 'shipment', 'tracking_code'));
    }

    function show(Shipment $shipment)
    {
        $title = "Shipment Details";
        return view('dashboard.shipment-view', compact('shipment','title'));
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
            //code...
            Shipment::find($id)->delete();
            return back()->with('message', 'Shipment has been deleted successfully!');
        } catch (\Throwable $th) {
            throw $th;
            return back()->with('message', 'Shipment has been deleted successfully!' . $th);
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
        // $shipment = Shipment::orderBy('id','DESC')->where('user_id', Auth::guard('user')->user()->id)->get();
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
