<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherPreTestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LS1CommSkillsController;
use App\Http\Controllers\LS2ProblemSolvingController;
use App\Http\Controllers\LS5UnderstandingController;
use App\Http\Controllers\LS2ScientificController;
use App\Http\Controllers\LS3MathematicalController;
use App\Http\Controllers\LS5TheselfController;
use App\Http\Controllers\LS1EnglishController;
use App\Http\Controllers\LS1FilipinoController;
use App\Http\Controllers\LS2ScientificLiteracyController;
use App\Http\Controllers\LS3MathematicsController;
use App\Http\Controllers\LS4LifeController;
use App\Http\Controllers\LS5UtsController;
use App\Http\Controllers\LS6DigitalController;
use App\Http\Controllers\StudentPISController;
use App\Http\Controllers\StudentsposttestController;
use App\Http\Controllers\TeacherPostTestController;
use App\Http\Controllers\RegularStudentController;
use App\Http\Controllers\RegularTeacherController;
use App\Http\Controllers\RegularTeacherTestController;
use App\Http\Controllers\RegularEnglishModuleController;
use App\Http\Controllers\RegularFilipinoModuleController;
use App\Http\Controllers\RegularScienceModuleController;
use App\Http\Controllers\RegularMathModuleController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::get('/employee', [EmployeeController::class, 'index']);
Route::put('/employee/{id}', [EmployeeController::class, 'update']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);


Route::post('login-admin', [AdminController::class, 'login']);


Route::post('/students-posttest', [StudentsposttestController::class, 'store']);
Route::get('/getStudentPosttest', [StudentsposttestController::class, 'getStudents']);
Route::post('/getStudentAnswerPosttest', [StudentsposttestController::class, 'getStudentsAnswers']);
Route::post('/getStudentAnswerFilipinoPosttest', [StudentsposttestController::class, 'getStudentsAnswersFilipino']);
Route::post('/getStudentAnswerScientificPosttest', [StudentsposttestController::class, 'getStudentsAnswersScientific']);
Route::post('/getStudentAnswerMathPosttest', [StudentsposttestController::class, 'getStudentsAnswersMath']);
Route::post('/getStudentAnswerLifePosttest', [StudentsposttestController::class, 'getStudentsAnswersLife']);
Route::post('/getStudentAnswerUTSPosttest', [StudentsposttestController::class, 'getStudentsAnswersUTS']);
Route::post('/getStudentAnswerDigitalPosttest', [StudentsposttestController::class, 'getStudentsAnswersDigital']);
Route::post('/submitStudentScoreLS1EnglishPosttest', [StudentsposttestController::class, 'submitStudentScoreLS1English']);
Route::post('/submitStudentScoreLS1FilipinoPosttest', [StudentsposttestController::class, 'submitStudentScoreLS1Filipino']);

Route::post('/login', [StudentController::class, 'login']);
Route::get('/student', [StudentController::class, 'index']);
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::post('/student', [StudentController::class, 'store']);
Route::delete('/student/{id}', [StudentController::class, 'destroy']);
Route::post('/getStudentAnswer', [StudentController::class, 'getStudentsAnswers']);
Route::post('/getStudentAnswerFilipino', [StudentController::class, 'getStudentsAnswersFilipino']);
Route::post('/getStudentAnswerScientific', [StudentController::class, 'getStudentsAnswersScientific']);
Route::post('/getStudentAnswerMath', [StudentController::class, 'getStudentsAnswersMath']);
Route::post('/getStudentAnswerLife', [StudentController::class, 'getStudentsAnswersLife']);
Route::post('/getStudentAnswerUTS', [StudentController::class, 'getStudentsAnswersUTS']);
Route::post('/getStudentAnswerDigital', [StudentController::class, 'getStudentsAnswersDigital']);
Route::get('/getStudents', [StudentController::class, 'getStudents']);
Route::post('/submitStudentScoreLS1English', [StudentController::class, 'submitStudentScoreLS1English']);
Route::post('/submitStudentScoreLS1Filipino', [StudentController::class, 'submitStudentScoreLS1Filipino']);




Route::post('/student-pis', [StudentPISController::class, 'store']);
Route::get('/student-pis', [StudentPISController::class, 'index']);



Route::post('/teacher', [TeacherController::class, 'store']);
Route::get('/teacher', [TeacherController::class, 'index']);
Route::post('/teacher-login', [TeacherController::class, 'login']);
Route::delete('/teacher/{id}', [TeacherController::class, 'destroy']);

Route::post('/new-student-teacher-posttest', [TeacherPostTestController::class, 'store'] );
Route::get('/get-specific-students-posttest', [TeacherPostTestController::class, 'getSpecificStudents']);
Route::post('/submit-score-ls1english-posttest', [TeacherPostTestController::class, 'submitScoreLS1English']);
Route::post('/submit-score-ls1filipino-posttest', [TeacherPostTestController::class, 'submitScoreLS1Filipino']);


Route::get('/get-specific-students', [TeacherPreTestController::class, 'getSpecificStudents']);
Route::get('/teacher-pretest', [TeacherPreTestController::class, 'index']);
Route::post('/new-student-teacher', [TeacherPreTestController::class, 'store'] );
Route::post('/submit-score', [TeacherPreTestController::class, 'submitScore']);
Route::post('/submit-score-ls1english', [TeacherPreTestController::class, 'submitScoreLS1English']);
Route::post('/submit-score-ls1filipino', [TeacherPreTestController::class, 'submitScoreLS1Filipino']);




Route::post('/ls1commskills/upload', [LS1CommSkillsController::class, 'upload']);
Route::get('/ls1commskills/{id}', [LS1CommSkillsController::class, 'show']);
Route::get('/ls1commskills', [LS1CommSkillsController::class, 'index']);
Route::delete('/ls1commskills/{id}', [LS1CommSkillsController::class, 'destroy']);


Route::post('/ls2problemsolving/upload', [LS2ProblemSolvingController::class, 'upload']);
Route::get('/ls2problemsolving/{id}', [LS2ProblemSolvingController::class, 'show']);
Route::get('/ls2problemsolving', [LS2ProblemSolvingController::class, 'index']);
Route::delete('/ls2problemsolving/{id}', [LS2ProblemSolvingController::class, 'destroy']);

Route::post('/ls5understanding/upload', [LS5UnderstandingController::class, 'upload']);
Route::get('/ls5understanding/{id}', [LS5UnderstandingController::class, 'show']);
Route::get('/ls5understanding', [LS5UnderstandingController::class, 'index']);
Route::delete('/ls5understanding/{id}', [LS5UnderstandingController::class, 'destroy']);

Route::post('/ls2scientific/upload', [LS2ScientificController::class, 'upload']);
Route::get('/ls2scientific/{id}', [LS2ScientificController::class, 'show']);
Route::get('/ls2scientific', [LS2ScientificController::class, 'index']);
Route::delete('/ls2scientific/{id}', [LS2ScientificController::class, 'destroy']);

Route::post('/ls3mathematical/upload', [LS3MathematicalController::class, 'upload']);
Route::get('/ls3mathematical/{id}', [LS3MathematicalController::class, 'show']);
Route::get('/ls3mathematical', [LS3MathematicalController::class, 'index']);
Route::delete('/ls3mathematical/{id}', [LS3MathematicalController::class, 'destroy']);

Route::post('/ls5theself/upload', [LS5TheselfController::class, 'upload']);
Route::get('/ls5theself/{id}', [LS5TheselfController::class, 'show']);
Route::get('/ls5theself', [LS5TheselfController::class, 'index']);
Route::delete('/ls5theself/{id}', [LS5TheselfController::class, 'destroy']);


Route::post('/ls1english/upload', [LS1EnglishController::class, 'upload']);
Route::get('/ls1english/{id}', [LS1EnglishController::class, 'show']);
Route::get('/ls1english', [LS1EnglishController::class, 'index']);
Route::delete('/ls1english/{id}', [LS1EnglishController::class, 'destroy']);

Route::post('/ls1filipino/upload', [LS1FilipinoController::class, 'upload']);
Route::get('/ls1filipino/{id}', [LS1FilipinoController::class, 'show']);
Route::get('/ls1filipino', [LS1FilipinoController::class, 'index']);
Route::delete('/ls1filipino/{id}', [LS1FilipinoController::class, 'destroy']);

Route::post('/ls2scientificliteracy/upload', [LS2ScientificLiteracyController::class, 'upload']);
Route::get('/ls2scientificliteracy/{id}', [LS2ScientificLiteracyController::class, 'show']);
Route::get('/ls2scientificliteracy', [LS2ScientificLiteracyController::class, 'index']);
Route::delete('/ls2scientificliteracy/{id}', [LS2ScientificLiteracyController::class, 'destroy']);

Route::post('/ls3mathematics/upload', [LS3MathematicsController::class, 'upload']);
Route::get('/ls3mathematics/{id}', [LS3MathematicsController::class, 'show']);
Route::get('/ls3mathematics', [LS3MathematicsController::class, 'index']);
Route::delete('/ls3mathematics/{id}', [LS3MathematicsController::class, 'destroy']);

Route::post('/ls4life/upload', [LS4LifeController::class, 'upload']);
Route::get('/ls4life/{id}', [LS4LifeController::class, 'show']);
Route::get('/ls4life', [LS4LifeController::class, 'index']);
Route::delete('/ls4life/{id}', [LS4LifeController::class, 'destroy']);

Route::post('/ls5uts/upload', [LS5UtsController::class, 'upload']);
Route::get('/ls5uts/{id}', [LS5UtsController::class, 'show']);
Route::get('/ls5uts', [LS5UtsController::class, 'index']);
Route::delete('/ls5uts/{id}', [LS5UtsController::class, 'destroy']);

Route::post('/ls6digital/upload', [LS6DigitalController::class, 'upload']);
Route::get('/ls6digital/{id}', [LS6DigitalController::class, 'show']);
Route::get('/ls6digital', [LS6DigitalController::class, 'index']);
Route::delete('/ls6digital/{id}', [LS6DigitalController::class, 'destroy']);


Route::post('/create-regular-teacher', [RegularTeacherController::class, 'store']);
Route::get('/regular-teacher', [RegularTeacherController::class, 'index']);
Route::delete('/regular-teacher/{id}', [RegularTeacherController::class, 'destroy']);
Route::post('/regular-teacher-login', [RegularTeacherController::class, 'login']);

Route::post('/login-regular-student', [RegularStudentController::class, 'login']);
Route::post('/create-regular-student', [RegularStudentController::class, 'store']);
Route::get('/regular-student', [RegularStudentController::class, 'index']); 

Route::get('/get-teacher-teachername', [RegularTeacherTestController::class, 'getTeachername']);
Route::get('/get-teacher-teachernames', [RegularTeacherTestController::class, 'getTeachernames']);
Route::post('/new-regularstudent-teacher', [RegularTeacherTestController::class, 'store'] );
Route::post('/getRegularStudetAnswerEnglish', [RegularTeacherTestController::class, 'getStudentsAnswersEnglish']);
Route::post('/getStudentsAnswersFilipino', [RegularTeacherTestController::class, 'getStudentsAnswersFilipino']);
Route::post('/getStudentsAnswersScience', [RegularTeacherTestController::class, 'getStudentsAnswersScience']);
Route::post('/getStudentsAnswersMath', [RegularTeacherTestController::class, 'getStudentsAnswersMath']);


Route::post('/english-module/upload', [RegularEnglishModuleController::class, 'upload']);
Route::get('/english-module/{id}', [RegularEnglishModuleController::class, 'show']);
Route::get('/english-module', [RegularEnglishModuleController::class, 'index']);
Route::delete('/english-module/{id}', [RegularEnglishModuleController::class, 'destroy']);

Route::post('/filipino-module/upload', [RegularFilipinoModuleController::class, 'upload']);
Route::get('/filipino-module/{id}', [RegularFilipinoModuleController::class, 'show']);
Route::get('/filipino-module', [RegularFilipinoModuleController::class, 'index']);
Route::delete('/filipino-module/{id}', [RegularFilipinoModuleController::class, 'destroy']);

Route::post('/science-module/upload', [RegularScienceModuleController::class, 'upload']);
Route::get('/science-module/{id}', [RegularScienceModuleController::class, 'show']);
Route::get('/science-module', [RegularScienceModuleController::class, 'index']);
Route::delete('/science-module/{id}', [RegularScienceModuleController::class, 'destroy']);

Route::post('/math-module/upload', [RegularMathModuleController::class, 'upload']);
Route::get('/math-module/{id}', [RegularMathModuleController::class, 'show']);
Route::get('/math-module', [RegularMathModuleController::class, 'index']);
Route::delete('/math-module/{id}', [RegularMathModuleController::class, 'destroy']);