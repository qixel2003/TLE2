<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
//    /**
//     * Requires user to be logged in to access this controller.
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
//
//    /**
//     * Saves the selected role to the currently authenticated user's profile.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */

    public function store(Request $request)
    {
        // 1. Validation (Ensure the selected role is one of the valid options)
        $validated = $request->validate([
            'role' => ['required', 'string', 'in:fotograaf,historicus,tekenaar,scout'],
        ]);

        // 2. === TEMPORARY: HARDCODE STUDENT ID FOR FUNCTIONALITY TESTING ===
        // IMPORTANT: Replace '1' with the ID of a valid student in your 'active_routes' table
        $testingStudentId = 1;
        // ====================================================================

        // 3. Identify the currently active route for the user
        $activeRoute = Active_Route::where('student_id', $testingStudentId)
            ->where('is_completed', 0) // Assuming 0 means not completed
            ->latest('start_date')
            ->first();

        // 4. Check if an active route was found
        if (!$activeRoute) {
            // If no route is active, redirect back with an error
            return redirect()->back()->withErrors(['role' => 'Geen actieve route gevonden met ID ' . $testingStudentId . ' om een rol aan toe te wijzen.']);
        }

        // 5. Update the role on the Active_Route instance
        $activeRoute->role = $validated['role'];
        $activeRoute->save();

        // 6. Redirect the user to the next quest page
        return redirect('/start-quest')
            ->with('success', 'TEST SUCCESS: De rol ' . $activeRoute->role . ' is opgeslagen voor student ID ' . $testingStudentId . '.');
    }

}
