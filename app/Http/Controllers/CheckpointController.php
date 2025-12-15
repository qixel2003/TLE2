<?php

namespace App\Http\Controllers;

use App\Models\Active_Route;
use App\Models\Checkpoint;
use Illuminate\Http\Request;

class CheckpointController extends Controller
{
    public function index($id)
    {
        // Eager load 'mission' and optionally 'route' to avoid N+1 queries
        $activeRoute = Active_Route::with([
            'route.mission.prompts',
            'route.mission.questions',
        ])->findOrFail($id);
        $role = $activeRoute->role;

        $checkpoints = Checkpoint::with('mission')
            ->where('route_id', $activeRoute->route_id)
            ->get();

        return view('checkpoints.index', compact(
            'checkpoints',
            'activeRoute',
            'role'
        ));
    }
}
