<?php

namespace App\Listeners;

use App\Models\Badge;
use App\Services\BadgeService;

class CheckForBadges
{
    protected BadgeService $badgeService;

    public function __construct(BadgeService $badgeService)
    {
        $this->badgeService = $badgeService;
    }

    public function handle($event)
    {

        $eventType = class_basename($event);

        $badges = Badge::where('requirement_type', $eventType)->get();

        foreach ($badges as $badge) {
            $this->badgeService->addProgress(
                $event->user->id,
                $badge->id,
                1
            );
        }
    }
}
