<?php

namespace App\Notifications;

use App\Models\Badge;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BadgeUnlocked extends Notification
{
    use Queueable;

    public function __construct(public Badge $badge) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'badge_id'   => $this->badge->id,
            'badge_name' => $this->badge->name,
            'message'    => "Je hebt de badge '{$this->badge->name}' verdiend!",
        ];
    }
}
