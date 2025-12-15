<?php

use App\Models\User;
use App\Models\Route;
use App\Models\Badge;
use App\Models\BadgeProgress;
use App\Events\RouteCompleted;
use Illuminate\Support\Facades\Event;

it('unlocks a badge when user completes enough routes', function () {

    // Fake events so listeners still run
    Event::fakeExcept(RouteCompleted::class);

    // create user
    $user = User::factory()->create();

    // create route
    $route = Route::factory()->create();

    // create badge requirement
    $badge = Badge::create([
        'name' => 'Groene Verkenner',
        'slug' => 'groene-verkenner',
        'description' => 'Voltooi 1 route.',
        'requirement_type' => 'RouteCompleted',
        'requirement_value' => 1,
    ]);

    // fire event (this simulates user finishing a real route)
    event(new RouteCompleted($user, $route));

    // now check if progress was created
    $progress = BadgeProgress::where('user_id', $user->id)
        ->where('badge_id', $badge->id)
        ->first();

    expect($progress)->not()->toBeNull();

    // badge should now be unlocked
    expect($progress->unlocked_at)->not()->toBeNull();
});
