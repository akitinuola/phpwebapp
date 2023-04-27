<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Squad extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
// fillables are what would show in your sql, the data you want stored in it.
     protected $fillable = [
        'name',
        'description',
        'status',
        'coachId',
    ];
// this function is to tell the squad nodel that it is connected to the user model
// hasone means it has a one on one relationship with the user model, (User::class refers to which mdel has the relationship, 'id',primary key on user table, 'coachId'is the foreign key);
    public function coachDetails():HasOne {
        return $this->hasOne(User::class, 'id', 'coachId');
    }
}
