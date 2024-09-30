<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPreTest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'teacher_id',
        'students_id',
        'pis',
        'ls1_english',
        'ls2_filipino',
        'ls3',
        'ls4',
        'ls5',
        'ls6',
        'grade_level',
        'created_at',
        'updated_at',
    ];
}
