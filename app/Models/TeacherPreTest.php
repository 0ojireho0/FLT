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
        'submit_finalscore_ls1english',
        'submit_finalscore_ls1filipino',
        'submit_finalscore_ls2',
        'submit_finalscore_ls4',
        'submit_finalscore_ls5',
        'submit_finalscore_ls6',
        'created_at',
        'updated_at',
        'submit_finalscore_ls1english_part7',
    ];
}
