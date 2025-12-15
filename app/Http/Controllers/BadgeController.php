<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Services\BadgeService;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    public function index()
    {
        $badges = Badge::all();
        return view('badges.index', compact('badges'));
    }

    public function show(Badge $badge)
    {
        $user = auth()->user();
        $progress = $badge->progressForUser($user->id); // helper functie

        return view('badges.show', compact('badge', 'progress'));
    }

    public function giveBadge(Request $request, BadgeService $badgeService)
    {
        $badgeService->addProgress(
            auth()->id(),
            $request->badge_id,
            $request->value ?? 1
        );

        return back();
    }
}
