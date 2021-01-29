<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TransactionController extends Controller
{
    public function getAllTransaction()
    {
        $transactions = DB::table('transactions')->get();
        return $transactions;
        
    }
     
    public function store(Request $request){
        $data=array();
        $data['transaction_date']=$request->transaction_date;
        $data['amount_of_transaction']=$request->amount_of_transaction;
        $data['bank_name']=$request->bank_name;
        
        $transaction=DB::table('transactions')->insert($data);;

    }

    public function show($id){
        echo "Single transaction";
    }
    public function edit($id)
    {
        $transaction=DB::table('transactions')->where('transaction_id',$id)->get();
        return $transaction;
    }

    public function update(Request $request,$id){
        $data = array();
        $data['transaction_date']=$request->transaction_date;
        $data['amount_of_transaction']=$request->amount_of_transaction;
        $data['bank_name']=$request->bank_name;
        
        $transaction=DB::table('transactions')->update($data);
    }
    
    public function destroy($id)
    {
        $transaction=DB::table('transactions')->whereTransactionId($id);
        if($transaction->delete()){
            return response([
                'success' => true
            ], 200);
        }
    }
}
