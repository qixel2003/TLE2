<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckForBadges
{
    /**
     * Create the event listener.
     */
    public function handle($event): void
    {
        app(BadgeService::class)->evaluate($event->user, $event);
    }
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
}
