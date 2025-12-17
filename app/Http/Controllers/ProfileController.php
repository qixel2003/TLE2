<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Active_Route;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile page.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        $authTeacher = auth()->check() && auth()->user()->role == 1;

        $authStudent = $user->student
            ? $user->student
                ->load([
                    'activeRoutes' => function ($query) {
                        $query->with('route')
                            ->latest()   // meest recent eerst (created_at)
                            ->take(3);   // alleen de 3 meest recente
                    }
                ])
            : null;

        return view('profile.index', [
            'user' => $user,
            'authStudent' => $authStudent,
            'authTeacher' => $authTeacher,
            'badges' => $user->unlockedBadges ?? collect(),
        ]);
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('profile.edit', [
            'user' => $user,
            'badges' => $user->unlockedBadges,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
