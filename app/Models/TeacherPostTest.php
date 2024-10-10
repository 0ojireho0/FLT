<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPostTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'teacher_id',
        'students_id',
        'pis',
        'post_tests_submit_finalscore_ls1english',
        'post_tests_submit_finalscore_ls1filipino',
        'post_tests_submit_finalscore_ls2',
        'post_tests_submit_finalscore_ls4',
        'post_tests_submit_finalscore_ls5',
        'post_tests_submit_finalscore_ls6',
        'created_at',
        'updated_at',
        'post_tests_submit_finalscore_ls1english_part7',
        'post_tests_submit_finalscore_ls1english_part8',
        'post_tests_submit_finalscore_ls1filipino_part5'
    ];
}
