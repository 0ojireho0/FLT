<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RegularTeacher;

class RegularTeacherController extends Controller
{
    //

    public function store(Request $request){
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:students', // Ensure email is unique
            'password' => 'required|string|min:8', // Minimum password length
            'birthday' => 'required|date_format:Y-m-d', 
        ]);

        $teacher = new RegularTeacher();
        $teacher->fullname = $request->input('fullname');
        $teacher->email = $request->input('email');
        $teacher->password = $request->input('password'); 
        $teacher->active_status = "Active";
        $teacher->gender = $request->input('gender');
        $teacher->birthday = $request->input('birthday');
        $teacher->house_number = $request->input('house_number');
        $teacher->barangay = $request->input('barangay');
        $teacher->city = $request->input('city');
        $teacher->province = $request->input('province');
        $teacher->contact_number = $request->input('contact_number');
        $teacher->save();

        return response()->json(['message' => 'Teacher created successfully']);
    }

    public function index(){
        $teachers = RegularTeacher::all();

        return response()->json(['teachers'=>$teachers]);
    }

    public function destroy(string $id)
    {
        //
        $employee = RegularTeacher::findOrFail($id);
        // $student_cred = UserCredentials::findOrFail($id);

        // Delete the student
        $employee->delete();
        // $student_cred->delete();
    
        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }
}
