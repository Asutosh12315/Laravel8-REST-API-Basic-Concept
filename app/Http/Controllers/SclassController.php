<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sclass;

class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sClass=DB::table('sclasses')->get();

        return response()->json($sClass);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([

        'class_name'=>'required|unique:sclasses|max:24'

       ]);
        $sClass= new Sclass;

        $sClass->class_name=$request->class_name;
        $result=$sClass->save();

        if ($result) {
            
            return response()->json('Class Name Inserted Successfully');
        }else {
            
            return response()->json('Class Name Insertation Faild');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showClass=DB::table('sclasses')->where('id',$id)->first();

        return response()->json($showClass);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data['class_name']=$request->class_name;
        $result=DB::table('sclasses')->where('id',$id)->update($data);

        if ($result) {
            
            return response()->json("Class name updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=DB::table('sclasses')->where('id',$id)->delete();

        if ($result) {

            return response()->json('Data deleted successfully');
        }
    }

    
}
