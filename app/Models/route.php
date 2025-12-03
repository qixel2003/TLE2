<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Notifications\Notifiable;

class route extends Model
{
//    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'distance',
        'duration',
        'description',
        'difficulty',
        'picture',
    ];

//    public mixed $name;
}
