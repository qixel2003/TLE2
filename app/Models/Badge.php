<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'requirement_type',
        'requirement_value',
    ];

    public function progress()
    {
        return $this->hasMany(\App\Models\BadgeProgress::class);
    }

    public function progressForUser($userId)
    {
        return $this->progress()->where('user_id', $userId)->first();
    }

    public function isUnlockedBy($user)
    {
        $progress = $this->progressForUser($user->id);
        return $progress?->isUnlocked() ?? false;
    }

}
