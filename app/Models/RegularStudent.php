<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'lrn',
        'birthday',
        'email',
        'house_number',
        'barangay',
        'city',
        'province',
        'religion',
        'grade',
    ];

    protected $hidden = [
        'password'
    ];
 
}
