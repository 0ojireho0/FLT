<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentsposttest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'email',
        'password',
        'active_status',
        'fullname',
        'gender',
        'birthday',
        'house_number',
        'barangay',
        'city',
        'province',
        'religion',
        'civil_status',
        'occupation',
        'education',
        'created_at',
        'post_test_ls1_english_part1_1',
        'post_test_ls1_english_part1_2',
        'post_test_ls1_english_part1_3',
        'post_test_ls1_english_part1_4',
        'post_test_ls1_english_part1_5',
        'post_test_ls1_english_part2_6',
        'post_test_ls1_english_part3_7',
        'post_test_ls1_english_part3_8',
        'post_test_audio_ls1_english_part3_7',
        'post_test_audio_ls1_english_part3_8',
        'post_test_ls1_filipino_part1_1',
        'post_test_ls1_filipino_part1_2',
        'post_test_ls1_filipino_part1_3',
        'post_test_ls1_filipino_part2_4',
        'post_test_ls1_filipino_part3_5',
        'post_test_audio_ls1_filipino_part3_5',
        'post_test_ls2_1',
        'post_test_ls2_2',
        'post_test_ls2_3',
        'post_test_ls2_4',
        'post_test_ls2_5',
        'post_test_ls3_1',
        'post_test_ls3_2',
        'post_test_ls3_3',
        'post_test_ls3_4',
        'post_test_ls3_5',
        'post_test_ls3_6',
        'post_test_ls3_7',
        'post_test_ls3_8',
        'post_test_ls4_1',
        'post_test_ls4_2',
        'post_test_ls4_3',
        'post_test_ls4_4',
        'post_test_ls4_5',
        'post_test_ls4_6',
        'post_test_ls5_1',
        'post_test_ls5_2',
        'post_test_ls5_3',
        'post_test_ls5_4',
        'post_test_ls5_5',
        'post_test_ls6_1',
        'post_test_ls6_2',
        'post_test_ls6_3',
        'post_test_ls6_4',
        'post_test_ls6_5',
        'post_test_ls6_6',
        'post_test_score_ls1_english',
        'post_test_score_ls1_filipino',
        'post_test_score_ls2_scientific',
        'post_test_score_ls3_math',
        'post_test_score_ls4_life',
        'post_test_score_ls5_uts',
        'post_test_score_ls6_digital'

    ];

    protected $hidden = [
        'password',
    ];
}
