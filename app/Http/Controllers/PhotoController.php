<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Store a newly created photo submission from a student.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:9000',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('student_submissions', 'public');
        }

        Photo::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('messages.show', $request->message_id)->with('success', 'Je antwoord is succesvol ingediend!');
    }

    public function approve(Photo $photo) {
        //alleen goedkeuren als de status nog niet goedgekeurd is
        $photo->update(['status' => 'goedgekeurd']);
        return back()->with('success', 'Foto goedgekeurd!');
    }

    public function reject(Photo $photo) {
        $photo->update(['status' => 'afgewezen']);
        return back()->with('success', 'Foto afgewezen!');
    }
}

