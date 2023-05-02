<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Training extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'interval',
        'time',
        'day',
        'squadId',

        
    ];

    public function squadDetails():HasOne {
        return $this->hasOne(Squad::class, 'id', 'squadId');
    }
}
