<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Route extends Model {

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'picture',
        'location',
        'distance',
        'duration',
        'description',
        'image',
        'difficulty',
//        'active',
        'image',
    ];
//
//    protected $primaryKey = 'id';
    public function active_route(): HasMany
    {
        return $this->hasMany(Active_Route::class);
    }

    public function getFormattedDuration(): string
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;

        if ($hours > 0 && $minutes > 0) {
            return "{$hours}h {$minutes}m";
        } elseif ($hours > 0) {
            return "{$hours}h";
        } else {
            return "{$minutes}m";
        }
    }

    public function getFormattedDistance(): string
    {
        $km = $this->distance / 1000;

        if ($km >= 1) {
            return number_format($km, 1) . ' km';
        } else {
            return $this->distance . ' m';
        }
    }

}
