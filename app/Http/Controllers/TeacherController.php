<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;



class TeacherController extends Controller
{
    public function store(Request $request)
    {
        //
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:students', // Ensure email is unique
            'password' => 'required|string|min:8', // Minimum password length
            'gender' => 'required',
        ]);
    
        // Create a new student
        $teacher = new Teacher();
        $teacher->fullname = $request->input('fullname');
        $teacher->email = $request->input('email');
        $teacher->password = $request->input('password'); // Store plain password
        $teacher->active_status = "Active";
        $teacher->gender = $request->input('gender');
        $teacher->birthday = $request->input('birthday');
        $teacher->house_number = $request->input('house_number');
        $teacher->barangay = $request->input('barangay');
        $teacher->city = $request->input('city');
        $teacher->province = $request->input('province');
        $teacher->contact_number = $request->input('contact_number');
        $teacher->user_type = $request->input('user_type');
        $teacher->save();


        return response()->json(['message' => 'Teacher created successfully', 'employee' => $teacher], 201);
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Retrieve the user by email
        $user = Teacher::where('email', $data['email'])->first();
    
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

    public function index(){
        $teachers = Teacher::all();

        return response()->json(['teachers'=>$teachers]);
    }
}
