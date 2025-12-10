<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'points',
        'school_id',
        'classroom_id',
        'user_id',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    public function classroom(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Classroom::class);
    }

    public function students(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Student::class);
    }

}
