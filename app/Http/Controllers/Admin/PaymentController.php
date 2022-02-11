<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MerchantPayment;

class PaymentController extends Controller
{
    //
    public function show_all_payments(){
        try{
            $payments;
            $all_payments = MerchantPayment::all();
            $my_payments=array();
            foreach($all_payments as $item){
                if($item->paid_by == auth()->guard('admin')->user()){
                    array_push($my_payments,$item);
                }
            }
            if(auth()->guard('admin')->user()->hasRole('super-admin')){
                $payments=$all_payments;
            }
            else{
                $payments=$my_payments;
            }
            return view('admin.payments.list',compact('payments'));
        }
        catch(Exception $e){

        }
        
    }
}
