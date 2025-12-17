<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BadgeProgress extends Model
{
    protected $table = 'badge_progress';

    protected $fillable = [
        'user_id',
        'badge_id',
        'current_value',
        'unlocked_at',
    ];

    protected $casts = [
        'unlocked_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function badge()
    {
        return $this->belongsTo(\App\Models\Badge::class);
    }

    public function isUnlocked()
    {
        return !is_null($this->unlocked_at);
    }
}
