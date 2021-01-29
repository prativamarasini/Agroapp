<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function getAllCustomers(){
        $customers=Db::table('customers')->get();
        return $customers;
    }

    public function store(Request $request){
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

        $customer = DB::table('customers')->insert($data);
    }

    public function edit(Request $request,$id){
        $customer=DB::table('customers')->whereCustomerId($id)->get();
        return $customer;
    }

    public function update(Request $request,$id){
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

        $customer=DB::table('customers')->whereCustomerId($id)->update($data);
    }

    public function destroy($id){
        $customer=DB::table('customers')->whereCustomerId($id);
        if($customer->delete()){
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
