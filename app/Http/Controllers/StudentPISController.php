<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentPIS;
use Illuminate\Support\Facades\DB;

class StudentPISController extends Controller
{
    //
    public function store(Request $request) {
        $request->validate([
            // 'fullname' => 'required|string|max:255',
            // 'lrn' => 'required|string|max:20|unique:students', // Ensure LRN is unique
            // 'email' => 'required|email|unique:students', // Ensure email is unique
            // 'password' => 'required|string|min:8', // Minimum password length
            // 'gender' => 'required',
            'students_id' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'civil_status' => 'required'
        ]);

        $student = new StudentPIS();
        $student->fullname = $request->input('fullname');
        $student->students_id = $request->input('students_id');
        $student->gender = $request->input('gender');
        $student->birthday = $request->input('birthday');
        $student->house_number = $request->input('house_number');
        $student->barangay = $request->input('barangay');
        $student->city = $request->input('city');
        $student->province = $request->input('province');
        $student->religion = $request->input('religion');
        $student->civil_status = $request->input('civil_status');
        $student->occupation = $request->input('occupation');
        $student->education = $request->input('education');
        $student->save();
        
        return response()->json(['message' => 'Student Answered PIS Successfully', 'student' => $student], 201);
    }

    public function index(Request $request){
        $studentsId = $request->query('students_id');

        $students = StudentPIS::where('students_id', $studentsId)->get();
    
        return response()->json($students);
    }
}
