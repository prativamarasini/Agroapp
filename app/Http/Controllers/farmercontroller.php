<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class farmercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmer=DB::table('farmers')->latest()->paginate(10);
        return view('website.backend.farmer.index',compact('farmer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.backend.farmer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'full_name'=>'required|alpha_dash|min:5|max:20',
            'gender'=>'required',
            'age'=>'required',
            'email'=>'required|email|unique:users',
            'citienship_no'=>'required'
        ]);

        $data=array();
        $data['full_name']=$request->full_name;
        $data['gender']=$request->gender;
        $data['age']=$request->age;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['province']=$request->province;

        $image=$request->file('photo');
        $data['citizenship_no']=$request->citizenship_no;

        

        if($image){
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

        $data['photo'] = $image_url;
       
            
        }
            
        $farmer=DB::table('farmers')->insert($data);
        return redirect()->route('farmer.index')
        ->with('success','Farmer Created Successfully');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $data=DB::table('farmers')->where('farmer_id',$id)->first();
        return view('website.backend.farmer.show', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $farmer=DB::table('farmers')->where('farmer_id',$id)->first();
        return view('website.backend.farmer.edit',compact('farmer'));
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
        $oldimage= $request->old_photo;

        $data=array();
        $data['full_name']=$request->full_name;
        $data['gender']=$request->gender;
        $data['age']=$request->age;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['province']=$request->province;

        $image=$request->file('photo');
        $data['citizenship_no']=$request->citizenship_no;

        if($image)
        {
            unlink($oldimage);
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            $data['photo'] = $image_url;
        
        }

        $farmer=DB::table('farmers')->update($data);
        return redirect()->route('farmer.index')
        ->with('success','Farmer Updated Successfully');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('farmers')->where('farmer_id',$id)->first();
        $photo = $data->photo;
        $frontimage=$data->front_citizenship_photo;
        $backimage=$data->back_citizenship_photo;
        Unlink($photo);
        $farmer=DB::table('farmers')->where('farmer_id',$id)->delete();
        return redirect()->route('farmer.index')
        ->with('success','Order Deleted Successfully');
    }
}
