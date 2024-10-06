<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherPreTest;
use Illuminate\Support\Facades\DB;

class TeacherPreTestController extends Controller
{
    //
    public function index()
    {
        //
        $teachers = TeacherPreTest::all();

        return response()->json(['teacherpretest'=>$teachers]);
    }
    
    public function getSpecificStudents(Request $request){

        $teacherId = $request->query('teacherId');

        $results = DB::table('teacher_pre_tests as tp')
            ->join('students as s', 'tp.students_id', '=', 's.id')
            ->join('teachers as t', 'tp.teacher_id', '=', 't.id')
            ->select('t.id as teacher_id', 's.*','tp.*')  // Select all student data (s.*) and teacher_id
            ->where('t.id', $teacherId)
            ->get();
    

        return response()->json($results);
    }

    public function store(Request $request){
        $request->validate([
            'students_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $studentTeacher = TeacherPreTest::create([
            'students_id' => $request->students_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return response()->json($studentTeacher, 200);
    }

    public function submitScore(Request $request)
    {
        $request->validate([
            'students_id' => 'required',
            'teacher_id' => 'required',
            'pis' => 'required|max:10'
        ]);
    
        // Check if the record exists
        $existingRecord = TeacherPreTest::where('students_id', $request->students_id)
                                        ->where('teacher_id', $request->teacher_id)
                                        ->first();
    
        if ($existingRecord) {
            $existingRecord->update([
                'pis' => $request->pis
            ]);
    
            return response()->json($existingRecord, 200);
        } else {
          
            $submit = TeacherPreTest::create([
                'students_id' => $request->students_id,
                'teacher_id' => $request->teacher_id,
                'pis' => $request->pis
            ]);
    
            return response()->json($submit, 200);
        }
    }
    
    public function submitScoreLS1English(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'students_id' => 'required',
            'teacher_id' => 'required',
            'addScoreNumber6' => 'required'
        ]);
    
        // Check if the record exists
        $existingRecord = TeacherPreTest::where('students_id', $request->students_id)
                                        ->where('teacher_id', $request->teacher_id)
                                        ->first();
    
        if ($existingRecord) {
            $existingRecord->update([
                'submit_finalscore_ls1english' => $request->addScoreNumber6
            ]);
    
            return response()->json($existingRecord, 200);
        } else {
          
            $submit = TeacherPreTest::create([
                'students_id' => $request->students_id,
                'teacher_id' => $request->teacher_id,
                'submit_finalscore_ls1english' => $request->addScoreNumber6
            ]);
    
            return response()->json($submit, 200);
        }
    }
    
    public function submitScoreLS1Filipino(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'students_id' => 'required',
            'teacher_id' => 'required',
            'addScoreNumber4' => 'required'
        ]);
    
        // Check if the record exists
        $existingRecord = TeacherPreTest::where('students_id', $request->students_id)
                                        ->where('teacher_id', $request->teacher_id)
                                        ->first();
    
        if ($existingRecord) {
            $existingRecord->update([
                'submit_finalscore_ls1filipino' => $request->addScoreNumber4
            ]);
    
            return response()->json($existingRecord, 200);
        } else {
          
            $submit = TeacherPreTest::create([
                'students_id' => $request->students_id,
                'teacher_id' => $request->teacher_id,
                'submit_finalscore_ls1filipino' => $request->addScoreNumber4
            ]);
    
            return response()->json($submit, 200);
        }
    }





    
    
}
