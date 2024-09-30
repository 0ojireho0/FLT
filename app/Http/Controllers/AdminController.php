<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
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
        $admin = new Admin();
        $admin->fullname = $request->input('fullname');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password'); // Store plain password
        $admin->active_status = "Active";
        $admin->gender = $request->input('gender');
        $admin->birthday = $request->input('birthday');
        $admin->house_number = $request->input('house_number');
        $admin->barangay = $request->input('barangay');
        $admin->city = $request->input('city');
        $admin->province = $request->input('province');
        $admin->contact_number = $request->input('contact_number');
        $admin->save();


        return response()->json(['message' => 'Admin created successfully', 'admin' => $admin], 201);
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Retrieve the user by email
        $user = Admin::where('email', $data['email'])->first();
    
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
