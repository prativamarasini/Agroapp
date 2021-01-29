<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use DB;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCategories()
    {
        $categories = DB::table('categories')->get();
        return $categories;
        
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
        $data['name']=$request->category_type;
        $data['details']=$request->details;
        $category=DB::table('category')->insert($data);
    }

    /**
     * Display the specified resource.
     
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "single category";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=DB::table('categories')->whereCategoryid($id)->get();
        return $categories;
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
        $data['name']=$request->category_type;
        $data['details']=$request->details;

        $category=DB::table('categories')->whereCategoryid($id)->update($data);
    }

    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=DB::table('categories')->whereCategoryid($id);
        if($category->delete()){
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
