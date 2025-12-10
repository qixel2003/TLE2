<?php

namespace App\Providers;

use App\Events\RouteCompleted;
use App\Events\MissionCompleted;
use App\Listeners\CheckForBadges;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        RouteCompleted::class => [
            CheckForBadges::class,
        ],
        MissionCompleted::class => [
            CheckForBadges::class,
        ],
    ];

    public function boot(): void {}
}
