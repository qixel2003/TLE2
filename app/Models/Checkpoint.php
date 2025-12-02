<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Checkpoint extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'checkpoint',
        'route_id',
        'mission_id',
        'points',
    ];

    public function route(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(Route::class);
    }

    public function mission(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(Mission::class);
    }
}
