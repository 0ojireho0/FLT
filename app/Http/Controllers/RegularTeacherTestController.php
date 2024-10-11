<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegularTeacherTest;
use Illuminate\Support\Facades\DB;

class RegularTeacherTestController extends Controller
{
    //

    public function getTeachername(Request $request) {
        $regular_teacher_id = $request->query('regular_teacher_id');
        $regular_student_id = $request->query('regular_student_id');

        $results = DB::table('regular_teacher_tests as rtt')
        ->join('regular_students as rs', 'rtt.regular_student_id', '=', 'rs.id')
        ->join('regular_teachers as rt', 'rtt.regular_teacher_id', '=', 'rt.id')
        ->select(
            'rt.id as regular_teacher_id',
            'rs.id as regular_student_id',
            'rs.*',
            'rtt.*',
            'rt.*'
        )
        ->where('rtt.regular_student_id', $regular_student_id)  // Filter by regular_student_id
        ->where('rtt.regular_teacher_id', $regular_teacher_id)  // Filter by regular_teacher_id
        ->get();
    
        return response()->json(['details'=> $results]);
    }

    public function store(Request $request){

     
        $request->validate([
            'regular_students_id' => 'required',
            'regular_teachers_id' => 'required',
        ]);

        $studentTeacher = RegularTeacherTest::create([
            'regular_teacher_id' => $request->regular_teachers_id,
            'regular_student_id' => $request->regular_students_id,
            // 'studentsposttest_id' => $request->students_id
        ]);

        return response()->json($studentTeacher, 200);
    }

    public function getStudentsAnswersEnglish(Request $request) {
        $request -> validate([
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'student_id' => 'required',
            'total' => 'required'
        ]);
        
        $existingRecord = RegularTeacherTest::where('id', $request->student_id);

        if($existingRecord){
            $existingRecord->update([
                'english_1' => $request->answer1,
                'english_2' => $request->answer2,
                'english_3' => $request->answer3,
                'score_english' => $request->total

            ]);
        }

        $students = RegularTeacherTest::where('id',$request->student_id )->get();
        return response()->json(["Success"=>$students, 200]);
    }

    public function getStudentsAnswersFilipino(Request $request) {
        $request -> validate([
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'student_id' => 'required',
            'total' => 'required'
        ]);
        
        $existingRecord = RegularTeacherTest::where('id', $request->student_id);

        if($existingRecord){
            $existingRecord->update([
                'filipino_1' => $request->answer1,
                'filipino_2' => $request->answer2,
                'filipino_3' => $request->answer3,
                'score_filipino' => $request->total

            ]);
        }

        $students = RegularTeacherTest::where('id',$request->student_id )->get();
        return response()->json(["Success"=>$students, 200]);
    }
}
