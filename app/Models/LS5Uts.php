<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LS5Uts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'filename',
        'original_name'
    
    ];

}
