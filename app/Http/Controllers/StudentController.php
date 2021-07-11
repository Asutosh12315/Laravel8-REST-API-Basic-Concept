<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        $Student=Student::all();
        return response()->json($Student);
    }

    public function store(Request $request)
    {
        $request->validate([

            'class_id'=>'required',
            'section_id'=>'required',
            'name'=>'required|unique:students',
            'address'=>'required',
            'password'=>'required',
            'photo'=>'required',
            'phone'=>'required',    
            'email'=>'required|unique:students',
            'gender'=>'required',            
        ]);

        $result=Student::insert([

            'class_id'=>$request->class_id,
            'section_id'=>$request->section_id,
            'name'=>$request->name,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'photo'=>$request->photo,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        

        if ($result) {
          
            return response()->json('Student Information Inserted Successfully');
        }
    }

    public function show($id)
    {
        $student=DB::table('students')->where('id',$id)->first();

        return response()->json($student);
    }

   

    public function update(Request $request , $id)
    {
        $request->validate([

            'class_id'=>'required',
            'section_id'=>'required',
            'name'=>'required',
            'address'=>'required',
            'password'=>'required',
            'photo'=>'required',
            'phone'=>'required',    
            'email'=>'required',
            'gender'=>'required',            
        ]);

        $result=Student::find($id)->update([

            'class_id'=>$request->class_id,
            'section_id'=>$request->section_id,
            'name'=>$request->name,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'photo'=>$request->photo,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        

        if ($result) {
          
            return response()->json('Student Information Updated Successfully');
        }
    }

    public function destroy($id)
    {
        $student=DB::table('students')->where('id',$id)->first();

        $student_img_path=$student->photo;
        unlink($student_img_path);

        $result=DB::table('students')->where('id',$id)->delete();

        if ($result) {
           
            return response()->json("Student Has Been Deleted Successfully");
        }
        
    }
}
