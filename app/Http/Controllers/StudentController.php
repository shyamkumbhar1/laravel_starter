<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

public function index()
 {
    $students = Student::orderBy('id','DESC')->get();
    return view('Student.students',compact('students'));
 }
 public function addStudent(Request $request)
    {

        $student = new Student();
        $student->firstname = $request->firstname;
        $student->save();
        return response()->json($student);
    }
}
