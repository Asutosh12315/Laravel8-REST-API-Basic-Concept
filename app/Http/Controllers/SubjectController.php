<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Sclass;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects=Subject::all();
        return response()->json($subjects);
    }
    public function store(Request $request)
    {
        $request->validate([

            'class_id'=>'required',
            'subject_name'=>'required|unique:subjects|max:25',
            'subject_code'=>'required'
        ]);


        $subjects= new Subject;

        $subjects->class_id=$request->class_id;
        $subjects->subject_name=$request->subject_name;
        $subjects->subject_code=$request->subject_code;
        $result=$subjects->save();

        if ($result) {
            
            return response()->json('Subject Inserted Successfully');
        }
        
    }

    public function show($id)
    {
        $subject=Subject::findorfail($id);

        return response()->json($subject);
    }

    public function destroy($id)
    {
        DB::table('subjects')->where('id',$id)->delete();

        return response()->json('Subject Deleted Successfully');
    }

    public function updateSub(Request $request , $id)
    {
        $sub=array();
        $sub['class_id']=$request->class_id;
        $sub['subject_name']=$request->subject_name;
        $sub['subject_code']=$request->subject_code;
       $result= DB::table('subjects')->where('id',$id)->update($sub);

       if ($result) {
           
        return response()->json("Subject Updated Successfully");
       }
    }
}
