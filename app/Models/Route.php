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
        'location',
        'distance',
        'duration',
        'description',
        'difficulty',
//        'active',
    ];
//
//    protected $primaryKey = 'id';
    public function active_route(): HasMany
    {
        return $this->hasMany(Active_Route::class);
    }
}
