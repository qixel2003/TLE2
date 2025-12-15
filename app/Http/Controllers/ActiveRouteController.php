<?php

namespace App\Http\Controllers;

use App\Models\Active_Route;
use App\Models\Route;
use Illuminate\Http\Request;

class ActiveRouteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Route $route)
    {
        // Checks if the authenticated user has a student profile
        $student = auth()->user()->student;

        // Check if route is already active for this student
        $existingActiveRoute = Active_Route::where('route_id', $route->id)
            ->where('student_id', $student->id)
            ->where('is_completed', false)
            ->first();

        //If already active, redirect back with message
        if ($existingActiveRoute) {
            return redirect()->back()->with('error', 'You have already started this route.');
        }

        //Create Active Route if all clear
        $activeRoute = Active_Route::create([
            'route_id' => $route->id,
            'student_id' => $student->id,
            'role' => 0, // Default role
            'is_completed' => false,
            'points' => 0,
        ]);

        return redirect()->route('active-routes.select', $activeRoute);
    }

    public function updateRole(Request $request, Active_Route $activeRoute)
    {
        // Check to ensure the active route belongs to the authenticated user
        if ($activeRoute->student_id !== auth()->user()->student->id) {
            abort(403);
        }

        $request->validate([
            'role' => 'required|integer|min:0',
        ]);

        $activeRoute->update([
            'role' => $request->role,
        ]);

        return redirect()->route('active-routes.mission', $activeRoute);
    }

    public function select(Active_Route $activeRoute)
    {
        // Check to ensure the active route belongs to the authenticated user
        if ($activeRoute->student_id !== auth()->user()->student->id) {
            abort(403);
        }

        return view('active-routes.select', compact('activeRoute'));
    }

    public function mission(Active_Route $activeRoute)
    {
        // Check to ensure the active route belongs to the authenticated user
        if ($activeRoute->student_id !== auth()->user()->student->id) {
            abort(403);
        }

        return view('route-mission', compact('activeRoute'));
    }

    public function complete(Active_Route $activeRoute)
    {
        // Check to ensure the active route belongs to the authenticated user
        if ($activeRoute->student_id !== auth()->user()->student->id) {
            abort(403);
        }

        $activeRoute->update([
            'is_completed' => true,
        ]);

        return view('route-finished', compact('activeRoute'));
    }
}


