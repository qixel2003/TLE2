<?php

namespace App\Services;

use App\Models\Badge;
use Illuminate\Support\Facades\Event;

class BadgeService
{
    public function evaluate(User $user, $event)
    {
        // bepaal het soort event
        $eventType = class_basename($event);

        // haal alle badges op die bij dit event passen
        $badges = Badge::where('requirement_type', $eventType)->get();

        foreach ($badges as $badge) {
            if ($this->userMeetsRequirement($user, $badge)) {
                $this->grantBadge($user, $badge);
            }
        }
    }

    private function userMeetsRequirement(User $user, Badge $badge)
    {
        return match($badge->requirement_type) {
            'RouteCompleted' => $user->completed_routes()->count() >= $badge->requirement_value,
            'MissionCompleted' => $user->completed_missions()->count() >= $badge->requirement_value,
            'AnimalSpotted' => $user->spotted_animals()->count() >= $badge->requirement_value,
            'PhotoPosted' => $user->photos()->count() >= $badge->requirement_value,
            default => false,
        };
    }

    private function grantBadge(User $user, Badge $badge)
    {
        if (!$user->badges->contains($badge->id)) {
            $user->badges()->attach($badge->id, ['earned_at' => now()]);
        }
    }
}
