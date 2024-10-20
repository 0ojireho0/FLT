<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularEnglishModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'filename',
        'original_name'
    
    ];
}
