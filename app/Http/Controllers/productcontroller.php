<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('website.backend.product.index',compact('products'));
    }

    public function getProductInfo($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function getAvailableInfo($id)
    {
        $productavailable = Product::find($id);
        return $productavailable;
    }
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('website.backend.product.create', compact('categories'));

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
        $data['name']=$request->prod_name;
        $data['price']=$request->prod_price;
        $image=$request->file('prod_photo');
        if($image){
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

        $data['image'] = $image_url;
            
        }

        $data['category_id']=$request->category_id;
        $data['available_quantity']=$request->available_quantity;
        $data['area_of_production']=$request->Area_of_production;
        $data['details']=$request->details;

        $product=DB::table('products')->insert($data);
        return redirect()->route('product.index')
        ->with('success','Product Created Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('products')->where('prod_id',$id)->first();
        return view('website.backend.product.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=DB::table('products')->where('prod_id',$id)->first();
        return view('website.backend.product.edit',compact('product'));
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
        $oldimage= $request->old_image;

        $data=array();
        $data['date_of_upload']=$request->date_of_upload;
        $data['prod_name']=$request->prod_name;
        $data['prod_price']=$request->prod_price;
        $image=$request->file('prod_photo');
        if($image){
            unlink($oldimage);
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

        $data['prod_photo'] = $image_url;
            
        }

        $data['available_quantity']=$request->available_quantity;
        $data['Area_of_production']=$request->Area_of_production;
        $data['details']=$request->details;

        $product=DB::table('products')->where('prod_id',$id)->update($data);
        return redirect()->route('product.index')
        ->with('success','Product Updated Successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('products')->where('prod_id',$id)->first();
        $photo = $data->prod_photo;
        unlink($photo);
        $product=DB::table('products')->where('prod_id',$id)->delete();
        return redirect()->route('product.index')
        ->with('success','Product Deleted Successfully');
    }
}
