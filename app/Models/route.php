<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Route extends Model
{

    protected $fillable = [
        'name',
        'location',
        'distance',
        'description',
        'difficulty',];
    protected $primaryKey = 'id';


}
