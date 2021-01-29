<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllProducts()
    {
        $product =DB::table('products')->get();
        return $product;
    }

    public function store(Request $request){
        $data=array();
        $data['date_of_upload']= $request->date_of_upload;
        $data['prod_name']=$request->prod_name;
        $data['prod_price']=$request->prod_price;
        $data['available_quantity']=$request->available_quantity;
        $data['Area_of_production']=$request->Area_of_production;
        $data['details']=$request->details;

        $product=DB::table('products')->insert($data);
    }

    public function show($id)
    {
        echo "single product";
    }

    public function edit(Request $request,$id)
    {
        $product=DB::table('products')->whereProductId($id)->get($id);
        return $product;
    }

    public function update(Request $request,$id){
        $data=array();
        $data['date_of_upload']= $request->date_of_upload;
        $data['prod_name']=$request->prod_name;
        $data['prod_price']=$request->prod_price;
        $data['available_quantity']=$request->available_quantity;
        $data['Area_of_production']=$request->Area_of_production;
        $data['details']=$request->details;

        $product=DB::table('products')->whereProductId($id)->update($data);
    }

    public function destroy($id){
        $product=DB::table('products')->whereProductId($id)->get();
        if($product->delete()){
            return response([
                'success'->true
            ],200);
        }
        else{
            return response([
                'success'->false
            ],404);
        }
    }
}