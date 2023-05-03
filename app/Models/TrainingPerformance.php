<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TrainingPerformance extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'trainingId',
        'swimmerId',
        'rank',
        'trainingDate',
        'stroke',

        
    ];

    public function trainingDetails():HasOne {
        return $this->hasOne(Training::class, 'id', 'trainingId');
    }

    public function swimmerDetails():HasOne {
        return $this->hasOne(User::class, 'id', 'swimmerId');
    }

}
