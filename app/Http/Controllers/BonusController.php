<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Photo;
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
    public function store(Request $request, Bonus $bonus)
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

        return redirect()->route('messages.index')->with('success', 'Je antwoord is succesvol ingediend!');
    }

    public function show(Bonus $bonus)
    {
        if (!Auth::check() || Auth::user()->isStudent()) {
            return redirect()->route('messages.index')->with('error', 'Je hebt geen rechten om deze inzending te bekijken.');
        }

        return view('bonuses.show', compact('bonus'));
    }

    public function approve(Bonus $bonus)
    {
        if (!Auth::check() || Auth::user()->isStudent()) {
            return back()->with('error', 'Je hebt geen rechten om fotos goed te keuren.');
        }

        $bonus->update(['status' => 'goedgekeurd']);
        Photo::create([
            'user_id' => $bonus->user_id,
            'title' => $bonus->title,
            'description' => $bonus->description,
            'image_path' => $bonus->image_path,
        ]);

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
