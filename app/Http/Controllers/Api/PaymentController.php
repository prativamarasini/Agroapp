<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PaymentController extends Controller
{
    public function getAllPayments(){
        $payments=DB::table('payment')->get();
        return $payments;
    }
    public function store(Request $request){
        $data=array();
        $data['bank_name']=$request->bank_name;
        $data['account_no']=$request->account_no;
        $data['payment_type']=$request->payment_type;

        $payment=DB::table('payment')->insert($data);
    }
    public function show($id){
        echo "single payment";
    }

    public function edit($id){
        $payment=DB::table('payment')->wherePaymentId($id)->get();
        return $payment;
    }

    public function update(Request $request, $id){
        $data=array();
        $data['bank_name']=$request->bank_name;
        $data['account_no']=$request->account_no;
        $data['payment_type']=$request->payment_type;

        $payment=DB::table('payment')->wherePaymentId($id)->update($data);
    }


    public function destroy($id)
    {
        $payment=DB::table('payment')->wherePaymentId($id);
        if($payment->delete()){
            return response([
                'success' => true
            ], 200);
        }
        else{
            return response([
                'success'->false
            ],404);
        }
    }

}
