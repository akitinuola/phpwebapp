<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gala extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'location',
        
    ];
}
