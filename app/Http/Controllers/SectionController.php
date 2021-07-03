<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function index()
    {
        $section=Section::all();

        return response()->json($section);
        
    }


    public function store(Request $request)
    {
        $request->validate([

            'class_id'=>'required',
            'section_name'=>'required|unique:sections|max:24'
        ]);

        $section= new Section;

        $section->class_id=$request->class_id;
        $section->section_name=$request->section_name;        
        $result=$section->save();

        if ($result) {
            
            return response()->json('Section Inserted Successfully');
        }
    }

    public function show($id)
    {
        $section=DB::table('sections')->where('id',$id)->first();

        return response()->json($section);
    }

    public function update(Request $request,$id)
    {
        $result=Section::find($id)->update([

        'class_id'=>$request->class_id,
        'section_name'=>$request->section_name
        
        ]);

        if ($result) {
            
            return response()->json('Section Updated Successfully');
        }
    }

    public function destroy($id)
    {
        $result=Section::find($id)->delete();

        if ($result) {
            
            return response()->json('Section Deleted Successfully');
        }
    }
}
