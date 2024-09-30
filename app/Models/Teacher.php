<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'email',
        'password',
        'fullname',
        'gender',
        'birthday',
        'house_number',
        'barangay',
        'city',
        'province',
        'contact_number',
        'created_at',
        'active_status'
    ];

    protected $hidden = [
        'password',
    ];
}
