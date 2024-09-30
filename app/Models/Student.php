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
        'created_at'
    ];

    protected $hidden = [
        'password',
    ];
}
