<?php

namespace App\Events;

use App\Models\User;
use App\Models\Route;
use Illuminate\Foundation\Events\Dispatchable;

class RouteCompleted
{
    use Dispatchable;

    public function __construct(
        public User $user,
        public Route $route
    ) {}
}
