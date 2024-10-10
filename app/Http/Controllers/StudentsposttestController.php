<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Studentsposttest;

class StudentsposttestController extends Controller
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
        $student = new Studentsposttest();
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

    public function getStudents(Request $request)
    {   
        $studentsId = $request->query('students_id');

        $students = Studentsposttest::where('id', $studentsId)->get();
    
        return response()->json($students);
    }

    public function getStudentsAnswers(Request $request)
    {
       // Validate the request
       $request->validate([
        'answer1' => 'required|string',
        'answer2' => 'required|string',
        'answer3' => 'required|string',
        'answer4' => 'required|string',
        'answer5' => 'required|string',
        'answer6' => 'required|string',
        'answer7' => 'required|string',
        'answer8' => 'required|string',
        'student_id' => 'required|integer',
        'total' => 'required|integer',
        'audio' => 'nullable|file', // Adjust as needed
        'audio2' => 'nullable|file'
    ]);
    
    // Handle the audio file upload
    $audioURL = null;
    if ($request->hasFile('audio')) {
        $audioPath = $request->file('audio')->store('uploads/audios', 'public'); // Store in storage/app/public/uploads/audios
        $audioURL = asset('storage/' . $audioPath); // Generate URL for the stored audio file
    }

    $audioURL2 = null;
    if ($request->hasFile('audio2')) {
        $audioPath2 = $request->file('audio2')->store('uploads/audios', 'public'); // Store in storage/app/public/uploads/audios
        $audioURL2 = asset('storage/' . $audioPath2); // Generate URL for the stored audio file
    }
    
    // Check if the student record exists
    $existingRecord = Studentsposttest::find($request->student_id);

    if ($existingRecord) {
        // Update the existing record with the answers and audio URL
        $existingRecord->update([
            'post_test_ls1_english_part1_1' => $request->answer1,
            'post_test_ls1_english_part1_2' => $request->answer2,
            'post_test_ls1_english_part1_3' => $request->answer3,
            'post_test_ls1_english_part1_4' => $request->answer4,
            'post_test_ls1_english_part1_5' => $request->answer5,
            'post_test_ls1_english_part2_6' => $request->answer6,
            'post_test_ls1_english_part3_7' => $request->answer7,
            'post_test_ls1_english_part3_8' => $request->answer8,
            'post_test_score_ls1_english' => $request->total,
            'post_test_audio_ls1_english_part3_7' => $audioURL, // Save the audio URL if needed
            'post_test_audio_ls1_english_part3_8' => $audioURL2 // Save the audio URL if needed
        ]);
    }

    // Retrieve the updated student record
    $students = Studentsposttest::where('id', $request->student_id)->get();
    
    // Send response back to client
    return response()->json([
        'message' => 'Answers submitted successfully!',
        'audioURL' => $audioURL, // Include the audio URL in the response
        'audioURL2' => $audioURL2,
        'students' => $students,
    ], 200);
    }

    public function getStudentsAnswersFilipino(Request $request){
        $request -> validate([
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'answer5' => 'required',
            'student_id' => 'required',
            'total' => 'required',
            'audio' => 'nullable|file'
        ]);

        $audioURL = null;
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('uploads/audios', 'public'); // Store in storage/app/public/uploads/audios
            $audioURL = asset('storage/' . $audioPath); // Generate URL for the stored audio file
        }
        
        $existingRecord = Studentsposttest::where('id', $request->student_id);

        if($existingRecord){
            $existingRecord->update([
                'post_test_ls1_filipino_part1_1' => $request->answer1,
                'post_test_ls1_filipino_part1_2' => $request->answer2,
                'post_test_ls1_filipino_part1_3' => $request->answer3,
                'post_test_ls1_filipino_part2_4' => $request->answer4,
                'post_test_ls1_filipino_part3_5' => $request->answer5,
                'post_test_score_ls1_filipino' => $request->total,
                'post_test_audio_ls1_filipino_part3_5' => $audioURL

            ]);
        }

        $students = Studentsposttest::where('id',$request->student_id )->get();
        return response()->json(["Success"=>$students, 200]);
}

public function getStudentsAnswersScientific(Request $request){
    $request -> validate([
        'answer1' => 'required',
        'answer2' => 'required',
        'answer3' => 'required',
        'answer4' => 'required',
        'answer5' => 'required',
        'student_id' => 'required',
        'total' => 'required'
    ]);
    
    $existingRecord = Studentsposttest::where('id', $request->student_id);

    if($existingRecord){
        $existingRecord->update([
            'post_test_ls2_1' => $request->answer1,
            'post_test_ls2_2' => $request->answer2,
            'post_test_ls2_3' => $request->answer3,
            'post_test_ls2_4' => $request->answer4,
            'post_test_ls2_5' => $request->answer5,
            'post_test_score_ls2_scientific' => $request->total

        ]);
    }

    $students = Studentsposttest::where('id',$request->student_id )->get();
    return response()->json(["Success"=>$students, 200]);
}

public function getStudentsAnswersMath(Request $request){
    $request -> validate([
        'answer1' => 'required',
        'answer2' => 'required',
        'answer3' => 'required',
        'answer4' => 'required',
        'answer5' => 'required',
        'answer6' => 'required',
        'answer7' => 'required',
        'answer8' => 'required',
        'student_id' => 'required',
        'total' => 'required'
    ]);
    
    $existingRecord = Studentsposttest::where('id', $request->student_id);

    if($existingRecord){
        $existingRecord->update([
            'post_test_ls3_1' => $request->answer1,
            'post_test_ls3_2' => $request->answer2,
            'post_test_ls3_3' => $request->answer3,
            'post_test_ls3_4' => $request->answer4,
            'post_test_ls3_5' => $request->answer5,
            'post_test_ls3_6' => $request->answer6,
            'post_test_ls3_7' => $request->answer7,
            'post_test_ls3_8' => $request->answer8,
            'post_test_score_ls3_math' => $request->total

        ]);
    }

    $students = Studentsposttest::where('id',$request->student_id )->get();
    return response()->json(["Success"=>$students, 200]);
}

public function getStudentsAnswersLife(Request $request){
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
    
    $existingRecord = Studentsposttest::where('id', $request->student_id);

    if($existingRecord){
        $existingRecord->update([
            'post_test_ls4_1' => $request->answer1,
            'post_test_ls4_2' => $request->answer2,
            'post_test_ls4_3' => $request->answer3,
            'post_test_ls4_4' => $request->answer4,
            'post_test_ls4_5' => $request->answer5,
            'post_test_ls4_6' => $request->answer6,
            'post_test_score_ls4_life' => $request->total

        ]);
    }

    $students = Studentsposttest::where('id',$request->student_id )->get();
    return response()->json(["Success"=>$students, 200]);
}

public function getStudentsAnswersUTS(Request $request){
    $request -> validate([
        'answer1' => 'required',
        'answer2' => 'required',
        'answer3' => 'required',
        'answer4' => 'required',
        'answer5' => 'required',
        'student_id' => 'required',
        'total' => 'required'
    ]);
    
    $existingRecord = Studentsposttest::where('id', $request->student_id);

    if($existingRecord){
        $existingRecord->update([
            'post_test_ls5_1' => $request->answer1,
            'post_test_ls5_2' => $request->answer2,
            'post_test_ls5_3' => $request->answer3,
            'post_test_ls5_4' => $request->answer4,
            'post_test_ls5_5' => $request->answer5,
            'post_test_score_ls5_uts' => $request->total

        ]);
    }

    $students = Studentsposttest::where('id',$request->student_id )->get();
    return response()->json(["Success"=>$students, 200]);
}

public function getStudentsAnswersDigital(Request $request){
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
    
    $existingRecord = Studentsposttest::where('id', $request->student_id);

    if($existingRecord){
        $existingRecord->update([
            'post_test_ls6_1' => $request->answer1,
            'post_test_ls6_2' => $request->answer2,
            'post_test_ls6_3' => $request->answer3,
            'post_test_ls6_4' => $request->answer4,
            'post_test_ls6_5' => $request->answer5,
            'post_test_ls6_6' => $request->answer5,
            'post_test_score_ls6_digital' => $request->total

        ]);
    }

    $students = Studentsposttest::where('id',$request->student_id )->get();
    return response()->json(["Success"=>$students, 200]);
}

public function submitStudentScoreLS1English(Request $request){
    $request -> validate([
        'student_id' => 'required',
        'total' => 'required'
    ]);
    
    $existingRecord = Studentsposttest::where('id', $request->student_id);

    if($existingRecord){
        $existingRecord->update([
            'post_test_score_ls1_english' => $request->total

        ]);
    }

    $students = Studentsposttest::where('id',$request->student_id )->get();
    return response()->json(["Success"=>$students, 200]);
}

public function submitStudentScoreLS1Filipino(Request $request){
    $request -> validate([
        'student_id' => 'required',
        'total' => 'required'
    ]);
    
    $existingRecord = Studentsposttest::where('id', $request->student_id);

    if($existingRecord){
        $existingRecord->update([
            'post_test_score_ls1_filipino' => $request->total

        ]);
    }

    $students = Studentsposttest::where('id',$request->student_id )->get();
    return response()->json(["Success"=>$students, 200]);
}


}
