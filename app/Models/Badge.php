<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    public function getUnlockedAttribute()
    {
        return $this->user_progress >= $this->requirement_value;
    }


    public function progress()
    {
        return $this->hasMany(\App\Models\BadgeProgress::class);
    }

    public function progressForUser($userId)
    {
        return $this->progress()->where('user_id', $userId)->first();
    }


}
