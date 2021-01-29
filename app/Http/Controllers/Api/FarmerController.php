<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FarmerController extends Controller
{
    public function getAllFarmers(){
        $farmers=Db::table('farmers')->get();
        return $farmers;
    }

    public function store(Request $request)
    {
        $data=array();
        $data['full_name']=$request->full_name;
        $data['gender']=$request->gender;
        $data['age']=$request->age;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['password']=$request->password;
        $data['address']=$request->address;
        $data['province']=$request->province;
        $data['citizenship_no']=$request->citizenship_no;

        $farmer=DB::table('farmers')->insert($data);
    }

    public function edit($id)
    {
        $farmer=DB::table('farmers')->whereFarmerId($id)->get();
        return $farmer;
    }

    public function update(Request $request, $id)
    {
        $data=array();
        $data['full_name']=$request->full_name;
        $data['gender']=$request->gender;
        $data['age']=$request->age;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['password']=$request->password;
        $data['address']=$request->address;
        $data['province']=$request->province;
        $data['citizenship_no']=$request->citizenship_no;

        $farmer=DB::table('farmers')->update($data);

    }

    public function destroy($id){
        $farmer= DB::table('farmers')->whereFarmerId($id);
        if($farmer->delete()){
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
