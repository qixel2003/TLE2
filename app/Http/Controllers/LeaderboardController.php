<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        // 1. Get students
        // 2. Load the 'user' relationship so we can display their names
        // 3. Order by points descending (highest first)
        // 4. Limit to top 10 or 50 (optional, for performance)
        $students = Student::with('user')
            ->orderBy('points', 'desc')
            ->limit(50)
            ->get();

        return view('leaderboard.index', compact('students'));
    }

}
