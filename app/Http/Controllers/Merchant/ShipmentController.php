<?php

namespace App\Http\Controllers\Merchant;

use App\Model\Area;
use App\Models\Unit;
use App\ShippingPrice;
use App\Models\Location;
use App\Models\Shipment;
use App\ShipmentPayment;
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
        $data['locations'] = Location::select('id', 'name', 'point_id', 'unit_id')->get();
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
            //dd($shipment['recipient']['name']);
            $title = "Edit Shipment";
            $buttonText = "Update Shipment";
            $message = "Shipment has been updated successfully!";
        }
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $messages = [
                "name.required" => "Please enter customer name.",
                "phone.required" => "Please enter customer phone number.",
                "address.required" => "Please enter customer address.",
                "pickup_location_id.required" => "Please enter pickup_location_id.",
                "shipping_charge_id.required" => "Please select shipping charge",
                "amount.required" => "Please enter amount",
            ];
            $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|max:20',
                'address' => 'required|max:255',
                "amount" => 'required',
                "shipping_charge_id" => 'required'
            ], $messages);
            $data = $request->only(['name', 'phone', 'address']);
            $shipment['recipient'] =  $data;
            $shipment->tracking_code = uniqid();
            $shipment->amount = $request->cod_amount;
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
        $data['locations'] = Location::select('id', 'name', 'point_id', 'unit_id')->get();
        return view('dashboard.addEditShipment', $data, compact('title', 'buttonText','shipment'));
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
        $zone = Area::find($shipment->area_id);
        $price = $shipment->delivery_charge;
        $total_price = $shipment->cod_amount;
        return view('dashboard.shipmentCNote', compact('shipment', 'zone', 'price', 'total_price'));
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
        $total_price = $price = $shipment->cod_amount;
        $data = [
            'shipment' => $shipment,
            'price' => $price,
            'total_price' => $total_price
        ];
        //$pdf = PDF::loadView('dashboard.shipment-pdf', compact('shipment', 'price', 'total_price', 'shipping', 'qrcode'));
        $mpdf = PDF::loadView('dashboard.shipment-pdf', $data);
        // $mpdf->Output('Invoice-' . $shipment->invoice_id . '.pdf', 'D');
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
    function edit(Shipment $shipment)
    {
        $title = "Update Shipment";
        $area = Area::where('status', 1)->select('name', 'id')->get();
        $shippingCharges = ShippingCharge::select('id', 'consignment_type', 'shipping_amount')->get();
        return view('dashboard.edit-shipment', compact('shipment', 'title', 'area', 'shippingCharges'));
    }
    function update(Shipment $shipment, Request $request)
    {
        if ($request->isMethod('post')) {
            $dataSet = $request->all();

            $rules = [
                "name.required" => "Please enter customer name.",
                "phone.required" => "Please enter customer phone number.",
                "address.required" => "Please enter customer address.",
                "cod_amount.required" => "Please enter cod_amount",
                "area_id.required" => "Please select area"
            ];
            //Validation message
            $customMessage = [
                'name.required' => 'Name is required',
                'phone.email' => 'Phone is required',
                'address.required' => 'Address is required',
                'cod_amount.required' => 'Parcel enter COD amount',
                'area_id.required' => 'Please select area'
            ];
            $this->validate($request, $rules, $customMessage);
            //Saving data
            $shipment->name = $dataSet['name'];
            $shipment->phone = $dataSet['phone'];
            $shipment->address = $dataSet['address'];
            $shipment->cod_amount = $dataSet['cod_amount'];
            $shipment->invoice_id = $dataSet['invoice_id'];
            $shipment->area_id = $dataSet['area_id'];
            $shipment->merchant_note = $dataSet['merchant_note'];
            $shipment->delivery_type = 1;
            $shipment->update();
            return redirect()->route('merchant.dashboard')->with('success', 'Shipment has been udated successfully!');
        }
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
}
