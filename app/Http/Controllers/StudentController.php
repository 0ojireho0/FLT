<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();

        return response()->json(['students'=>$students]);
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
            'lrn' => 'required|string|max:20|unique:students', // Ensure LRN is unique
            'email' => 'required|email|unique:students', // Ensure email is unique
            'password' => 'required|string|min:8', // Minimum password length
            'gender' => 'required',
        ]);
    
        // Create a new student
        $student = new Student();
        $student->fullname = $request->input('fullname');
        $student->lrn = $request->input('lrn');
        $student->email = $request->input('email');
        $student->password = $request->input('password'); // Store plain password
        $student->active_status = "Active";
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


        return response()->json(['message' => 'Student created successfully', 'student' => $student], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    // Validate the incoming request
    $request->validate([
        'active_status' => 'required|string',
        'password' => 'nullable|string', // Allow password to be optional
    ]);

    // Find the student by ID
    $student = Student::findOrFail($id);

    // Update the student's details
    $student->active_status = $request->input('active_status');

    // Only update password if provided
    if ($request->filled('password')) {
        $student->password = $request->input('password'); // Set the plain password directly
    }

    // Save the updated student
    $student->save();

    return response()->json(['message' => 'Student updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::findOrFail($id);
        // $student_cred = UserCredentials::findOrFail($id);

        // Delete the student
        $student->delete();
        // $student_cred->delete();
    
        return response()->json(['message' => 'Student deleted successfully'], 200);
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Retrieve the user by email
        $user = Student::where('email', $data['email'])->first();
    
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


    public function getStudentsAnswers(Request $request){
            $request -> validate([
                'answer1' => 'required',
                'answer2' => 'required',
                'answer3' => 'required',
                'answer4' => 'required',
                'answer5' => 'required',
                'answer6' => 'required',
                'student_id' => 'required',
                'total' => 'required'
            ]);
            
            $existingRecord = Student::where('id', $request->student_id);

            if($existingRecord){
                $existingRecord->update([
                    'ls1_english_part1_1' => $request->answer1,
                    'ls1_english_part1_2' => $request->answer2,
                    'ls1_english_part1_3' => $request->answer3,
                    'ls1_english_part1_4' => $request->answer4,
                    'ls1_english_part1_5' => $request->answer5,
                    'ls1_english_part2_6' => $request->answer6,
                    'score_ls1_english' => $request->total

                ]);
                return response()->json(["Success"=>$existingRecord, 200]);
            }else{
                return response()->json("Error");
            }
            

    }
}
