<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalaPerformance extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'gender',
        'time',
        'point',
        'position',
        'swimmerId',
        'galaId',
        'stroke',
    ];
}
