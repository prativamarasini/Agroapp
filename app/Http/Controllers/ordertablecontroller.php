<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderItem;
use App\Product;
use App\Customer;
use App\Ordertable;
use DB;

class ordertablecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordertables=Ordertable::all();
       return view('website.backend.ordertable.index',compact('ordertables'));
    }

    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        $customers=Customer::all();
        return view('website.backend.ordertable.create',compact('products','customers'));
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
        $data['available_quantity']->available_quantity;
        $data['quantity']=$request->quantity;
        $data['price']->price;
        
        $ordertables=DB::table('ordertable')->insert($data);
      
        return redirect()->route('ordertable.index')
        ->with('success','Order Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('ordertable')->where('order_id',$id)->first();
        return view('website.backend.ordertable.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordertables = DB::table('ordertable')->where('order_id',$id)->first();
        return view('website.backend.ordertable.edit',compact('ordertable'));
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
        $data['quantity']=$request->quantity;
        $data['price']=$request->price;
        
        $ordertables=DB::table('ordertable')->update($data);
        return redirect()->route('ordertable.index')
        ->with('success','Order Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('ordertable')->where('order_id',$id)->first();
        $ordertables=DB::table('ordertable')->where('order_id',$id)->delete();
        return redirect()->route('ordertable.index')
        ->with('success','Order Deleted Successfully');
    }
}
