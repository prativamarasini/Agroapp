<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

use DB;

class paymentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment= Payment::all();
        return view('website.backend.payment.index',compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $products = Product::all();
        // $customers = Customer::all();
        // $orders = Ordertable::all();
        return view('website.backend.payment.create');
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
        $data['type']=$request->type;
        // $data['product_id']=$request->product_id;
        // $data['customer_id']=$request->customer_id;
        // $data['order_id']=$request->order_id;


        $payment=DB::table('payment')->insert($data);
        return redirect()->route('payment.index')
        ->with('success','Payment Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('payment')->where('payment_id',$id)->first();
        return view('website.backend.payment.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $payment=DB::table('payment')->where('payment_id',$id)->first();
        return view('website.backend.payment.edit',compact('payment'));
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
        // $data['bank_name']=$request->bank_name;
        // $data['account_no']=$request->account_no;
        $data['type']=$request->type;

        $payment=DB::table('payment')->where('payment_id',$id)->update($data);
        return redirect()->route('payment.index')
        ->with('success','Payment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('payment')->where('payment_id',$id)->first();
        $payment=DB::table('payment')->where('payment_id',$id)->delete();
        return redirect()->route('payment.index')
        ->with('success','Payment Deleted Successfully');
    }
}
