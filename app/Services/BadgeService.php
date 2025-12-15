<?php

namespace App\Services;

use App\Models\Badge;
use App\Models\BadgeProgress;
use App\Notifications\BadgeUnlocked;
use App\Models\User;


class BadgeService
{
    public function addProgress(int $userId, int $badgeId, int $amount = 1)
    {
        $progress = BadgeProgress::firstOrCreate([
            'user_id' => $userId,
            'badge_id' => $badgeId,
        ]);

        $progress->current_value += $amount;
        $progress->save();

        $badge = Badge::find($badgeId);
        if (
            !$progress->unlocked_at &&
            $progress->current_value >= $badge->requirement_value
        ) {
            $progress->unlocked_at = now();
            $progress->save();

            // NOTIFICATION
            $user = User::find($userId);
            $user->notify(new BadgeUnlocked($badge));
        }


        return $progress;
    }
}
