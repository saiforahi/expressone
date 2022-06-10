<?php

namespace App\Http\Controllers\Merchant;

use App\Area;
use App\Events\ShipmentMovementEvent;
use App\Zone;
use App\ShippingPrice;
use App\Models\Location;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogisticStep;
use App\Models\ShipmentPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class CSVController extends Controller
{

    public function create()
    {
        return view('dashboard.csv.create');
    }

    public function get_csv_data(Request $request)
    {
        Session::forget('csv_data');
        $filename = '';
        //upload file
        if (empty($request->file)) {
            return back();
        }
        // $filename = '';
        // //upload file
        // if ($file = request()->file('file')) {
        //     $filename  = date('Ymd-his') . '.' . $file->getClientOriginalExtension();
        //     $file->move('./csv-file/', $filename);
        // }
        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($request->file);
        $lines=[];
        foreach ($reader->getSheetIterator() as $sheet) {
            if ($sheet->getIndex() === 0) { // index is 0-based
                foreach ($sheet->getRowIterator() as $rowNumber => $row) {
                    if($rowNumber > 1){
                        $cells = $row->getCells();
                        $lines[] = array(
                            'recipient_name' => $cells[2]->getValue(),
                            'recipient_phone' => $cells[3]->getValue(),
                            'recipient_address' => $cells[4]->getValue(),
                            'upazila_district'=> $cells[5]->getValue(),
                            'delivery_type'=> $cells[6]->getValue(),
                            'weight'=> $cells[7]->getValue(),
                            'amount' => $cells[8]->getValue(),
                            'delivery_charge' => $cells[9]->getValue(),
                            'weight_charge'=> $cells[10]->getValue(),
                            'note'=> $cells[11]->getValue()??null
                        );
                    }
                }
                break; // no need to read more sheets
            }
        }
        
        Session::put('csv_data', $lines);
        // dd($lines);
        $reader->close();
        //--- Redirect Section
        // exit;
        return redirect('/csv-temporary');
    }

    function csvTemp()
    {
        if (!Session::has('csv_data')) {
            Session::flash('message', 'No CSV-file upload! Please submit a CSV file first!!');
            return redirect('/dashboard');
        }
        $locations=Location::join('points','points.id','locations.point_id')->join('units','units.id','points.unit_id')->where('units.id',auth()->guard('user')->user()->unit_id)->get(['locations.*']);
        return view('dashboard.csv.show', compact('locations'));
    }
    public function store_new(Request $request)
    {
        // dd($request->all());
        // dd(Session::get('csv_data'));
        foreach (Session::get('csv_data') as $key => $line) {
            //Invoice ID
            $invoice_data = ShipmentPayment::orderBy('id', 'desc')->first();
            if ($invoice_data == null) {
                $firstReg = 111;
                $invoice_no = $firstReg + 1;
                
            } else {
                $invoice_data = ShipmentPayment::orderBy('id', 'desc')->first()->invoice_no;
                $invoice_no = $invoice_data + 1;
            }
            $insert = new Shipment();
            $recipient_data['name']=$request->recipient_name[$key];
            // dd(json_encode(array('name'=>$line['recipient_name'],'phone'=>$line['recipient_phone'],'address'=>$line['recipient_address'])));
            $insert->recipient = array('name'=>$request->recipient_name[$key],'phone'=>$request->recipient_phone[$key],'address'=>$request->recipient_address[$key]);
            $insert->amount = $request->amount[$key];
            $insert->weight = $request->weight[$key];
            $insert->upazila_district = $request->upazila_district[$key];
            $insert->pickup_location_id=$request->pickup_location[$key];
            $insert->delivery_location_id=$request->delivery_location[$key]??null;
            $insert->note = $request->note[$key];
            //CSV Data
            $insert->merchant_id = Auth::guard('user')->user()->id;
            $insert->added_by()->associate(Auth::guard('user')->user());
            $insert->invoice_id = $invoice_no;
            $insert->tracking_code = uniqid();
            // $insert->service_type = $request->
            $insert->logistic_status = LogisticStep::first()->id;
            $insert->save();

            //Make shipment Payment
            if ($insert->save()) {
                $shipmentPmnt =  new ShipmentPayment();
                $shipmentPmnt->shipment_id = $insert->id;
                $shipmentPmnt->sl_no  = $invoice_no;
                $shipmentPmnt->tracking_code  = uniqid();
                $shipmentPmnt->invoice_no  = $invoice_no;
                // $shipmentPmnt->admin_id  = Auth::guard('user')->user()->id;
                $shipmentPmnt->cod_amount  = $insert->amount;
                $shipmentPmnt->delivery_charge  = $request->delivery_charge[$key];
                $shipmentPmnt->weight_charge  = $request->weight_charge[$key];
                $shipmentPmnt->save();
                event(new ShipmentMovementEvent($insert,LogisticStep::first(),Auth::guard('user')->user()));
            }
        }
        Session::forget('csv_data');
        return redirect()->route('merchant.dashboard')->with('message', 'CSV-file data has been saved successfully');
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
                        $cod_amount = ((int) $request->parcel_value[$key] / 100) * $shipping->cod_value;
                    }
                }
                $weight = (float) $request->weight[$key];
                if ($weight > $shipping->max_weight) {
                    $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
                    if ((int) $ExtraWeight < $ExtraWeight) {
                        $ExtraWeight = (int) $ExtraWeight + 1;
                    }
                    $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
                } else {
                    $price = (int) $shipping->max_price;
                }
                $total_price = $price + $cod_amount + (int) $request->parcel_value[$key];
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
