<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Route extends Model {

//    use SoftDeletes;
    protected $fillable = [
        'name',
        'location',
        'distance',
        'duration',
        'description',
        'difficulty',
        'picture',
//        'active',
    ];
//
//    protected $primaryKey = 'id';
}
