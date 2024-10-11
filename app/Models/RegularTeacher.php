<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'active_status',
        'fullname',
        'gender',
        'contact_number',
        'birthday',
        'house_number',
        'barangay',
        'city',
        'province',


    ];

    protected $hidden = [
        'password'
    ];
}
