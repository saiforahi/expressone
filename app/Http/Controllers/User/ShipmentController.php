<?php

namespace App\Http\Controllers\User;

use App\Models\Unit;
use App\Models\Shipment;
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
        $data['units'] = Unit::where('status', 1)->get();
        $data['shippingCharges'] = ShippingCharge::select('id', 'consignment_type', 'shipping_amount')->get();
        //dd($data['shippingCharges']);
        return view('dashboard.shipment', $data);
    }

    public function rateCheck(Request $request)
    {
        $price = 0;
        $total_price = 0;
        $cod_type = 0;
        $amount = 0;
        if (!$request->area) {
            return ['status' => 'error', 'message' => 'Please select the area first.'];
        }
        $zone = Area::find($request->area);
        $shipping = ShippingPrice::where('zone_id', $zone->zone_id)->where('delivery_type', $request->delivery_type)->first();
        if (!$shipping) {
            return ['status' => 'error', 'message' => 'Sorry, not any shipping rate set this zone'];
        }
        if ($shipping->cod == 1) {
            $cod_type = 1;
            if (!$request->parcel_value) {
                // return ['status' => 'error', 'message' => 'Please declared your parcel value first.'];
                $amount = 0;
            } else {
                $amount = (int) (((int) $request->parcel_value / 100) * $shipping->cod_value);
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

        $total_price = $price + $amount + (int) $request->parcel_value;

        return ['status' => 'success', 'total_price' => $total_price, 'price' => $price, 'cod' => $cod_type, 'amount' => $amount, 'cod_rate' => $shipping->cod_value];
    }
    public function shipmentSave(Request $request)
    {
        $messages = [
            "recipient.required" => "Please enter recipient name.",
            "phone.required" => "Please enter customer phone number.",
            "address.required" => "Please enter customer address.",
            "amount.required" => "Please enter amount",
            "unit_id.required" => "Please select customer area",
            "shipping_charge_id.required" => "Please select shipping charge",
        ];
        $request->validate([
            'recipient' => 'required|max:100',
            'phone' => 'required|max:20',
            'address' => 'required',
            "amount" => 'required',
            'unit_id' => 'required',
            'shipping_charge_id' => 'required'
        ], $messages);
        $insert_shipment = new Shipment();
        $insert_shipment->recipient = $request->recipient;
        $insert_shipment->phone = $request->phone;
        $insert_shipment->address = $request->address;
        $insert_shipment->unit_id = $request->unit_id;
        $insert_shipment->shipping_charge_id = $request->shipping_charge_id;
        $insert_shipment->invoice_id = rand(1000, 9999);
        $insert_shipment->tracking_code = rand(3000, 9999);
        $insert_shipment->merchant_note = $request->merchant_note;
        $insert_shipment->user_id = Auth::guard('user')->user()->id;
        $insert_shipment->added_by_id = Auth::guard('user')->user()->id;
        $insert_shipment->amount = $request->amount;
        $insert_shipment->save();
        return back()->with('message', 'Shipment has been saved successfully!');
    }
    public function PrepareShipmentEdit($id)
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $address = address::all();
        $shipment = shipment::where('user_id', session('user-id'))->where('id', $id)->first();
        if ($shipment->status == 1) {
            return redirect('dashboard');
        }
        return view('dashboard.shipment_edit', compact('shipment', 'address', 'earth'));
    }
    function show(Shipment $shipment)
    {
        return view('dashboard.shipment-view', compact('shipment'));
    }
    public function shipmentConsNote(Shipment $shipment)
    {
        $zone = Unit::find($shipment->unit_id);
        $price = $shipment->delivery_charge;
        $total_price = $shipment->amount;
        return view('dashboard.shipmentCNote', compact('shipment', 'zone', 'price', 'total_price'));
    }
    public function shipment_pdf_old(Shipment $shipment)
    {
        $zone = Unit::find($shipment->unit_id);
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
    // public function shipment_pdf(Shipment $shipment)
    // {
    //     $data = [
    //         'shipment' => $shipment,
    //         'total_price' => $shipment->amount
    //     ];
    //     $mpdf = PDF::loadView('dashboard.shipment-pdf', $data);
    //     return $mpdf->download('Invoice-' . $shipment->invoice_id . '.pdf');
    // }
    public function shipment_pdf($id)
    {
        $shipment = Shipment::with('user')->where('id',$id)->first();
        $mpdf = PDF::loadView('dashboard.shipment-pdf', compact('shipment'));
        return $mpdf->download('Invoice-' . $shipment->invoice_id . '.pdf');
    }

    function shipmentInvoice($id)
    {
        $data['title'] = "Invoice";
        $data['shipment'] = Shipment::findOrFail($id);
        set_time_limit(300);
        $pdf = PDF::loadView('dashboard.shipment_pdf', $data);
        return $pdf->stream();
    }

    function payments()
    {
        // $shipment = Shipment::orderBy('id','DESC')->where('user_id', Auth::guard('user')->user()->id)->get();
        return view('dashboard.shipment-payment');
    }

    function payments_loading()
    {
        return DataTables::of(Shipment::orderBy('id', 'DESC'))
            ->addColumn('action', function ($shipment) {
                return '<a href="/shipment-info/' . $shipment->id . '">View</a> |
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
                if ($shipment->amount == 0) {
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
                            $amount = 0;
                        } else {
                            $amount = ((int) $shipment->parcel_value / 100) * $shipping->cod_value;
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
                    $price = (int)$shipment->amount - (int) $shipment->delivery_charge;
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
    function edit(Shipment $shipment)
    {
        $title = "Update Shipment";
        $area = Unit::where('status', 1)->select('name', 'id')->get();
        $shippingCharges = ShippingCharge::select('id', 'consignment_type', 'shipping_amount')->get();
        return view('dashboard.edit-shipment', compact('shipment', 'title', 'area', 'shippingCharges'));
    }
    function update(Shipment $shipment, Request $request)
    {
        if ($request->isMethod('post')) {
            $dataSet = $request->all();
            $rules = [
                "recipient.required" => "Please enter customer name.",
                "phone.required" => "Please enter customer phone number.",
                "address.required" => "Please enter customer address.",
                "amount.required" => "Please enter amount",
                "unit_id.required" => "Please select unit"
            ];
            //Validation message
            $customMessage = [
                'recipient.required' => 'Name is required',
                'phone.email' => 'Phone is required',
                'address.required' => 'Address is required',
                'amount.required' => 'Parcel enter COD amount',
                'unit_id.required' => 'Please select area'
            ];
            $this->validate($request, $rules, $customMessage);
            //Saving data
            $shipment->recipient = $dataSet['recipient'];
            $shipment->phone = $dataSet['phone'];
            $shipment->address = $dataSet['address'];
            $shipment->amount = $dataSet['amount'];
            $shipment->invoice_id = $dataSet['invoice_id'];
            $shipment->unit_id = $dataSet['unit_id'];
            $shipment->merchant_note = $dataSet['merchant_note'];
            $shipment->update();
            return redirect()->route('merchantShipments')->with('success', 'Shipment has been udated successfully!');
        }
    }
    public function destroy($id)
    {
        //
    }
    public function shipmentDelete($id)
    {
        Shipment::find($id)->delete();
        return back()->with('message', 'Shipment has been deleted successfully!');
    }
}
