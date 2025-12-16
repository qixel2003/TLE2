<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::with('user')->latest()->get();
        return view('messages.index', compact('messages'));
    }

    public function show(Message $message) {
        $studentPhotos = Photo::with('user')
            ->where('user_id', '!=', $message->user_id)
            ->latest()
            ->get();

        return view('messages.show', compact('message', 'studentPhotos'));
        }

    public function create() {

        if (!Auth::check() || (Auth::user()->isStudent())) {
            return redirect()->route('messages.index')->with('error', 'Alleen leraren kunnen opdrachten aanmaken.');
        }

        return view('messages.create');
    }

    public function store(Request $request, Message $message) {

        if (!Auth::check() || (Auth::user()->isStudent())) {
            return redirect()->route('messages.index')->with('error', 'Je hebt geen rechten om opdrachten aan te maken.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('message_photos', 'public');
        }

        $message = [
            'title' => $request->title,
            'message' => $request->message,
            'photo' => $photoPath,
            'user_id' => auth()->user()->id
        ];

        Message::create($message);

        return redirect()->route('messages.index')->with('success', 'Opdracht succesvol aangemaakt!');
    }

    public function edit(Message $message) {
        if (!Auth::check() || (Auth::user()->isStudent() && auth()->id() !== $message->user_id)) {
            return redirect()->route('messages.index')->with('error', 'Je hebt geen rechten om deze opdracht te bewerken.');
        }

        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, Message $message) {
        if (!Auth::check() || (Auth::user()->isStudent() && auth()->id() !== $message->user_id)) {
            return redirect()->route('messages.index')->with('error', 'Je hebt geen rechten om deze opdracht te bewerken.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('message_photos', 'public');
            $message->photo = $photoPath;
        }

        $message->update([
            'title' => $request->input('title'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('messages.show', $message)->with('success', 'Opdracht succesvol bijgewerkt!');
    }

    public function destroy(Message $message) {
        if (!Auth::check() || (Auth::user()->isStudent() && auth()->id() !== $message->user_id)) {
            return redirect()->route('messages.index')->with('error', 'Je hebt geen rechten om deze opdracht te verwijderen.');
        }

        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Opdracht verwijderd!');
    }
}
