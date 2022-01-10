<?php

namespace App\Http\Controllers\User;

use App\Models\Shipment;
use App\Models\ShippingPrice;
use App\Models\Zone;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CSVController extends Controller
{

    public function create()
    {
        return view('dashboard.csv.create');
    }

    public function get_csv_data(Request $request)
    {
        Session::forget('csv_data');
        if (empty($request->file)) {
            return back();
        }

        $filename = '';
        //upload file
        if ($file = request()->file('file')) {
            $filename  = date('Ymd-his') . '.' . $file->getClientOriginalExtension();
            $file->move('./csv-file/', $filename);
        }

        $file = fopen('./csv-file/' . $filename, "r");
        $i = 1;
        while (($line = fgetcsv($file)) !== FALSE) {
            if ($i != 1) {
                if (empty($line[0])) $invoice = rand();
                else $invoice = $line[0];

                $lines[] = array(
                    'invoice' => $invoice,
                    'reference_no' => $line[1],
                    'customer' => $line[2],
                    'contact' => $line[3],
                    'address' => $line[4],
                    'delivery_area' => $line[5],
                    'consignment_type' => $line[6],
                    'cod_amount' => $line[7],
                    'delivery_charge' => $line[8],
                    'weight_charge' => $line[9]
                );
            }
            $i++;
        }

        Session::put('csv_data', $lines);
        fclose($file);
        //--- Redirect Section
        // exit;
        return redirect('/csv-temporary');
    }

    function show()
    {
        if (!Session::has('csv_data')) {
            Session::flash('message', 'No CSV-file upload! Please submit a CSV file first!!');
            return redirect('/dashboard');
        }
        $areas = Area::latest()->get();
        // dd($areas);
        return view('dashboard.csv.show', compact('areas'));
    }
    public function store_new(Request $request)
    {
        // dd(Auth::guard('user')->user()->id);

        $price = 0;
        $total_price = 0;
        $cod_type = 0;
        $cod_amount = 0;
        // dd($request->all());
        foreach (Session::get('csv_data') as $key => $line) {
            if (!empty($request->parcel_value[$key])) {
                // if (!$request->parcel_value[$key]) {
                //     return response()->json(['status' => 'error', 'errors' => ['message' => 'Please declared your parcel value first.']], 422);
                // } else {
                //     // $cod_amount = ((int)$request->parcel_value[$key] / 100) * $shipping->cod_value;
                // }
                // $weight = (float)$request->weight[$key];
                // if ($weight > $shipping->max_weight) {
                //     $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
                //     if ((int)$ExtraWeight < $ExtraWeight) {
                //         $ExtraWeight = (int)$ExtraWeight + 1;
                //     }
                //     $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
                // } else {
                //     $price = (int)$shipping->max_price;
                // }
                // $total_price = $price + $cod_amount + (int)$request->parcel_value[$key];
            } else {
                $total_price = $price = 0;
            }

            $checkInvoice = Shipment::where('invoice_id', $request->invoice_id[$key])->count();
            if ($checkInvoice > 0) {
                $invoice_id = $request->invoice_id[$key] . rand(222, 22);
            } else $invoice_id = $request->invoice_id[$key];
            $insert = new Shipment();
            $insert->user_id = Auth::guard('user')->user()->id;
            // $insert->zone_id = '';
            $insert->area_id = $request->area[$key];
            $insert->name = $request->name[$key];
            $insert->phone = $request->phone[$key];
            $insert->address = $line['address'];
            $insert->zip_code = '';
            $insert->cod_amount = $request->cod_amount[$key];
            $insert->invoice_id = $invoice_id;
            $insert->merchant_note = $request->merchant_note[$key];
            $insert->weight = '';
            $insert->delivery_type = $request->delivery_type[$key];
            $new_id = Shipment::all()->first();
            $insert->tracking_code = rand();
            $insert->cod = $cod_type;
            $insert->cod_amount = $line['cod_amount'];
            $insert->price = $price;
            $insert->total_price = 0;
            // $insert->shipping_status = $request->type;
            $insert->save();
        }
        // exit;
        Session::flash('message', 'CSV-file data has been uploaded to database successfully');
        Session::forget('csv_data');
        return redirect()->route('user.dashboard');
    }
    public function store(Request $request)
    {
        $price = 0;
        $total_price = 0;
        $cod_type = 0;
        $cod_amount = 0;

        foreach (Session::get('csv_data') as $key => $line) {
            $zone = Area::find($request->area[$key]);
            $shipping = ShippingPrice::where('zone_id', $zone->zone_id)->where('delivery_type', $request->delivery_type)->first();

            if ($shipping == null) {
                return back()->with('message', 'We are sorry to inform y ou that you may not create shipments right now. Because, Shipping Price for this zone is not setup Yet! Please wait for the administrative decision!!');
            }

            if (empty($request->parcel_value[$key])) {
                echo 'null <br/>';
            } else echo $request->parcel_value[$key] . ' <br/>';

            if (!empty($request->parcel_value[$key])) {
                $shipping = ShippingPrice::where('zone_id', $zone->zone_id)->where('delivery_type', $request->delivery_type[$key])->first();
                if (!$shipping) {
                    return response()->json(['status' => 'error', 'errors' => ['message' => 'Sorry, not any shipping rate set this zone ' . $request->parcel_value[$key]]], 422);
                }
                if ($shipping->cod == 1) {
                    $cod_type = 1;
                    if (!$request->parcel_value[$key]) {
                        return response()->json(['status' => 'error', 'errors' => ['message' => 'Please declared your parcel value first.']], 422);
                    } else {
                        $cod_amount = ((int)$request->parcel_value[$key] / 100) * $shipping->cod_value;
                    }
                }

                $weight = (float)$request->weight[$key];
                if ($weight > $shipping->max_weight) {
                    $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
                    if ((int)$ExtraWeight < $ExtraWeight) {
                        $ExtraWeight = (int)$ExtraWeight + 1;
                    }
                    $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
                } else {
                    $price = (int)$shipping->max_price;
                }
                $total_price = $price + $cod_amount + (int)$request->parcel_value[$key];
            } else {
                $total_price = $price = 0;
            }

            $checkInvoice = Shipment::where('invoice_id', $request->invoice_id[$key])->count();
            if ($checkInvoice > 0) {
                $invoice_id = $request->invoice_id[$key] . rand(222, 22);
            } else $invoice_id = $request->invoice_id[$key];

            $insert = new Shipment();
            $insert->user_id = Auth::guard('user')->user()->id;
            $insert->zone_id = $zone->zone_id;
            $insert->area_id = $request->area[$key];
            $insert->name = $request->name[$key];
            $insert->phone = $request->phone[$key];
            $insert->address = $request->address[$key];
            $insert->zip_code = $request->zip_code[$key];
            $insert->parcel_value = $request->parcel_value[$key];
            $insert->invoice_id = $invoice_id;
            $insert->merchant_note = $request->merchant_note[$key];
            $insert->weight = $request->weight[$key];
            $insert->delivery_type = $request->delivery_type[$key];;
            $new_id = Shipment::all()->first();
            $insert->tracking_code = rand();
            $insert->cod = $cod_type;
            $insert->cod_amount = $cod_amount;
            $insert->price = $price;
            $insert->total_price = $total_price;
            $insert->save();
        }
        // exit;
        Session::flash('message', 'CSV-file data has been uploaded to database successfully');
        Session::forget('csv_data');
        return redirect('/dashboard');
    }
}
