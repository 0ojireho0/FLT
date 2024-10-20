<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegularStudent;

class RegularStudentController extends Controller
{
    public function store(Request $request)
    {
        //
        $request->validate([
            'fullname' => 'required|string|max:255',
            'lrn' => 'required|string|max:20|unique:students', // Ensure LRN is unique
            'email' => 'required|email|unique:students', // Ensure email is unique
            'password' => 'required|string|min:8', // Minimum password length
            'gender' => 'required',
        ]);
    
        // Create a new student
        $student = new RegularStudent();
        $student->fullname = $request->input('fullname');
        $student->lrn = $request->input('lrn');
        $student->email = $request->input('email');
        $student->password = $request->input('password'); // Store plain password
        $student->gender = $request->input('gender');
        $student->birthday = $request->input('birthday');
        $student->house_number = $request->input('house_number');
        $student->barangay = $request->input('barangay');
        $student->city = $request->input('city');
        $student->province = $request->input('province');
        $student->religion = $request->input('religion');
        $student->grade = $request->input('grade');
        $student->regular_teacher_id = $request->input('teacher');
        $student->section = $request->input('section');
        $student->save();


        return response()->json(['message' => 'Student created successfully', 'student' => $student], 201);
        // return $request;
    }

    public function index(){
        $students = RegularStudent::all();

        return response()->json(['students'=>$students]);
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Retrieve the user by email
        $user = RegularStudent::where('email', $data['email'])->first();
    
        // Check if the user exists and if the password matches
        if (!$user || $data['password'] !== $user->password) {
            return response()->json([
                'message' => 'Email or password is incorrect!'
            ], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
        ]);
    }
}
