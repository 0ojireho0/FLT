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
            ->select('t.id as teacher_id', 's.*','tp.pis', 'tp.ls1_english','tp.ls1_filipino', 'tp.ls2', 'tp.ls3', 'tp.ls4', 'tp.ls5', 'tp.ls6' )  // Select all student data (s.*) and teacher_id
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

    
}
