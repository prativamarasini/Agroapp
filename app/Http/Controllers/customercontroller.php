<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;

class customercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer =Customer::all();
        return view('website.backend.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('website.backend.customer.create');
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
        $data['full_name']=$request->full_name;
        $data['age']=$request->age;
        $data['gender']=$request->gender;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['province']=$request->province;
        $data['bank_name']=$request->bank_name;
        $data['account_no']=$request->account_no;
        
        $image=$request->file('photo');
        if($image){
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

        $data['photo'] = $image_url;
            
        }
        $customer = DB::table('customers')->insert($data);
        return redirect()->route('customer.index')
        ->with('success','Customer Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('customers')->where('customer_id',$id)->first();
        return view('website.backend.customer.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = DB::table('customers')->where('customer_id',$id)->first();
        return view('website.backend.customer.edit',compact('customer'));
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
        $data['full_name']=$request->full_name;
        $data['age']=$request->age;
        $data['gender']=$request->gender;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['province']=$request->province;
        $data['bank_name']=$request->bank_name;
        $data['account_no']=$request->account_no;
        
        $image=$request->file('photo');
        if($image){
            Unlink($oldimage);
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

        $data['photo'] = $image_url;
            
        }
        $customer = DB::table('customers')->where('customer_id',$id)->update($data);
        return redirect()->route('customer.index')
        ->with('success','Customer Updated Successfully');

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('customers')->where('customer_id',$id)->first();
        $photo = $data->photo;
        Unlink($photo);
        $customer =DB::table('customers')->where('customer_id',$id)->delete();
        return redirect()->route('customer.index')
        ->with('success','Customer Deleted Successfully');
    }
}
