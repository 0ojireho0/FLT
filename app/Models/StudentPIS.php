<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPIS extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'students_id',
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
        'created_at'
    ];

}
