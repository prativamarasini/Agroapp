<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Transaction;
use DB;

class transactioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction=DB::table('transactions')->latest()->paginate(10);
        return view('website.backend.transaction.index',compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.backend.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array();
        $data['transaction_date']=$request->transaction_date;
        $data['amount_of_transaction']=$request->amount_of_transaction;
        $data['bank_name']=$request->bank_name;
        
        $transaction=DB::table('transactions')->insert($data);
        return redirect()->route('transaction.index')
        ->with('success','Transaction Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('transactions')->where('transaction_id',$id)->first();
        return view('website.backend.transaction.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction=DB::table('transactions')->where('transaction_id',$id)->first();
        return view('website.backend.transaction.edit',compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data=array();
        $data['transaction_date']=$request->transaction_date;
        $data['amount_of_transaction']=$request->amount_of_transaction;
        $data['bank_name']=$request->bank_name;
        
        $transaction=DB::table('transactions')->update($data);
        return redirect()->route('transaction.index')
        ->with('success','Transaction Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $transaction=DB::table('transactions')->where('transaction_id',$id)->delete();
        return redirect()->route('transaction.index')
        ->with('success','Transaction Deleted Successfully');
    }
}
