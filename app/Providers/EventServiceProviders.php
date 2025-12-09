<?php

namespace App\Providers;

use App\Events\MissionCompleted;
use App\Listeners\CheckForBadges;
use RouteCompleted;


class EventServiceProviders extends AppServiceProvider
{
    protected $listen = [
        RouteCompleted::class => [
            CheckForBadges::class,
        ],
        MissionCompleted::class => [
            CheckForBadges::class,
        ],
//        AnimalSpotted::class => [
//            CheckForBadges::class,
//        ],
//        PhotoPosted::class => [
//            CheckForBadges::class,
//        ],
    ];
    public function boot(): void
    {
        //
    }
}
