<?php

namespace App\Http\Controllers;

use App\Models\Checkpoint;
use Illuminate\Http\Request;

class CheckpointController extends Controller
{
    public function index()
    {
        // Eager load 'mission' and optionally 'route' to avoid N+1 queries
        $checkpoints = Checkpoint::with(['mission', 'route'])->get();

        // Pass the data to the Blade view
        return view('checkpoints.index', compact('checkpoints'));
    }
}
