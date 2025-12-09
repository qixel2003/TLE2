<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'city',
        'points',
        'classroom_id',
        'student_id',
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

    public function student(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Student::class);
    }

}
