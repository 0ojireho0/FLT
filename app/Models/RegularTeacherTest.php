<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularTeacherTest extends Model
{
    use HasFactory;

    protected $fillable =[
        'regular_teacher_id',
        'regular_student_id',
        'score_english',
        'score_math',
        'score_filipino',
        'score_science',
        'english_1',
        'english_2',
        'english_3',
        'filipino_1',
        'filipino_2',
        'filipino_3',
        'science_1',
        'science_2',
        'science_3',
        'math_1',
        'math_2',
        'math_3',
    ];
}
