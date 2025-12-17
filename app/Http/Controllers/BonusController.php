<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonusController extends Controller
{
    public function create()
    {
        return view('bonuses.create');
    }

    /**
     * Store a newly created photo submission from a student.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:1000',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:9000',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('student_submissions', 'public');
        }

        Bonus::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('messages.show', $request)->with('success', 'Je antwoord is succesvol ingediend!');
    }

    public function approve(Bonus $bonus)
    {
        if (!Auth::check() || Auth::user()->isStudent()) {
            return back()->with('error', 'Je hebt geen rechten om fotos goed te keuren.');
        }

        $bonus->update(['status' => 'goedgekeurd']);
        return back()->with('success', 'Foto goedgekeurd!');
    }

    public function reject(Bonus $bonus)
    {
        // Alleen teachers en admins mogen afkeuren
        if (!Auth::check() || Auth::user()->isStudent()) {
            return back()->with('error', 'Je hebt geen rechten om foto\'s af te keuren.');
        }

        $bonus->update(['status' => 'afgewezen']);
        return back()->with('success', 'Foto afgewezen!');
    }
}
