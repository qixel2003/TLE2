<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonusController extends Controller
{
    /**
     * Show the form for creating a new photo submission.
     */
    public function create()
    {
        // Controleer of message_id is meegegeven
        if (!request()->has('message_id')) {
            return redirect()->route('messages.index')->with('error', 'Geen opdracht geselecteerd.');
        }

        return view('bonus.create');
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
            'message_id' => 'required|exists:messages,id',
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

        return redirect()->route('messages.show', $request->message_id)->with('success', 'Je antwoord is succesvol ingediend!');
    }

    public function approve(Bonus $bonus)
    {
        if (!Auth::check() || Auth::user()->isStudent()) {
            return back()->with('error', 'Je hebt geen rechten om foto\'s goed te keuren.');
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
