<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrdertableController extends Controller
{
    public function getAllOrders()
    {
        $ordertable= DB::table('ordertable')->get();
        return $ordertable;
    }

    public function store(Request $request){
        $data=array();
        $data['quantity']=$request->quantity;
        $data['price']=$request->price;
        $data['date_of_order']=$request->date_of_order;

        $ordertable=DB::table('ordertable')->insert($data);
    }

    public function show($id)
    {
        echo"single order here";
    }

    public function edit($id){
        $order=DB::table('ordertable')->whereOrderId($id)->get();
        return $order;
    }

    public function update(Requestt $request,$id){
        $data=array();
        $data['quantity']=$request->quantity;
        $data['price']=$request->price;
        $data['date_of_order']=$request->date_of_order;

        $ordertable=DB::table('ordertable')->update($data);
    }

    public function destroy($id){
        $order=DB::table('ordertable')->whereOrderId($id);
        if($order->delete()){
        return response([
            'success' => true
        ], 200);
    }
    else{
        return response([
            'success'=>false
        ],404);
    }
    }
}
