<?php

namespace App\Http\Controllers\User;

use App\Area;
use App\Http\Controllers\Controller;
use App\Shipment;
use App\ShippingPrice;
use App\Shipment_delivery_payment;
use Illuminate\Http\Request;
use Auth;
use PDF;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShipmentController extends Controller
{
    public function index()
    {
        $area = Area::where('status', 1)->get();
        return view('dashboard.shipment', compact('area'));
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
        $zone = Area::find($request->area);
        $shipping = ShippingPrice::where('zone_id', $zone->zone_id)->where('delivery_type', $request->delivery_type)->first();
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



    public function PrepareShipmentSubmit(Request $request)
    {
        $messages = [
            "name.required" => "Please enter customer name.",
            "phone.required" => "Please enter customer phone number.",
            "address.required" => "Please enter customer address.",
            //"weight.required" => "Parcel weight required",
            "parcel_value.max" => "The value of parcel must be 7 character",
            "area.required" => "Please select customer area",
        ];

        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|max:20',
            'address' => 'required|max:255',
            'area' => 'required',
            //'zip_code' => 'max:10',
            'parcel_value' => 'max:7',
            'invoice_id' => 'max:20',
            'merchant_note' => 'max:255',
            //'weight' => 'required|max:5',
            'delivery_type' => 'required',
        ], $messages);

        $price = 0;
        $total_price = 0;
        $cod_type = 0;
        $cod_amount = 0;
        $zone = Area::find($request->area);
        $shipping = ShippingPrice::where('zone_id', $zone->zone_id)->where('delivery_type', $request->delivery_type)->first();
        // if (!$shipping) {
        //     return response()->json(['status' => 'error', 'errors' => ['message' => 'Sorry, not any shipping rate set this zone']], 422);
        // }
        // if ($shipping->cod == 1) {
        //     $cod_type = 1;
        //     if (!$request->parcel_value) {
        //         // return response()->json(['status' => 'error', 'errors' => ['message' => 'Please declared your parcel value first.']], 422);
        //         $cod_amount = 0;
        //     } else {
        //         $cod_amount = ((int)$request->parcel_value / 100) * $shipping->cod_value;
        //     }
        // }


        // $weight = (float)$request->weight;
        // if ($weight > $shipping->max_weight) {
        //     $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
        //     if ((int)$ExtraWeight < $ExtraWeight) {
        //         $ExtraWeight = (int)$ExtraWeight + 1;
        //     }
        //     $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
        // } else {
        //     $price = (int)$shipping->max_price;
        // }
        // $total_price = $price + $cod_amount + (int)$request->parcel_value;

        $insert = new Shipment();
        $insert->user_id = Auth::guard('user')->user()->id;
        $insert->zone_id = $zone->zone_id;
        $insert->area_id = $request->area;
        $insert->name = $request->name;
        $insert->phone = $request->phone;
        $insert->address = $request->address;
        $insert->zip_code = $request->zip_code;
        $insert->parcel_value = $request->parcel_value;
        $insert->invoice_id = $request->invoice_id;
        $insert->merchant_note = $request->merchant_note;
        $insert->weight = $request->weight;
        $insert->delivery_type = $request->delivery_type;
        $insert->delivery_type = $request->delivery_type;
        $new_id = Shipment::all()->first();
        $insert->tracking_code = rand();
        $insert->cod = $cod_type;
        $insert->cod_amount = $cod_amount;
        $insert->price = $price;
        $insert->total_price = $total_price;
        $insert->save();

        $output = array(
            'done' => 'done',
        );

        // return json_encode($output);
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

        // $zone = Area::find($shipment->area_id);
        // $shipping = ShippingPrice::where('zone_id', $zone->zone_id)->where('delivery_type', $shipment->delivery_type)->first();

        // if ($shipping == null) {
        //     dd('ShippingPrice missing');
        // }

        // $weight = (float)$shipment->weight;
        // if ($weight > $shipping->max_weight) {
        //     $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
        //     if ((int)$ExtraWeight < $ExtraWeight) {
        //         $ExtraWeight = (int)$ExtraWeight + 1;
        //     }
        //     $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
        // } else {
        //     $price = (int)$shipping->max_price;
        // }
        //$total_price = $price= 0;
        return view('dashboard.shipment-view', compact('shipment'));
    }
    function shipmentConsNote(Shipment $shipment)
    {
        return view('dashboard.shipmentCNote', compact('shipment'));
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
    function shipment_pdf(Shipment $shipment)
    {
        // $zone = Area::find($shipment->area_id);
        // // $shipping = ShippingPrice::where('zone_id', $zone->zone_id)->where('delivery_type', $shipment->delivery_type)->first();

        // $weight = (float)$shipment->weight;
        // if ($weight > $shipping->max_weight) {
        //     $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
        //     if ((int)$ExtraWeight < $ExtraWeight) {
        //         $ExtraWeight = (int)$ExtraWeight + 1;
        //     }
        //     $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
        // } else {
        //     $price = (int)$shipping->max_price;
        // }
        $total_price = $price = $shipment->cod_amount;
        $shipping = 0;
        // return view('dashboard.shipment-pdf', compact('shipment','price','total_price','shipping'));
        $qrcode = QrCode::size(150)->format('svg')->generate($shipment->tracking_code);
        $pdf = PDF::loadView('dashboard.shipment-pdf', compact('shipment', 'price', 'total_price', 'shipping', 'qrcode'));
        return $pdf->download('Invoice-' . $shipment->invoice_id . '.pdf');
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
                if ($shipment->price == 0) {
                    $price = 'Merchant will pay';
                } else $price = 'User will pay';
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
                    return '<span class="text-danger">' . $shipment->price . ' Tk</span>';
                }
            })
            ->rawColumns(['id', 'tracking_code', 'invoice_no', 'payment_by', 'amount', 'action'])->make(true);
    }

    function show_payment(Shipment $shipment)
    {
        $payments =  Shipment_delivery_payment::where('shipment_id', $shipment->id)->get();
        return view('dashboard.include.shipment-delivery-payment', compact('payments'));
    }
    function edit(Shipment $shipment)
    {
        $title = "Update Shipment";
        $area = Area::where('status', 1)->get();
        return view('dashboard.edit-shipment', compact('shipment', 'title', 'area'));
    }
    function update(Shipment $shipment, Request $request)
    {
        if ($request->isMethod('post')) {
            $dataSet = $request->all();
            $rules = [
                "name.required" => "Please enter customer name.",
                "phone.required" => "Please enter customer phone number.",
                "address.required" => "Please enter customer address.",
                "parcel_value.required" => "Please enter parcel value",
                "cod_amount.required" => "Please enter cod_amount"
            ];
            //Validation message
            $customMessage = [
                'name.required' => 'Name is required',
                'phone.email' => 'Phone is required',
                'address.required' => 'Address is required',
                'parcel_value.required' => 'Parcel value is required',
                'cod_amount.required' => 'Parcel enter COD amount'
            ];
            $this->validate($request, $rules, $customMessage);
            //Saving data
            $shipment->name = $dataSet['name'];
            $shipment->phone = $dataSet['phone'];
            $shipment->address = $dataSet['address'];
            $shipment->cod_amount = $dataSet['cod_amount'];
            $shipment->parcel_value = $dataSet['parcel_value'];
            $shipment->invoice_id = $dataSet['invoice_id'];
            $shipment->merchant_note = $dataSet['merchant_note'];
            $shipment->delivery_type = 1;
            $shipment->update();
            return redirect()->route('merhcant_shipments')->with('success', 'Shipment has been udated successfully!');
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
