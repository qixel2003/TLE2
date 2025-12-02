<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Active_Route extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'route_id',
        'student_id',
        'role',
        'is_completed',
        'current_point',
        'points',
        'start_date',
    ];

    public function route(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(Route::class);
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(Student::class);
    }
}
