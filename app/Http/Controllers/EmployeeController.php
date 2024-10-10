<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();

        return response()->json(['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:students', // Ensure email is unique
            'password' => 'required|string|min:8', // Minimum password length
            'gender' => 'required',
            'birthday' => 'required|date_format:Y-m-d', 
        ]);
    
        // Create a new student
        $emplyee = new Employee();
        $emplyee->fullname = $request->input('fullname');
        $emplyee->email = $request->input('email');
        $emplyee->password = $request->input('password'); // Store plain password
        $emplyee->active_status = "Active";
        $emplyee->gender = $request->input('gender');
        $emplyee->birthday = $request->input('birthday');
        $emplyee->house_number = $request->input('house_number');
        $emplyee->barangay = $request->input('barangay');
        $emplyee->city = $request->input('city');
        $emplyee->province = $request->input('province');
        $emplyee->contact_number = $request->input('contact_number');
        $emplyee->user_type = $request->input('user_type');
        $emplyee->save();


        return response()->json(['message' => 'Employee created successfully', 'employee' => $emplyee], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request
        $request->validate([
            'active_status' => 'required|string',
            'password' => 'nullable|string', // Allow password to be optional
        ]);

        // Find the student by ID
        $employee = Employee::findOrFail($id);

        // Update the student's details
        $employee->active_status = $request->input('active_status');

        // Only update password if provided
        if ($request->filled('password')) {
            $employee->password = $request->input('password'); // Set the plain password directly
        }

        // Save the updated student
        $employee->save();

        return response()->json(['message' => 'Employee updated successfully']);
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employee = Employee::findOrFail($id);
        // $student_cred = UserCredentials::findOrFail($id);

        // Delete the student
        $employee->delete();
        // $student_cred->delete();
    
        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Retrieve the user by email
        $user = Employee::where('email', $data['email'])->first();
    
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
