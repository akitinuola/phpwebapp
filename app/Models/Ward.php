<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'wardId',
        'parentId',
    ];

    public function wardDetails():HasOne {
        return $this->hasOne(User::class, 'id', 'wardId');
    }

    public function parentDetails():HasOne {
        return $this->hasOne(User::class, 'id', 'parentId');
    }
}