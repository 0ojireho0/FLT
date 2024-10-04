<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
        'ls1_english_part1_1',
        'ls1_english_part1_2',
        'ls1_english_part1_3',
        'ls1_english_part1_4',
        'ls1_english_part1_5',
        'ls1_english_part2_6',
        'ls1_english_part3_7',
        'ls1_english_part3_8',
        'ls1_filipino_part1_1',
        'ls1_filipino_part1_2',
        'ls1_filipino_part1_3',
        'ls1_filipino_part2_4',
        'ls1_filipino_part3_5',
        'ls2_1',
        'ls2_2',
        'ls2_3',
        'ls2_4',
        'ls2_5',
        'ls3_1',
        'ls3_2',
        'ls3_3',
        'ls3_4',
        'ls3_5',
        'ls3_6',
        'ls3_7',
        'ls3_8',
        'ls4_1',
        'ls4_2',
        'ls4_3',
        'ls4_4',
        'ls4_5',
        'ls4_6',
        'ls5_1',
        'ls5_2',
        'ls5_3',
        'ls5_4',
        'ls5_5',
        'ls6_1',
        'ls6_2',
        'ls6_3',
        'ls6_4',
        'ls6_5',
        'ls6_6',
    ];

    protected $hidden = [
        'password',
    ];
}
