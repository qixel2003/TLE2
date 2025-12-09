<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function school(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(School::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(User::class);
    }
}
